<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\WhyPhotos;
use App\Models\WhyTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Why;
use Illuminate\Support\Facades\DB;

class WhyController extends Controller
{
    public function index()
    {
        check_permission('why index');
        $whys = Why::with('photos')->get();
        return view('backend.why.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('why create');
        return view('backend.why.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('why create');
        try {
            $why = new Why();
            $why->photo = upload('why', $request->file('photo'));
            $why->save();
            foreach (active_langs() as $lang) {
                $translation = new WhyTranslation();
                $translation->locale = $lang->code;
                $translation->why_id = $why->id;
                $translation->name = $request->name[$lang->code];
                $translation->description = $request->description[$lang->code];
                $translation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.why.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.why.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('why edit');
        $why = Why::where('id', $id)->with('photos')->first();
        return view('backend.why.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('why edit');
        try {
            $why = Why::where('id', $id)->with('photos')->first();
            DB::transaction(function () use ($request, $why) {
                if($request->hasFile('photo')){
                if(file_exists($why->photo)){
                unlink(public_path($why->photo));
                }
                $why->photo = upload('why',$request->file('photo'));
                }
                foreach (active_langs() as $lang) {
                   $why->translate($lang->code)->name = $request->name[$lang->code];
                   $why->translate($lang->code)->description = $request->description[$lang->code];
                }
                $why->save();
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
        check_permission('why edit');
        return CRUDHelper::status('\App\Models\Why', $id);
    }

    public function delete(string $id)
    {
        check_permission('why delete');
        return CRUDHelper::remove_item('\App\Models\Why', $id);
    }
}
