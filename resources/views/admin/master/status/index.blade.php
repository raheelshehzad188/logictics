@extends('admin.layouts.app')

@section('title')
    Status
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
                        <h4 class="m-0 text-dark">Status</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item">Masters</li>
                            <li class="breadcrumb-item active">Status</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row align-items-center mt-2">
                    <div class="col-md-6">
                    <!-- @component('admin.components.datatable.actions')@endcomponent -->
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.masters.status.create') }}"
                           class="btn btn-sm bg-gradient-primary float-right"><i class="fas fa-plus"></i>&nbsp; Add New</a>
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
                                                <th>Sr.no</th>
                                                <th>Name</th>
                                                <th>Parent</th>
                                                <th>Options</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($statuses as $key => $row_status)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $row_status->name }}</td>
                                                    @if($row_status->parent_id == '5')
                                                        <td>Other</td>
                                                    @else
                                                        <td>-</td>
                                                    @endif

                                                    @if($row_status->parent_id == '5')
                                                        <td>
                                                            <a href="{{ route('admin.masters.status.edit',$row_status->id) }}"
                                                               class="btn btn-xs btn-primary">Edit</a>
                                                            &nbsp;<a
                                                                href="{{route('admin.masters.status.destroy',$row_status->id)}}"
                                                                class="btn btn-xs btn-danger"
                                                                data-confirm="Are you sure to delete this status ?">
                                                                Delete </a>
                                                        </td>
                                                    @else
                                                        <td>-</td>
                                                    @endif
                                                </tr>
                                            @endforeach
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
                serverSide: false,
                stateSave: false,
                deferRender: true,
                lengthMenu: [
                    [10, 25, 50, 100, 1000],
                    [10, 25, 50, 100, 1000]
                ],
                pageLength: 10,
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2, 3]
                },
                    {
                        className: '',
                        targets: [3]
                    },
                    // {width: '30px', targets: 0},
                    // {width: '50px', targets: 1},
                    // {width: '60px', targets: 6},
                    // {width: '30px', targets: 7}
                ],
                /* ajax: {
                     url: '{{ route('admin.users.admins.index') }}',
                 dataType: 'json',
                 type: 'GET',
                 data: function (d) {
                     d.sort = '{{ request()->query('sort') }}';
                     d.status = '{{ request()->query('status') }}';
                     d.onlyTrashed = '{{ request()->query('onlyTrashed') }}';
                 }
             },
              columns: [
                 {data: 'id'},
                 {data: 'avatar_url'},
                 {data: 'name'},
                 {data: 'email'},
                 {data: 'mobile'},
                 {data: 'roles'},
                 {data: 'status'},
                 {data: 'options'}
             ] */
            });

        });
    </script>
@endsection
