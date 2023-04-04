@extends('admin.layouts.app')

@section('title')
    Card Report
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
                        <h4 class="m-0 text-dark">Card Report</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Cards list</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <!-- small box -->
                                    <div class="small-box bg-blue mt-3">
                                        <div class="inner">
                                            <h3>{{$data->total_cards_count}}</h3>
                                            <p>Total Cards</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-card"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <!-- small box -->
                                    <div class="small-box bg-blue mt-3">
                                        <div class="inner">
                                            <h3>{{$data->total_cards_with_gnp_count}}</h3>
                                            <p>Cards with GNP</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-card"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <!-- small box -->
                                    <div class="small-box bg-blue mt-3">
                                        <div class="inner">
                                            <h3>{{$data->total_processed_card_count}}</h3>
                                            <p>Processed Cards</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-card"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <!-- small box -->
                                    <div class="small-box bg-info mt-3">
                                        <div class="inner">
                                            <h3>{{$data->out_for_delivery_cnt}}</h3>
                                            <p>Out for Delivery</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-card"></i>
                                        </div>
                                        <a href="javascript:void(0)"
                                           class="small-box-footer" data-status-id="1"
                                           data-card-class="bg-info">-</a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4">
                                    <!-- small box -->
                                    <div class="small-box bg-success mt-3">
                                        <div class="inner">
                                            <h3>{{$data->deliverd_cnt}}</h3>

                                            <p>Delivered</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-card"></i>
                                        </div>
                                        <a href="javascript:void(0)" class="small-box-footer cardinfo-btn"
                                           data-status-id="3" data-card-class="bg-success">More
                                            info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4">
                                    <!-- small box -->
                                    <div class="small-box bg-warning mt-3">
                                        <div class="inner">
                                            <h3>{{$data->return_to_bank_cnt}}</h3>

                                            <p>Return to Bank</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-card"></i>
                                        </div>
                                        <a href="javascript:void(0)"
                                           class="small-box-footer cardinfo-btn" data-status-id="2"
                                           data-card-class="bg-warning">More
                                            info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Created date range</label>
                                        <input type="text" name="datetimes" id="f_datetimes"
                                               class="form-control filter_clear" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Delivery date range</label>
                                        <input type="text" name="datetimes1" id="f_datetimes1"
                                               class="form-control filter_clear" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Batch No</label>
                                        <input type="text" name="batch_no" value=""
                                               class="form-control filter_clear">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Card No</label>
                                        <input type="text" name="card_no" value=""
                                               class="form-control filter_clear">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <input type="text" name="customer_name" value=""
                                               class="form-control filter_clear">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>CIF No</label>
                                        <input type="text" name="cif_number" value=""
                                               class="form-control filter_clear">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Civil ID No</label>
                                        <input type="text" name="civil_id" value=""
                                               class="form-control filter_clear">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Mobile No</label>
                                        <input type="text" name="mobile_no" value=""
                                               class="form-control filter_clear">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Telephone No</label>
                                        <input type="text" name="telephone_no" value=""
                                               class="form-control filter_clear">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select id="f_status" name="f_status"
                                                class="form-control js-select2 filter_clear">
                                            <option value="">Select Status</option>
                                            <option
                                                value="0">Newly Arrived
                                            </option>
                                            <option
                                                value="1">Out For Delivery
                                            </option>
                                            <option
                                                value="2">Return to Bank
                                            </option>
                                            <option
                                                value="3">Delivered
                                            </option>
                                            <option
                                                value="4">Other
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <input type="button"
                                               class="form-control btn btn-sm bg-gradient-info"
                                               id="filter_items" value="Filter">
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <input type="button"
                                               class="form-control btn btn-sm bg-gradient-danger"
                                               id="filter_clear" value="Clear">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
                                            <th>Created Date</th>
                                            <th>Delivery Date</th>
                                            <th>Batch no.</th>
                                            <th>Card number</th>
                                            <th>Customer name</th>
                                            <th>CIF number</th>
                                            <th>Civil ID number</th>
                                            <th>Mobile number</th>
                                            <th>Telephone number</th>
                                            <th>Current status</th>
                                            <th>History</th>
                                            <th>Options</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    {{--                                    <tr>--}}
                                    {{--                                        <td>08-09-2022</td>--}}
                                    {{--                                        <td>47035XXXXXXX7652</td>--}}
                                    {{--                                        <td>BUTHAYNAH MOHAMMAD</td>--}}
                                    {{--                                        <td>107038</td>--}}
                                    {{--                                        <td>273110500368</td>--}}
                                    {{--                                        <td>0096566363337</td>--}}
                                    {{--                                        <td>0092342332323</td>--}}
                                    {{--                                        <td>Delivered</td>--}}
                                    {{--                                        <td>--}}
                                    {{--                                            <a href="{{ route('admin.cards.history') }}"--}}
                                    {{--                                               class="btn btn-sm bg-gradient-lightblue">History</a>--}}
                                    {{--                                        </td>--}}
                                    {{--                                    </tr>--}}
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

    <div class="modal fade bd-example-modal-lg" id="modalDetails" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Monthly Card Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="p-4">
                    <div class="row" id="monthly-report">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent

    @stack('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                $('input[name="datetimes"]').daterangepicker({
                    timePicker: false,
                    autoUpdateInput: false,
                    locale: {
                        format: 'DD/M/yy'
                    }
                });

                $('input[name="datetimes"]').on('apply.daterangepicker', function (ev, picker) {
                    $(this).val(picker.startDate.format('DD/M/YYYY') + ' - ' + picker.endDate.format('DD/M/YYYY'));
                });

                $('input[name="datetimes"]').on('cancel.daterangepicker', function (ev, picker) {
                    $(this).val('');
                });

                $('input[name="datetimes1"]').daterangepicker({
                    timePicker: false,
                    autoUpdateInput: false,
                    locale: {
                        format: 'DD/M/yy'
                    }
                });

                $('input[name="datetimes1"]').on('apply.daterangepicker', function (ev, picker) {
                    $(this).val(picker.startDate.format('DD/M/YYYY') + ' - ' + picker.endDate.format('DD/M/YYYY'));
                });

                $('input[name="datetimes1"]').on('cancel.daterangepicker', function (ev, picker) {
                    $(this).val('');
                });
            });

            var current_datetime = new Date().toISOString().split('T')[0];
            var table = $('#table').DataTable({
                dom: '<"pl-2 pt-2 pr-2 pb-2" <"row" <"col-lg-5" l><"col-lg-5" f><"col-lg-2" B>> > rt <"border-top pl-2 pt-2 pr-2 pb-2 " <"row" <"col-lg-6" i><"col-lg-6" p>> >',
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        text: 'PDF',
                        title: '',
                        filename: 'All-' + current_datetime,
                        exportOptions:
                            {
                                orthogonal: 'export',
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                            },
                        customize: function (doc) {
                            doc.pageMargins = [10, 80, 10, 10];
                            doc.defaultStyle.fontSize = 7;
                            doc.styles.tableHeader.fontSize = 7;
                            // Create a footer
                            doc['header'] = (function (page, pages) {
                                return {
                                    columns: [
                                        {
                                            // This is the right column
                                            alignment: 'center',
                                            image: @include('admin.layouts.print-header-image'),
                                            width: 570
                                        }
                                    ],
                                    margin: [10, 0]
                                }
                            });
                            doc['footer'] = (function (page, pages) {
                                return {
                                    columns: [
                                        {
                                            // This is the right column
                                            alignment: 'right',
                                            text: ['page ', {text: page.toString()}, ' of ', {text: pages.toString()}]
                                        }
                                    ],
                                    margin: [10, 0]
                                }
                            });
                            // Styling the table: create style object
                            var objLayout = {};
                            // Horizontal line thickness
                            objLayout['hLineWidth'] = function (i) {
                                return .5;
                            };
                            // Vertikal line thickness
                            objLayout['vLineWidth'] = function (i) {
                                return .5;
                            };
                            // Horizontal line color
                            objLayout['hLineColor'] = function (i) {
                                return '#aaa';
                            };
                            // Vertical line color
                            objLayout['vLineColor'] = function (i) {
                                return '#aaa';
                            };
                            // Left padding of the cell
                            objLayout['paddingLeft'] = function (i) {
                                return 4;
                            };
                            // Right padding of the cell
                            objLayout['paddingRight'] = function (i) {
                                return 4;
                            };
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        title: '',
                        filename: 'All-' + current_datetime,
                        exportOptions:
                            {
                                orthogonal: 'export',
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                            }
                    }
                ],
                lengthChange: true,
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
                pageLength: 500,
                lengthMenu: [[500, 10000000], [500, 'All']],
                order: [
                    [0, 'DESC']
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [1]
                }],
                ajax: {
                    url: "{{route('admin.cards.all.dataTable')}}",
                    dataType: 'json',
                    type: 'GET',
                    data: function (d) {
                        d.type = 'allcards';
                        d.datetimes = $("#f_datetimes").val();
                        d.datetimes1 = $("#f_datetimes1").val();
                        d.driver_id = $("#f_driver_id").val();
                        d.batch_no = $("input[name=batch_no]").val();
                        d.customer_name = $("input[name=customer_name]").val();
                        d.batch_sr_no = $("input[name=batch_sr_no]").val();
                        d.card_no = $("input[name=card_no]").val();
                        d.cif_number = $("input[name=cif_number]").val();
                        d.civil_id = $("input[name=civil_id]").val();
                        d.mobile_no = $("input[name=mobile_no]").val();
                        d.telephone_no = $("input[name=telephone_no]").val();
                        d.area_id = $("#f_area_id").val();
                        d.block_id = $("#f_block_id").val();
                        d.status = $("#f_status").val();
                    }
                },
                columns: [{
                    data: 'created_at'
                }, {
                    data: 'delivery_date'
                }, {
                    data: 'batch_no'
                }, {
                    data: 'card_no'
                }, {
                    data: 'customer_name'
                }, {
                    data: 'cif_no'
                }, {
                    data: 'civil_id'
                }, {
                    data: 'mobile_no'
                }, {
                    data: 'telephone_no'
                }, {
                    data: 'status_name'
                }, {
                    data: 'history'
                }, {
                    data: 'option'
                }]
            });

            $('#filter_items').on('click', function () {
                table.draw();
            });
            $('#filter_clear').on('click', function () {
                $('.filter_clear').val('').trigger('change');
                table.draw();
            });

            //On Area Change
            $('.cardinfo-btn').on('click', function () {
                var status = $(this).data('status-id');
                var cardClass = $(this).data('card-class');
                var self = this;
                $('#monthly-report').html('');
                $(self).find('i').removeClass('fa-arrow-circle-right');
                $(self).find('i').addClass('fa-spinner');

                $.ajax({
                    type: 'POST',
                    url: '{{route('admin.cards.all.count.report')}}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'status': status
                    },
                    dataType: 'json',
                    success: function (res) {
                        console.log(res);
                        $(self).find('i').removeClass('fa-spinner');
                        $(self).find('i').addClass('fa-arrow-circle-right');

                        if (res.status == 'ok') {
                            $.each(res.data.months, function (i, data) {
                                $('#monthly-report').append(
                                    `<div class="col-lg-4">
                                        <!-- small box -->
                                        <div class="small-box ${cardClass} mt-3">
                                            <div class="inner">
                                                <h3>${data.count}</h3>
                                                <p>${data.month}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-card"></i>
                                            </div>
                                        </div>
                                    </div>`
                                );

                            });
                            $('#modalDetails').modal('show');
                        }
                    }
                });
            });
        });
    </script>
@endsection
