@extends('backend.layouts.app')

@section('title')
    {{ __($module_action) }} {{ __($module_title) }}
@endsection



@section('content')
    <div class="card">
        <div class="card-body">

            <x-backend.section-header>
                <i class="{{ $module_icon }}"></i> {{ $module_title }} <small
                    class="text-muted">{{ __($module_action) }}</small>

                <x-slot name="subtitle">
                    @lang(':module_name Management Dashboard', ['module_name' => Str::title($module_name)])
                </x-slot>
            </x-backend.section-header>

            <hr>

            <div class="row mt-4">
                <div class="col">
                    {{ html()->form('POST', route("backend.notification-templates.store"))->acceptsFiles()->class('form')->open() }}
                    @include ('notificationtemplate::backend.notificationtemplates.form')
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: 'link image code',
            toolbar: 'undo redo | styleselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify | removeformat | code | image',
        });
        $(document).on('click', '.variable_button', function() {
            const textarea = $(document).find('.tab-pane.active');
            const textareaID = textarea.find('textarea').attr('id');
            tinyMCE.activeEditor.selection.setContent($(this).attr('data-value'));
        });
    </script>
@endpush
