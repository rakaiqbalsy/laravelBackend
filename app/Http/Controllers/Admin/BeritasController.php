<?php

namespace App\Http\Controllers\Admin;

use App\Beritum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBeritasRequest;
use App\Http\Requests\Admin\UpdateBeritasRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class BeritasController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Beritum.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('beritum_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('beritum_delete')) {
                return abort(401);
            }
            $beritas = Beritum::onlyTrashed()->get();
        } else {
            $beritas = Beritum::all();
        }

        return view('admin.beritas.index', compact('beritas'));
    }

    /**
     * Show the form for creating new Beritum.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('beritum_create')) {
            return abort(401);
        }
        return view('admin.beritas.create');
    }

    /**
     * Store a newly created Beritum in storage.
     *
     * @param  \App\Http\Requests\StoreBeritasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBeritasRequest $request)
    {
        if (! Gate::allows('beritum_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $beritum = Beritum::create($request->all());



        return redirect()->route('admin.beritas.index');
    }


    /**
     * Show the form for editing Beritum.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('beritum_edit')) {
            return abort(401);
        }
        $beritum = Beritum::findOrFail($id);

        return view('admin.beritas.edit', compact('beritum'));
    }

    /**
     * Update Beritum in storage.
     *
     * @param  \App\Http\Requests\UpdateBeritasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBeritasRequest $request, $id)
    {
        if (! Gate::allows('beritum_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $beritum = Beritum::findOrFail($id);
        $beritum->update($request->all());



        return redirect()->route('admin.beritas.index');
    }


    /**
     * Display Beritum.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('beritum_view')) {
            return abort(401);
        }
        $beritum = Beritum::findOrFail($id);

        return view('admin.beritas.show', compact('beritum'));
    }


    /**
     * Remove Beritum from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('beritum_delete')) {
            return abort(401);
        }
        $beritum = Beritum::findOrFail($id);
        $beritum->delete();

        return redirect()->route('admin.beritas.index');
    }

    /**
     * Delete all selected Beritum at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('beritum_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Beritum::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Beritum from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('beritum_delete')) {
            return abort(401);
        }
        $beritum = Beritum::onlyTrashed()->findOrFail($id);
        $beritum->restore();

        return redirect()->route('admin.beritas.index');
    }

    /**
     * Permanently delete Beritum from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('beritum_delete')) {
            return abort(401);
        }
        $beritum = Beritum::onlyTrashed()->findOrFail($id);
        $beritum->forceDelete();

        return redirect()->route('admin.beritas.index');
    }
}
