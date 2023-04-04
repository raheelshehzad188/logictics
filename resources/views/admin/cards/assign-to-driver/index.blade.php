@extends('admin.layouts.app')

@section('title')
    Assign to driver
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
                        <h4 class="m-0 text-dark">Assign to driver</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item">Card Management</li>
                            <li class="breadcrumb-item active">Assign to driver</li>
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
                        <a href="#" class="btn btn-sm bg-gradient-warning float-right" onclick="printMenifest()"><span
                                class="fa fa-print"></span> Print
                            Manifest</a>
                        <a href="#" class="btn btn-sm bg-gradient-success float-right mr-3"
                            onclick="markAsDelivered()">
                            <span class="fa fa-check-circle"></span> Mark As Delivered</a>
                        <a href="#" class="btn btn-sm bg-gradient-success float-right mr-3"
                            onclick="updateCardStatus()"><span class="fa fa-save"></span> Change Status</a>
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
                                                    <label>Date range</label>
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
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Delivery Date</label>
                                                    <input type="text" name="delivery_date" id="delivery_date"
                                                        class="form-control filter_clear" autocomplete="off">
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
                                        <span class="pl-2" style="display: flex;">
                                            Cards Selected (<div id="count">0</div>)
                                        </span>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table" id="table" style="margin: 0 !important;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Driver name</th>
                                                    <th>Batch no</th>
                                                    <th>Batch sr.no</th>
                                                    <th>Card no</th>
                                                    <th>Customer Name</th>
                                                    <th>CIF no</th>
                                                    <th>Civil id</th>
                                                    <th>Mobile no</th>
                                                    <th>Telephone no</th>
                                                    <th>Delivery date</th>
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
    <!-- Mark As Deliverd -->
    <!-- Model For delivered-->
    <div class="modal fade" id="mark_as_deliverd_modal" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" style="width: 100%;">Are you sure to mark as delivered?</h4>
                </div>
                <div class="modal-body">
                    <form id="mark_as_deliverd_form" action="{{ route('admin.cards.markAsDelivered') }}"
                        class="form-horizontal" autocomplete="off" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- /.card-body -->
                        <div style="display: flex;justify-content: space-around;">
                            <button data-dismiss="modal" aria-label="Close" class="btn btn-sm btn-danger"
                                style="border-radius: 5px; width: 100px;"><span class="fa fa-minus-circle"></span> Cancel
                            </button>
                            <button type="submit" class="btn btn-sm btn-success"
                                style="border-radius: 5px; width: 100px;"><span class="fa fa-check-circle"
                                    onclick="return hidepopup();"></span> OK
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Model For Menifest -->
    <div class="modal fade" id="menifest_modal" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" style="width: 100%;">Are you sure to Print Manifest?</h4>
                </div>
                <div class="modal-body">
                    <form id="menifest_form" target="_blank" action="{{ route('admin.cards.printManifest') }}"
                        class="form-horizontal" autocomplete="off" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="order_type" id="order_type" value="" />
                        <!-- /.card-body -->
                        <div style="display: flex;justify-content: space-around;">
                            <button data-dismiss="modal" aria-label="Close" class="btn btn-sm btn-danger"
                                style="border-radius: 5px; width: 100px;"><span class="fa fa-minus-circle"></span> Cancel
                            </button>
                            <button type="submit" class="btn btn-sm btn-success"
                                style="border-radius: 5px; width: 100px;" onclick="return hidepopup();"><span
                                    class="fa fa-check-circle"></span> OK
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Update Card Status Modal-->
    <div class="modal fade" id="update_card_status_modal" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="width: 100%;">Change Status</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.cards.updateCardStatus') }}" class="form-horizontal" autocomplete="off"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="action" value="CHANGE_STATUS" />
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="agent_id">Status<span class="requiredAsterisk">*</span></label>
                                        <select name="status"
                                            class="form-control js-select2 @error('status') is-invalid @enderror">
                                            <option value="">Select Status</option>
                                            @foreach ($all_status as $row_status)
                                                @if ($row_status['parent_id'] == 0 && $row_status->id != 3)
                                                    <option value="{{ $row_status->id }}">{{ $row_status->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                            <optgroup label="Others">
                                                @foreach ($all_status as $row_status)
                                                    @if ($row_status['parent_id'] != 0)
                                                        <option value="{{ $row_status->id }}">{{ $row_status->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                This field is required
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        @error('slected_row_id')
                                            <div class="invalid-feedback">
                                                Please select row from table.
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div style="display: flex;justify-content: space-between;">
                            <button data-dismiss="modal" aria-label="Close" class="btn btn-sm btn-danger"
                                style="border-radius: 5px; width: 100px;"><span class="fa fa-minus-circle"></span> Cancel
                            </button>
                            <button type="submit" class="btn btn-sm btn-success"
                                style="border-radius: 5px; width: 100px;"><span class="fa fa-check-circle"></span> OK
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent

    @stack('scripts')

    <script type="text/javascript">
        let getCount = 0;
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

                $('input[name="delivery_date"]').daterangepicker({
                    singleDatePicker: true,
                    timePicker: false,
                    autoUpdateInput: false,
                    locale: {
                        format: 'DD/M/yy'
                    }
                });

                $('input[name="delivery_date"]').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('DD/M/YYYY'));
                });

                $('input[name="delivery_date"]').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });
            });

            table = $('#table').DataTable({
                dom: '<"pl-2 pt-2 pr-2 pb-2" <"row" <"col-lg-5" l><"col-lg-5" f><"col-lg-2" B>> > rt <"border-top pl-2 pt-2 pr-2 pb-2 " <"row" <"col-lg-6" i><"col-lg-6" p>> >',
                buttons: [{
                        extend: 'pdfHtml5',
                        text: 'PDF',
                        title: '',
                        exportOptions: {
                            orthogonal: 'export',
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 14]
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
                        exportOptions: {
                            orthogonal: 'export',
                            columns: [1, 2, 3, 4, 5, 6, 7, 9, 10, 14]
                        }
                    }
                ],
                'lengthChange': false,
                'searching': false,
                'info': false,
                'paging': true,
                'searchHighlight': true,
                'ordering': true,
                'autoWidth': false,
                'responsive': true,
                'processing': true,
                'serverSide': true,
                'stateSave': false,
                'deferRender': true,
                'pageLength': 1000,
                'order': [
                    [0, 'DESC']
                ],
                'rowGroup': {
                    'dataSrc': 'batch_no',
                    'startRender': function(rows, group) {
                        // Assign class name to all child rows
                        var groupName = 'group-' + group.replace(/[^A-Za-z0-9]/g, '');
                        var rowNodes = rows.nodes();
                        rowNodes.to$().addClass(groupName);

                        // Get selected checkboxes
                        var checkboxesSelected = $('.dt-checkboxes:checked', rowNodes);

                        // Parent checkbox is selected when all child checkboxes are selected
                        var isSelected = (checkboxesSelected.length == rowNodes.length);

                        return '<label><input type="checkbox" class="group-checkbox" data-group-name="' +
                            groupName + '"' + (isSelected ? ' checked' : '') + '> ' + group + ' (' +
                            rows.count() + ')</label>';
                    }
                },
                'select': {
                    'style': 'multi'
                },
                'columnDefs': [{
                        orderable: false,
                        targets: [0, 13, 14]
                    },
                    {
                        width: '10%',
                        targets: 14
                    }
                ],
                'ajax': {
                    url: "{{ route('admin.cards.dataTable') }}",
                    dataType: 'json',
                    type: 'GET',
                    data: function(d) {
                        d.type = 'assign_to_driver';
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
                        d.delivery_date = $("#delivery_date").val();
                    }
                },
                'columns': [{
                        'data': 'id',
                        'checkboxes': {
                            'selectRow': true
                        },
                        'render': function(data, type, row, meta) {
                            data =
                                '<input type="checkbox" class="dt-checkboxes" id="' + row.id +
                                '" onclick="numberOfSelected(' + row.id + ')">'
                            if (row['position'] === 'Software Engineer') {
                                data = '';
                            }

                            return data;
                        },
                        'createdCell': function(td, cellData, rowData, row, col) {
                            if (rowData['position'] === 'Software Engineer') {
                                this.api().cell(td).checkboxes.disable();
                            }
                        }
                    },
                    {
                        data: 'driver_name'
                    },
                    {
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
                    },
                    {
                        data: 'option'
                    }
                ]
            });

            table.on('select', function(e, dt, type, indexes) {
                let count = 0;
                table.rows({
                    selected: true
                }).data().each(function(data) {
                    count++;
                });
                document.getElementById('count').innerHTML = count;
            });

            table.on('deselect', function(e, dt, type, indexes) {
                document.getElementById('count').innerHTML = 0;
            });

            // Handle click event on group checkbox
            $('#table').on('click', '.group-checkbox', function(e) {
                // Get group class name
                var groupName = $(this).data('group-name');
                // Select all child rows
                table.cells('tr.' + groupName, 0).checkboxes.select(this.checked);
                table.rows({
                    selected: true
                }).data().each(function(data) {
                    getCount++;
                });

                if ($(".group-checkbox").prop('checked') == false) {
                    getCount = 0;
                }
                document.getElementById('count').innerHTML = getCount;
            });


            // Handle click event on "Select all" checkbox
            $('#table').on('click', 'thead .dt-checkboxes-select-all', function(e) {
                var $selectAll = $('input[type="checkbox"]', this);

                setTimeout(function() {
                    // Select group checkbox based on "Select all" checkbox state
                    $('.group-checkbox').prop('checked', $selectAll.prop('checked'));
                }, 0);
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

        // Singlr TR select
        function numberOfSelected(value) {
            var checkBox = document.getElementById(value);
            if (checkBox.checked == true) {
                getCount++;
            } else {
                getCount--;
            }
            document.getElementById('count').innerHTML = getCount;
        }

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

        /* Mark As Deliverd Function */
        function markAsDelivered() {
            $('input[type="hidden"][name="slected_row_id[]"]').remove();
            $('#mark_as_deliverd_modal').modal('show');
            table.rows({
                selected: true
            }).data().each(function(data) {
                $('<input>').attr({
                    type: 'hidden',
                    name: 'slected_row_id[]',
                    value: data.id
                }).appendTo('form');
            });
        }
        /* Print Menifest Function */
        function printMenifest() {
            $('input[type="hidden"][name="slected_row_id[]"]').remove();
            $('#menifest_modal').modal('show');
            let orderType = null;
            let order = table.order();
            if (order[0][0] == 5) {
                orderType = 'ASC';
            }
            $("#order_type").val(orderType);
            table.rows({
                selected: true
            }).data().each(function(data) {
                $('<input>').attr({
                    type: 'hidden',
                    name: 'slected_row_id[]',
                    value: data.id
                }).appendTo('form');
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

        function hidepopup() {
            $('#mark_as_deliverd_modal').modal('hide');
            $('#mark_as_deliverd_modal').modal('hide');
            $('#menifest_modal').modal('hide');
            return true;
        }

        function updateCardStatus() {
            $('input[type="hidden"][name="slected_row_id[]"]').remove();
            $('#update_card_status_modal').modal('show');
            table.rows({
                selected: true
            }).data().each(function(data) {
                $('<input>').attr({
                    type: 'hidden',
                    name: 'slected_row_id[]',
                    value: data.id
                }).appendTo('#update_card_status_modal form');
            });
        }
    </script>
@endsection
