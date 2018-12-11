@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.berita.title')</h3>
    
    {!! Form::model($berita, ['method' => 'PUT', 'route' => ['admin.beritas.update', $berita->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('judul', trans('quickadmin.berita.fields.judul').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('judul', old('judul'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('judul'))
                        <p class="help-block">
                            {{ $errors->first('judul') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('kontent', trans('quickadmin.berita.fields.kontent').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('kontent', old('kontent'), ['class' => 'form-control editor', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('kontent'))
                        <p class="help-block">
                            {{ $errors->first('kontent') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($berita->picture)
                        <a href="{{ asset(env('UPLOAD_PATH').'/'.$berita->picture) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$berita->picture) }}"></a>
                    @endif
                    {!! Form::label('picture', trans('quickadmin.berita.fields.picture').'', ['class' => 'control-label']) !!}
                    {!! Form::file('picture', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('picture_max_size', 5) !!}
                    {!! Form::hidden('picture_max_width', 4096) !!}
                    {!! Form::hidden('picture_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('picture'))
                        <p class="help-block">
                            {{ $errors->first('picture') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>

@stop