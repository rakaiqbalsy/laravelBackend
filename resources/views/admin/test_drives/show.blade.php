@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.test-drive.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.test-drive.fields.nama')</th>
                            <td field-key='nama'>{{ $test_drive->nama }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.test-drive.fields.email')</th>
                            <td field-key='email'>{{ $test_drive->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.test-drive.fields.ktp')</th>
                            <td field-key='ktp'>{{ $test_drive->ktp }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.test-drive.fields.alamat')</th>
                            <td field-key='alamat'>{{ $test_drive->alamat }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.test-drive.fields.tanggal-test-drive')</th>
                            <td field-key='tanggal_test_drive'>{{ $test_drive->tanggal_test_drive }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.test-drive.fields.jenis-sim')</th>
                            <td field-key='jenis_sim'>{{ $test_drive->jenis_sim }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.test-drive.fields.merk')</th>
                            <td field-key='merk'>{{ $test_drive->merk->carname ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.test_drives.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop
