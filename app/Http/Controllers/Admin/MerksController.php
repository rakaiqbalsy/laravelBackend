<?php

namespace App\Http\Controllers\Admin;

use App\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMerksRequest;
use App\Http\Requests\Admin\UpdateMerksRequest;

class MerksController extends Controller
{
    /**
     * Display a listing of Merk.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('merk_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('merk_delete')) {
                return abort(401);
            }
            $merks = Merk::onlyTrashed()->get();
        } else {
            $merks = Merk::all();
        }

        return view('admin.merks.index', compact('merks'));
    }

    /**
     * Show the form for creating new Merk.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('merk_create')) {
            return abort(401);
        }
        return view('admin.merks.create');
    }

    /**
     * Store a newly created Merk in storage.
     *
     * @param  \App\Http\Requests\StoreMerksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerksRequest $request)
    {
        if (! Gate::allows('merk_create')) {
            return abort(401);
        }
        $merk = Merk::create($request->all());



        return redirect()->route('admin.merks.index');
    }


    /**
     * Show the form for editing Merk.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('merk_edit')) {
            return abort(401);
        }
        $merk = Merk::findOrFail($id);

        return view('admin.merks.edit', compact('merk'));
    }

    /**
     * Update Merk in storage.
     *
     * @param  \App\Http\Requests\UpdateMerksRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerksRequest $request, $id)
    {
        if (! Gate::allows('merk_edit')) {
            return abort(401);
        }
        $merk = Merk::findOrFail($id);
        $merk->update($request->all());



        return redirect()->route('admin.merks.index');
    }


    /**
     * Display Merk.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('merk_view')) {
            return abort(401);
        }
        $test_drives = \App\TestDrive::where('merk_id', $id)->get();

        $merk = Merk::findOrFail($id);

        return view('admin.merks.show', compact('merk', 'test_drives'));
    }


    /**
     * Remove Merk from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('merk_delete')) {
            return abort(401);
        }
        $merk = Merk::findOrFail($id);
        $merk->delete();

        return redirect()->route('admin.merks.index');
    }

    /**
     * Delete all selected Merk at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('merk_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Merk::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Merk from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('merk_delete')) {
            return abort(401);
        }
        $merk = Merk::onlyTrashed()->findOrFail($id);
        $merk->restore();

        return redirect()->route('admin.merks.index');
    }

    /**
     * Permanently delete Merk from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('merk_delete')) {
            return abort(401);
        }
        $merk = Merk::onlyTrashed()->findOrFail($id);
        $merk->forceDelete();

        return redirect()->route('admin.merks.index');
    }
}
