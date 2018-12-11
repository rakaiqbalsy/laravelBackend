@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.merk.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.merk.fields.merk')</th>
                            <td field-key='merk'>{{ $merk->merk }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.merk.fields.carname')</th>
                            <td field-key='carname'>{{ $merk->carname }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#test_drive" aria-controls="test_drive" role="tab" data-toggle="tab">Test drive</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="test_drive">
<table class="table table-bordered table-striped {{ count($test_drives) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.test-drive.fields.nama')</th>
                        <th>@lang('quickadmin.test-drive.fields.email')</th>
                        <th>@lang('quickadmin.test-drive.fields.ktp')</th>
                        <th>@lang('quickadmin.test-drive.fields.alamat')</th>
                        <th>@lang('quickadmin.test-drive.fields.tanggal-test-drive')</th>
                        <th>@lang('quickadmin.test-drive.fields.jenis-sim')</th>
                        <th>@lang('quickadmin.test-drive.fields.merk')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($test_drives) > 0)
            @foreach ($test_drives as $test_drive)
                <tr data-entry-id="{{ $test_drive->id }}">
                    <td field-key='nama'>{{ $test_drive->nama }}</td>
                                <td field-key='email'>{{ $test_drive->email }}</td>
                                <td field-key='ktp'>{{ $test_drive->ktp }}</td>
                                <td field-key='alamat'>{{ $test_drive->alamat }}</td>
                                <td field-key='tanggal_test_drive'>{{ $test_drive->tanggal_test_drive }}</td>
                                <td field-key='jenis_sim'>{{ $test_drive->jenis_sim }}</td>
                                <td field-key='merk'>{{ $test_drive->merk->carname ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('test_drive_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.test_drives.restore', $test_drive->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('test_drive_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.test_drives.perma_del', $test_drive->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('test_drive_view')
                                    <a href="{{ route('admin.test_drives.show',[$test_drive->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('test_drive_edit')
                                    <a href="{{ route('admin.test_drives.edit',[$test_drive->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('test_drive_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.test_drives.destroy', $test_drive->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.merks.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


