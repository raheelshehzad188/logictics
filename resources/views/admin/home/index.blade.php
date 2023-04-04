@extends('admin.layouts.app')

@section('title')
    Home
@endsection

@section('header')
    @parent

    <style type="text/css">
        .small-box h3 {
            font-size: 1.5rem !important;
        }

        .highcharts-credits {
            display: none;
        }
    </style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info mt-3">
                            <div class="inner">
                                <h3>{{ $newly_arrive_cnt ?? 0 }}</h3>
                                <p>Newly Arrived Cards</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-card"></i>
                            </div>
                            <a href="{{ route('admin.cards.newly-arrived.index') }}" class="small-box-footer">More info
                                <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success mt-3">
                            <div class="inner">
                                <h3>{{ $deliverd_cnt ?? 0 }}</h3>

                                <p>Delivered Cards</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-card"></i>
                            </div>
                            <a href="{{ route('admin.cards.delivered.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning mt-3">
                            <div class="inner">
                                <h3>{{ $cll_center_cnt ?? 0 }}</h3>

                                <p>Call Centers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('admin.callcenter.callcenter.index') }}" class="small-box-footer">More
                                info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger mt-3">
                            <div class="inner">
                                <h3>{{ $driver_cnt ?? 0 }}</h3>

                                <p>Drivers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('admin.callcenter.callcenter.index') }}" class="small-box-footer">More
                                info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <button type="button" class="btn btn-primary" onclick="resetDates()">Reset Delivery Dates</button>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <h5 class="card-title p-3">Upcoming Deliveries</h5>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table" id="table" style="margin: 0 !important;">
                                            <thead>
                                                <tr>
                                                    <th>Batch no</th>
                                                    <th>Batch sr.no</th>
                                                    <th>Card no</th>
                                                    <th>Customer Name</th>
                                                    <th>CIF no</th>
                                                    <th>Civil ID</th>
                                                    <th>Mobile No</th>
                                                    <th>Telephone no</th>
                                                    <th>Delivery date</th>
                                                    <th>Area</th>
                                                    <th>Block</th>
                                                    <th>Address</th>
                                                    <th>Remark</th>
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
        $(document).ready(function() {
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
                ajax: {
                    url: "{{ route('admin.cards.dataTable') }}",
                    dataType: 'json',
                    type: 'GET',
                    data: function(d) {
                        d.type = 'upcoming_delivery';
                        d.datetimes = $("#f_datetimes").val();
                        d.driver_id = $("#f_driver_id").val();
                        d.batch_no = $("input[name=batch_no]").val();
                        d.batch_sr_no = $("input[name=batch_sr_no]").val();
                        d.card_no = $("input[name=card_no]").val();
                        d.cif_number = $("input[name=cif_number]").val();
                        d.civil_id = $("input[name=civil_id]").val();
                        d.mobile_no = $("input[name=mobile_no]").val();
                        d.telephone_no = $("input[name=telephone_no]").val();
                        d.area_id = $("#f_area_id").val();
                        d.block_id = $("#f_block_id").val();
                    }
                },
                columns: [{
                        data: 'batch_no'
                    },
                    {
                        data: 'batch_sr_no'
                    },
                    {
                        data: 'card_no'
                    },
                    {
                        data: 'customer_name'
                    },
                    {
                        data: 'cif_no'
                    },
                    {
                        data: 'civil_id'
                    },
                    {
                        data: 'mobile_no'
                    },
                    {
                        data: 'telephone_no'
                    },
                    {
                        data: 'delivery_date'
                    },
                    {
                        data: 'area_name'
                    },
                    {
                        data: 'block_name'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'remark'
                    }
                ]
            });
            $('#filter_items').on('click', function() {
                table.draw();
            });
            $('#filter_clear').on('click', function() {
                $('.filter_clear').val('').trigger('change');
                table.draw();
            });
        });

        const resetDates = () => {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Proceed',
                cancelButtonText: 'Cancel',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.reset_date') }}",
                        method: 'GET',
                        success: function(html) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: html.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection
