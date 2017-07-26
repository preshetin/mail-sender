{{-- Extends Master Layout --}}
@extends($viewNamespace . '::layouts.master')

{{-- Meta Title --}}
@section('title', 'Mail Templates')

{{-- Page Title --}}
@section('page-title', 'Mail Templates')

{{-- Page Subtitle --}}
@section('page-subtitle', 'All')

{{-- Header Extras to be Included --}}
@section('header-extras')
    {{-- Data Table Styles --}}
    <link href="{{ asset('vendor/laraflock/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css"/>
@stop

{{-- Content Section --}}
@section('content')

    {{-- DataTable Box --}}
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Mail Templates</h3>
        </div>
        <div class="box-body">
            <table id="index" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th class="datatable-nosort">{{ trans('dashboard::dashboard.table.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mail_templates as $template)
                    <tr class="">
                        <td class="text-center col-xs-1">
                            {{ $template->id }}
                        </td>
                        <td>
                            {{ $template->name or '-' }}
                        </td>
                        <td>
                            {{ $template->subject or '-' }}
                        </td>
                        <td class="text-center col-xs-1">
                            <a href="{{ route('mail-sender.templates.edit', ['id' => $template->id]) }}" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

{{-- Footer Extras to be Included --}}
@section('footer-extras')

    {{-- Data Table Scripts --}}
    <script src="{{ asset('vendor/laraflock/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/laraflock/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>

    {{-- Initiate DataTable --}}
    <script type="text/javascript">
        $(function () {
            $('#index').dataTable({
                order: [[0, 'desc']],
                columnDefs: [{
                    "targets": "datatable-nosort",
                    orderable: false
                }]
            });
        });
    </script>
@stop