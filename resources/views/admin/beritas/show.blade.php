@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.berita.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.berita.fields.judul')</th>
                            <td field-key='judul'>{{ $berita->judul }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.berita.fields.kontent')</th>
                            <td field-key='kontent'>{!! $berita->kontent !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.berita.fields.picture')</th>
                            <td field-key='picture'>@if($berita->picture)<a href="{{ asset(env('UPLOAD_PATH').'/' . $berita->picture) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $berita->picture) }}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.beritas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
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
