@extends('admin.layouts.app')

@section('title')
    Newly Arrived
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
                        <h4 class="m-0 text-dark">Newly Arrived</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item">Card Management</li>
                            <li class="breadcrumb-item active">Newly Arrived</li>
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
                        <a href="#" class="btn btn-sm bg-gradient-success float-right"
                            onclick="updateCardStatus()"><span class="fa fa-save"></span> Assign
                            to agent</a>
                        <a href="{{ route('admin.cards.newly-arrived.create') }}"
                            class="btn btn-sm bg-gradient-warning  float-right mr-3"><span class="fa fa-file-upload"></span>
                            Import</a>
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
                                                    <input type="text" name="datetimes" class="form-control filter_clear"
                                                        autocomplete="off">
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
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Card no</label>
                                                    <input type="text" name="card_no" value=""
                                                        class="form-control filter_clear">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-6">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Customer name</label>
                                                    <input type="text" name="customer_name" value=""
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
                                                <th>Batch no</th>
                                                <th>Batch sr.no</th>
                                                <th>Card no</th>
                                                <th>Customer Name</th>
                                                <th>CIF no</th>
                                                <th>Civil ID</th>
                                                <th>Mobile no</th>
                                                <th>Telephone no</th>
                                                <th>Option</th>
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
    <!-- /.content-wrapper -->


    <!-- Update Card Status Modal-->
    <div class="modal fade" id="update_card_status_modal" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="width: 100%;">Assign to agent</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.cards.updateCardStatus') }}" class="form-horizontal" autocomplete="off"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="action" value="ASSIGN_AGENT" />
                        <input type="hidden" name="status" value="0" />
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="agent_id">Agent<span class="requiredAsterisk">*</span></label>
                                        <select class="form-control js-select2 @error('agent_id') is-invalid @enderror"
                                            style="width: 100%;" id="agent_id" name="agent_id">
                                            <option value=" ">---Select---</option>
                                            @foreach ($all_call_centers as $row_center)
                                                <option value="{{ $row_center['id'] }}">{{ $row_center['first_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('agent_id')
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
            });

            table = $('#table').DataTable({
                'dom': '<"pl-2 pt-2 pr-2" <"row" <"col-lg-6" l><"col-lg-6" f>> > rt <"border-top pl-2 pt-2 pr-2 pb-2 " <"row" <"col-lg-6" i><"col-lg-6" p>> >',
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
                'pageLength': 5000,
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
                'ajax': {
                    url: "{{ route('admin.cards.dataTable') }}",
                    dataType: 'json',
                    type: 'GET',
                    data: function(d) {
                        d.type = 'newly_arrived';
                        d.batch_no = $("input[name=batch_no]").val();
                        d.batch_sr_no = $("input[name=batch_sr_no]").val();
                        d.card_no = $("input[name=card_no]").val();
                        d.customer_name = $("input[name=customer_name]").val();
                        d.cif_number = $("input[name=cif_number]").val();
                        d.civil_id = $("input[name=civil_id]").val();
                        d.mobile_no = $("input[name=mobile_no]").val();
                        d.telephone_no = $("input[name=telephone_no]").val();
                    }
                },
                'columns': [{
                        'data': 'id',
                        'checkboxes': {
                            'selectRow': true
                        },
                        'render': function(data, type, row, meta) {
                            data = '<input type="checkbox" class="dt-checkboxes" id="' + row.id +
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
                        'data': 'batch_no'
                    },
                    {
                        'data': 'batch_sr_no'
                    },
                    {
                        'data': 'card_no'
                    },
                    {
                        'data': 'customer_name'
                    },
                    {
                        'data': 'cif_no'
                    },
                    {
                        'data': 'civil_id'
                    },
                    {
                        'data': 'mobile_no'
                    },
                    {
                        'data': 'telephone_no'
                    },
                    {
                        'data': 'option'
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

            // Handle click event on "Select all" checkbox
            $('#table').on('click', 'thead .dt-checkboxes-select-all', function(e) {
                var $selectAll = $('input[type="checkbox"]', this);
                setTimeout(function() {
                    // Select group checkbox based on "Select all" checkbox state
                    $('.group-checkbox').prop('checked', $selectAll.prop('checked'));
                }, 0);
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

            $('#filter_items').on('click', function() {
                table.draw();
            });

            $('#filter_clear').on('click', function() {
                $('.filter_clear').val('').trigger('change');
                location.reload();
                table.draw();
            });
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
                }).appendTo('form');
            });
        }
    </script>

    <script type="text/javascript">
        @if (count($errors) > 0)
            $('#update_card_status_modal').modal('show');
        @endif
    </script>
@endsection
