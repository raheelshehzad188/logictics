@extends('admin.layouts.app')

@section('title')
    Call Centers
@endsection

@section('header')
    @parent

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Call Centers</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <!-- <li class="breadcrumb-item">Masters</li> -->
                            <li class="breadcrumb-item active">Call Centers</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
            <!-- @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif -->

                <div class="row align-items-center mt-2">
                    <div class="col-md-6">
                    <!-- @component('admin.components.datatable.actions')@endcomponent -->
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.callcenter.callcenter.create') }}"
                           class="btn btn-sm bg-gradient-primary float-right"><i class="fas fa-plus"></i>&nbsp; Add New</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card card-outline">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mt-6">
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <input type="text" name="username" id="f_username" value=""
                                                           class="form-control filter_clear">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>Agent Name</label>
                                                    <input type="text" name="agent_name" id="f_agent_name" value=""
                                                           class="form-control filter_clear">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>Contact no</label>
                                                    <input type="text" name="contact_number" id="f_contact_number"
                                                           value="" class="form-control filter_clear">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select name="status" id="f_status"
                                                            class="form-control filter_clear js-select2">
                                                        <option value="">Select Status</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <input type="button"
                                                           class="form-control btn btn-sm bg-gradient-info"
                                                           id="filter_items" value="Filter">
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <input type="button"
                                                           class="form-control btn btn-sm bg-gradient-danger"
                                                           id="filter_clear" value="Clear">
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table" id="table" style="margin: 0 !important;">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Agent Name</th>
                                                <th>Contact no</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('footer')
    @parent

    @stack('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#table').DataTable({
                dom: '<"pl-2 pt-2 pr-2" <"row" <"col-lg-6" l><"col-lg-6" f>> > rt <"border-top pl-2 pt-2 pr-2 pb-2 " <"row" <"col-lg-6" i><"col-lg-6" p>> >',
                lengthChange: false,
                searching: false,
                info: false,
                paging: true,
                searchHighlight: true,
                ordering: true,
                autoWidth: false,
                responsive: true,
                processing: true,
                serverSide: true,
                stateSave: false,
                deferRender: true,
                pageLength: 10,
                order: [
                    [0, 'DESC']
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [5]
                }],
                ajax: {
                    url: "{{route('admin.callcenter.dataTable')}}",
                    dataType: 'json',
                    type: 'GET',
                    data: function (d) {
                        d.username = $("input[name=username]").val();
                        d.agent_name = $("input[name=agent_name]").val();
                        d.contact_number = $("input[name=contact_number]").val();
                        d.status = $("#f_status").val();
                    }
                },
                columns: [{
                    data: 'id'
                },
                    {
                        data: 'username'
                    },
                    {
                        data: 'agent_name'
                    },
                    {
                        data: 'contact_number'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'options'
                    }
                ]
            });
            $('#filter_items').on('click', function () {
                table.draw();
            });
            $('#filter_clear').on('click', function () {
                $('.filter_clear').val('').trigger('change');
                table.draw();
            });

        });
    </script>
@endsection
