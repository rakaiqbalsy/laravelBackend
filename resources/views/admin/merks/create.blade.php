@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.merk.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.merks.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('merk', trans('quickadmin.merk.fields.merk').'', ['class' => 'control-label']) !!}
                    {!! Form::text('merk', old('merk'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('merk'))
                        <p class="help-block">
                            {{ $errors->first('merk') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('carname', trans('quickadmin.merk.fields.carname').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('carname', old('carname'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('carname'))
                        <p class="help-block">
                            {{ $errors->first('carname') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

