<?php

namespace App\Http\Controllers\Admin;

use App\TestDrive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTestDrivesRequest;
use App\Http\Requests\Admin\UpdateTestDrivesRequest;

class TestDrivesController extends Controller
{
    /**
     * Display a listing of TestDrive.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('test_drive_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('test_drive_delete')) {
                return abort(401);
            }
            $test_drives = TestDrive::onlyTrashed()->get();
        } else {
            $test_drives = TestDrive::all();
        }

        return view('admin.test_drives.index', compact('test_drives'));
    }

    /**
     * Show the form for creating new TestDrive.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('test_drive_create')) {
            return abort(401);
        }
        
        $merks = \App\Merk::get()->pluck('carname', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.test_drives.create', compact('merks'));
    }

    /**
     * Store a newly created TestDrive in storage.
     *
     * @param  \App\Http\Requests\StoreTestDrivesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestDrivesRequest $request)
    {
        if (! Gate::allows('test_drive_create')) {
            return abort(401);
        }
        $test_drive = TestDrive::create($request->all());



        return redirect()->route('admin.test_drives.index');
    }


    /**
     * Show the form for editing TestDrive.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('test_drive_edit')) {
            return abort(401);
        }
        
        $merks = \App\Merk::get()->pluck('carname', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $test_drive = TestDrive::findOrFail($id);

        return view('admin.test_drives.edit', compact('test_drive', 'merks'));
    }

    /**
     * Update TestDrive in storage.
     *
     * @param  \App\Http\Requests\UpdateTestDrivesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestDrivesRequest $request, $id)
    {
        if (! Gate::allows('test_drive_edit')) {
            return abort(401);
        }
        $test_drive = TestDrive::findOrFail($id);
        $test_drive->update($request->all());



        return redirect()->route('admin.test_drives.index');
    }


    /**
     * Display TestDrive.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('test_drive_view')) {
            return abort(401);
        }
        $test_drive = TestDrive::findOrFail($id);

        return view('admin.test_drives.show', compact('test_drive'));
    }


    /**
     * Remove TestDrive from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('test_drive_delete')) {
            return abort(401);
        }
        $test_drive = TestDrive::findOrFail($id);
        $test_drive->delete();

        return redirect()->route('admin.test_drives.index');
    }

    /**
     * Delete all selected TestDrive at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('test_drive_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = TestDrive::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore TestDrive from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('test_drive_delete')) {
            return abort(401);
        }
        $test_drive = TestDrive::onlyTrashed()->findOrFail($id);
        $test_drive->restore();

        return redirect()->route('admin.test_drives.index');
    }

    /**
     * Permanently delete TestDrive from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('test_drive_delete')) {
            return abort(401);
        }
        $test_drive = TestDrive::onlyTrashed()->findOrFail($id);
        $test_drive->forceDelete();

        return redirect()->route('admin.test_drives.index');
    }
}
