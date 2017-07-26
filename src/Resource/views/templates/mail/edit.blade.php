{{-- Extends Master Layout --}}
@extends($viewNamespace . '::layouts.master')

{{-- Meta Title --}}
@section('title', 'Mail Templates')

{{-- Page Title --}}
@section('page-title', 'Mail Templates')

{{-- Page Subtitle --}}
@section('page-subtitle', 'Edit')

{{-- Content Section --}}
@section('content')
    {!! BootForm::open()->post()->action(route('mail-sender.templates.update', ['id' => $template->id])) !!}

    {{-- Bind Model to Form for Filling out Inputs --}}
    {!! BootForm::bind($template) !!}

    {!! BootForm::text('Slug', 'slug') !!}
    {!! BootForm::text('Name', 'name') !!}
    {!! BootForm::text('Subject', 'subject') !!}
    {!! BootForm::textarea('Body', 'body') !!}

    <div class="box">
        <div class="box-body">
            {!! BootForm::button('Save')->type('submit')->class('btn btn-success') !!}
        </div>
    </div>

    {!! BootForm::close() !!}

@stop