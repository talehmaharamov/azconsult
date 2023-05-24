<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\WhoPhotos;
use App\Models\WhoTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Who;
use Illuminate\Support\Facades\DB;

class WhoController extends Controller
{
    public function index()
    {
        check_permission('who index');
        $whos = Who::with('photos')->get();
        return view('backend.who.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('who create');
        return view('backend.who.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('who create');
        try {
            $who = new Who();
            $who->photo = upload('who', $request->file('photo'));
            $who->save();
            foreach (active_langs() as $lang) {
                $translation = new WhoTranslation();
                $translation->locale = $lang->code;
                $translation->who_id = $who->id;
                $translation->name = $request->name[$lang->code];
                $translation->description = $request->description[$lang->code];
                $translation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.who.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.who.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('who edit');
        $who = Who::where('id', $id)->with('photos')->first();
        return view('backend.who.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('who edit');
        try {
            $who = Who::where('id', $id)->with('photos')->first();
            DB::transaction(function () use ($request, $who) {
                if($request->hasFile('photo')){
                if(file_exists($who->photo)){
                unlink(public_path($who->photo));
                }
                $who->photo = upload('who',$request->file('photo'));
                }
                foreach (active_langs() as $lang) {
                   $who->translate($lang->code)->name = $request->name[$lang->code];
                   $who->translate($lang->code)->description = $request->description[$lang->code];
                }
                $who->save();
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
        check_permission('who edit');
        return CRUDHelper::status('\App\Models\Who', $id);
    }

    public function delete(string $id)
    {
        check_permission('who delete');
        return CRUDHelper::remove_item('\App\Models\Who', $id);
    }
}
