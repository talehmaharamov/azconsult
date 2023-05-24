<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\StatisticPhotos;
use App\Models\StatisticTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Statistic;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        check_permission('statistic index');
        $statistics = Statistic::with('photos')->get();
        return view('backend.statistic.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('statistic create');
        return view('backend.statistic.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('statistic create');
        try {
            $statistic = new Statistic();
            $statistic->photo = upload('statistic', $request->file('photo'));
            $statistic->save();
            foreach (active_langs() as $lang) {
                $translation = new StatisticTranslation();
                $translation->locale = $lang->code;
                $translation->statistic_id = $statistic->id;
                $translation->name = $request->name[$lang->code];
                $translation->description = $request->description[$lang->code];
                $translation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.statistic.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.statistic.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('statistic edit');
        $statistic = Statistic::where('id', $id)->with('photos')->first();
        return view('backend.statistic.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('statistic edit');
        try {
            $statistic = Statistic::where('id', $id)->with('photos')->first();
            DB::transaction(function () use ($request, $statistic) {
                if($request->hasFile('photo')){
                if(file_exists($statistic->photo)){
                unlink(public_path($statistic->photo));
                }
                $statistic->photo = upload('statistic',$request->file('photo'));
                }
                foreach (active_langs() as $lang) {
                   $statistic->translate($lang->code)->name = $request->name[$lang->code];
                   $statistic->translate($lang->code)->description = $request->description[$lang->code];
                }
                $statistic->save();
            });
            alert()->success(__('messages.success'));
            return redirect()->back();
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect()->back();
        }
    }

    public function status(string $id)
    {
        check_permission('statistic edit');
        return CRUDHelper::status('\App\Models\Statistic', $id);
    }

    public function delete(string $id)
    {
        check_permission('statistic delete');
        return CRUDHelper::remove_item('\App\Models\Statistic', $id);
    }
}
