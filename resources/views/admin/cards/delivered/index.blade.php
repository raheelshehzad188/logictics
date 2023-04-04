@extends('admin.layouts.app')

@section('title')
    Delivered Card
@endsection

@section('header')
    @parent
@endsection

@section('content')
    <style>
        .map-container {
            overflow: hidden;
            /* padding-bottom:56.25%; */
            position: relative;
            height: 0;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 250px;
            width: 100%;
            position: absolute;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Delivered Card</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item">Card Management</li>
                            <li class="breadcrumb-item active">Delivered Card</li>
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
                        <!-- @component('admin.components.datatable.actions')
    @endcomponent -->
                    </div>
                    <div class="col-md-6">
                        <!-- <a href="#" class="btn btn-sm bg-gradient-primary float-right "> Print</a> -->
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card card-outline">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mt-6">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Delivery Date range</label>
                                                    <input type="text" name="datetimes" id="f_datetimes"
                                                        class="form-control filter_clear" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Driver name</label>
                                                    <select id="f_driver_id" multiple
                                                        class="form-control js-select2 filter_clear">
                                                        {{-- <option value="">Select Driver</option> --}}
                                                        @foreach ($all_drivers as $row_driver)
                                                            <option value="{{ $row_driver['id'] }}">
                                                                {{ $row_driver['driver_name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Batch no</label>
                                                    <input type="text" name="batch_no" value=""
                                                        class="form-control filter_clear">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Batch serial no</label>
                                                    <input type="text" name="batch_sr_no" value=""
                                                        class="form-control filter_clear">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-6">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Card no</label>
                                                    <input type="text" name="card_no" value=""
                                                        class="form-control filter_clear">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>CIF no</label>
                                                    <input type="text" name="cif_number" value=""
                                                        class="form-control filter_clear">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Civil id</label>
                                                    <input type="text" name="civil_id" value=""
                                                        class="form-control filter_clear">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Mobile no</label>
                                                    <input type="number" name="mobile_no" value=""
                                                        class="form-control filter_clear">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-6">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Telephone no</label>
                                                    <input type="text" name="telephone_no" value=""
                                                        class="form-control filter_clear">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Area</label>
                                                    <select id="f_area_id" multiple
                                                        class="form-control js-select2 filter_clear">
                                                        {{-- <option value="">Select Area</option> --}}
                                                        @foreach ($all_areas as $row_area)
                                                            <option value="{{ $row_area->id }}">{{ $row_area->name }}
                                                                ({{ $row_area->order_count }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Block</label>
                                                    <select id="f_block_id" multiple
                                                        class="form-control block_id js-select2 filter_clear">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <input type="button" class="form-control btn btn-sm bg-gradient-info"
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
                                        </div>
                                    </div><!-- /.row -->
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
                                                    <th>Delivery date</th>
                                                    <th>Card no</th>
                                                    <th>Customer Name</th>
                                                    <th>CIF no</th>
                                                    <th>Mobile no</th>
                                                    <th>Telephone no</th>
                                                    <th>Civil id</th>
                                                    <th>Batch no</th>
                                                    <th>Batch sr.no</th>
                                                    <th>Driver name</th>
                                                    <th>Area</th>
                                                    <th>Block</th>
                                                    <th>Address</th>
                                                    <th>Remark</th>
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
    <div class="modal fade bd-example-modal-lg" id="modalSaveCards" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="card_modal_html"></div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent

    @stack('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(function() {
                $('input[name="datetimes"]').daterangepicker({
                    timePicker: false,
                    autoUpdateInput: false,
                    locale: {
                        format: 'DD/M/yy'
                    }
                });

                $('input[name="datetimes"]').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('DD/M/YYYY') + ' - ' + picker.endDate
                        .format('DD/M/YYYY'));
                });

                $('input[name="datetimes"]').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });
            });
            var current_datetime = new Date().toISOString().split('T')[0];
            var table = $('#table').DataTable({
                dom: '<"pl-2 pt-2 pr-2 pb-2" <"row" <"col-lg-5" l><"col-lg-5" f><"col-lg-2" B>> > rt <"border-top pl-2 pt-2 pr-2 pb-2 " <"row" <"col-lg-6" i><"col-lg-6" p>> >',
                buttons: [{
                        extend: 'pdfHtml5',
                        text: 'PDF',
                        title: '',
                        filename: 'Delivered-' + current_datetime,
                        exportOptions: {
                            orthogonal: 'export',
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 9, 13]
                        },
                        customize: function(doc) {
                            doc.pageMargins = [10, 80, 10, 10];
                            doc.defaultStyle.fontSize = 7;
                            doc.styles.tableHeader.fontSize = 7;
                            // Create a footer
                            doc['header'] = (function(page, pages) {
                                return {
                                    columns: [{
                                        // This is the right column
                                        alignment: 'center',
                                        image: @include('admin.layouts.print-header-image'),
                                        width: 570
                                    }],
                                    margin: [10, 0]
                                }
                            });
                            doc['footer'] = (function(page, pages) {
                                return {
                                    columns: [{
                                        // This is the right column
                                        alignment: 'right',
                                        text: ['page ', {
                                            text: page.toString()
                                        }, ' of ', {
                                            text: pages.toString()
                                        }]
                                    }],
                                    margin: [10, 0]
                                }
                            });
                            // Styling the table: create style object
                            var objLayout = {};
                            // Horizontal line thickness
                            objLayout['hLineWidth'] = function(i) {
                                return .5;
                            };
                            // Vertikal line thickness
                            objLayout['vLineWidth'] = function(i) {
                                return .5;
                            };
                            // Horizontal line color
                            objLayout['hLineColor'] = function(i) {
                                return '#aaa';
                            };
                            // Vertical line color
                            objLayout['vLineColor'] = function(i) {
                                return '#aaa';
                            };
                            // Left padding of the cell
                            objLayout['paddingLeft'] = function(i) {
                                return 4;
                            };
                            // Right padding of the cell
                            objLayout['paddingRight'] = function(i) {
                                return 4;
                            };
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        title: '',
                        filename: 'Delivered-' + current_datetime,
                        exportOptions: {
                            orthogonal: 'export',
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 9, 13]
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
                lengthMenu: [
                    [1000, 10000000],
                    [1000, 'All']
                ],
                columnDefs: [{
                        orderable: false,
                        targets: [13]
                    },
                    {
                        width: '10%',
                        targets: 13
                    }
                ],
                ajax: {
                    url: "{{ route('admin.cards.dataTable') }}",
                    dataType: 'json',
                    type: 'GET',
                    data: function(d) {
                        d.type = 'delivered';
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
                        data: 'delivery_date'
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
                        data: 'mobile_no'
                    },
                    {
                        data: 'telephone_no'
                    },
                    {
                        data: 'civil_id'
                    },
                    {
                        data: 'batch_no'
                    },
                    {
                        data: 'batch_sr_no'
                    },
                    {
                        data: 'driver_name'
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
                    },
                    {
                        data: 'option'
                    }
                ]
            });
            $('#filter_items').on('click', function() {
                table.draw();
            });
            $('#filter_clear').on('click', function() {
                $('.filter_clear').val('').trigger('change');
                location.reload();
                table.draw();
            });
        });

        function updateCardDetails(card_id) {
            $.ajax({
                url: "{{ route('admin.cards.getCardDetails') }}",
                type: 'GET',
                data: {
                    card_id: card_id,
                    type: ''
                },
                success: function(res) {
                    $('#card_modal_html').html(res);
                    $('#modalSaveCards').modal('show');
                }
            });
        }

        //On Area Change
        $('#modalSaveCards #area_id, #f_area_id').on('change', function() {
            var area_id = $(this).val();
            console.log(area_id);
            $.ajax({
                url: "{{ route('admin.cards.getBlock') }}",
                type: "get",
                data: {
                    area_id: area_id,
                },
                success: function(res) {
                    var len = res.length;
                    $(".block_id").empty();
                    var optionHtml = '';
                    optionHtml += '<option value="">--Please Select--</option>';
                    for (var i = 0; i < len; i++) {
                        var id = res[i]['id'];
                        var name = res[i]['name'];
                        optionHtml += '<option  value="' + id + '">' + name + '</option>';
                    }
                    $(".block_id").append(optionHtml);
                }
            });
        });
    </script>
@endsection
