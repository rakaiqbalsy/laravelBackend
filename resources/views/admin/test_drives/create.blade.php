@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.test-drive.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.test_drives.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nama', trans('quickadmin.test-drive.fields.nama').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nama', old('nama'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nama'))
                        <p class="help-block">
                            {{ $errors->first('nama') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('quickadmin.test-drive.fields.email').'*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ktp', trans('quickadmin.test-drive.fields.ktp').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('ktp', old('ktp'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ktp'))
                        <p class="help-block">
                            {{ $errors->first('ktp') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('alamat', trans('quickadmin.test-drive.fields.alamat').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('alamat', old('alamat'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('alamat'))
                        <p class="help-block">
                            {{ $errors->first('alamat') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tanggal_test_drive', trans('quickadmin.test-drive.fields.tanggal-test-drive').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('tanggal_test_drive', old('tanggal_test_drive'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tanggal_test_drive'))
                        <p class="help-block">
                            {{ $errors->first('tanggal_test_drive') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('jenis_sim', trans('quickadmin.test-drive.fields.jenis-sim').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('jenis_sim', old('jenis_sim'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jenis_sim'))
                        <p class="help-block">
                            {{ $errors->first('jenis_sim') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('merk_id', trans('quickadmin.test-drive.fields.merk').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('merk_id', $merks, old('merk_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('merk_id'))
                        <p class="help-block">
                            {{ $errors->first('merk_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
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