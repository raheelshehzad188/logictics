@extends('admin.layouts.app')

@section('title')
    Barcode Scan
@endsection

@section('header')
    @parent
@endsection
<style>
    .swal2-confirm.btn.btn-success{
        margin-right: 35px !important;
    }
</style>
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Barcode Scan</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Barcode Scan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row align-items-center mt-2">
                    <div class="col-md-6">
                    <!-- @component('admin.components.datatable.actions')
                    @endcomponent -->
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="btn btn-sm bg-gradient-success float-right"
                           onclick="updateCardStatus()"><span class="fa fa-save"></span> Change Status </a>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card card-outline">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mt-6">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Enter Barcode</label>
                                                    <input type="text" name="search_key" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group pt-3">
                                                    <button id="clear-btn" class="btn bg-gradient-danger mt-3">
                                                        Clear
                                                    </button>
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
                                                <th></th>
                                                <th>Batch No.</th>
                                                <th>Batch Sr. No</th>
                                                <th>Card no.</th>
                                                <th>Customer name</th>
                                                <th>CIF no.</th>
                                                <th>Civil Id</th>
                                                <th>Mobile no.</th>
                                                <th>Telephone no.</th>
                                                <th>Current Status</th>
                                                <th>Delivery date</th>
                                                <th>Driver Name</th>
                                            </tr>
                                            </thead>
                                            <tbody id="tbody">
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

    <!-- Status update -->
    <div class="modal fade" id="update_card_status_modal" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="width: 100%;">Change Status</h4>
                </div>
                <div class="modal-body">
                    <form action="#" class="form-horizontal"
                          autocomplete="off"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="action" value="CHANGE_STATUS"/>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="agent_id">Status<span class="requiredAsterisk">*</span></label>
                                        <select name="status"
                                                class="form-control js-select2 @error('status') is-invalid @enderror" id="status">
                                            <option value="">Select Status</option>
                                            <option value="0">Newly Arrived</option>
                                            <option value="00">Assigned to Agent</option>
                                            <option value="1">Out for Delivery</option>
                                            <option value="11">Assigned to Driver</option>
                                            <option value="2">Return to bank</option>
                                            <option value="3">Delivered</option>
                                            <option value="4">Undelivered</option>
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
                                <div class="col-md-12 dynamic-section agent_id">
                                    <div class="form-group">
                                        <label for="agent_id">Agent</label>
                                        <select name="agent_id" id="agent_id"
                                                class="form-control js-select2 ">
                                            <option value="">Select Agent</option>
                                            @if(!empty($agents))
                                                @foreach($agents as $agent)
                                            <option value="{{$agent['id']}}">{{$agent->agent_name}}</option>
                                                @endforeach
                                                @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 dynamic-section driver_id">
                                    <div class="form-group">
                                        <label for="driver_id">Driver</label>
                                        <select name="driver_id" id="driver_id"
                                                class="form-control js-select2 ">
                                            <option value="">Select Driver</option>
                                            @if(!empty($drivers))
                                                @foreach($drivers as $driver)
                                                    <option value="{{$driver['id']}}">{{$driver->driver_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div style="display: flex;justify-content: space-between;">
                            <button data-dismiss="modal" aria-label="Close" class="btn btn-sm btn-danger"
                                    style="border-radius: 5px; width: 100px;"><span class="fa fa-minus-circle"></span>
                                Cancel
                            </button>
                            <button type="button" class="btn btn-sm btn-success" onclick="resetStatus()"
                                    style="border-radius: 5px; width: 100px;"><span class="fa fa-check-circle"></span>
                                OK
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
        $('.dynamic-section').hide();
        $('#status').change(function() {
            var selection = $('#status').val();
            $('.dynamic-section').hide();
            switch (selection) {
                case '00':
                    $('.agent_id').show();
                    break;
                case '11':
                    $('.driver_id').show();
                    break;
            }
        });
        let numbers = [];
        function numberOfSelected(id) {
            if ($("#" + id).prop('checked') == true) {
                numbers.push(id);
                console.log(numbers);


            } else {
                let index = numbers.indexOf(id);
                if (index > -1) {
                    numbers.splice(index, 1);
                }
            }
        }
        $(document).ready(function () {
            var table = $('#table').DataTable({

                language: {
                    "zeroRecords": " "
                },
                lengthChange: false,
                searching: false,
                info: false,
                paging: false,
                searchHighlight: false,
                ordering: false,
                autoWidth: false,
                responsive: true,
                processing: true,
                serverSide: false,
                stateSave: false,
                deferRender: true,
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2]
                },
                    {
                        className: '',
                        targets: [0, 1, 2]
                    },
                    {
                        width: '30px',
                        targets: 0
                    },
                ],
            });

            $('input[name=search_key]').focus();
            $('input[name=search_key]').on('input', function (e) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.cards.search') }}",
                    dataType: 'json',
                    data: {
                        search_key: $('input[name=search_key]').val(),

                    },
                    success: function (datas) {
                        //table.draw(false);
                        var cards = datas.card;
                        var $tbody = $('#tbody');
                        sr_no = $('#tbody tr').length;
                        cards.forEach((data) => {

                            var tr = `<tr>
                                        <td>
                                            <input type="checkbox" class="dt-checkboxes" id="${data.id}" onclick="numberOfSelected(${data.id})">
                                        </td>
                                        <td>${data.batch_no}</td>
                                        <td>${data.batch_sr_no}</td>
                                        <td>${data.card_no}</td>
                                        <td>${data.customer_name}</td>
                                        <td>${data.cif_no}</td>
                                        <td>${data.civil_id}</td>
                                        <td>${data.mobile_no}</td>
                                        <td>${data.telephone}</td>
                                        <td>${data.new_status}</td>
                                        <td>${data.date}</td>
                                        <td>${data.driver}</td>

                                    </tr>`
                            $tbody.prepend(tr);
                        });
                        setTimeout(function () {
                            $('input[name=search_key]').select();
                        }, 100);
                    }
                });
            });

            $('#clear-btn').click(function (e) {
                $('input[name=search_key]').val('');
                $('#tbody').empty();
                table.draw(false);
                $('input[name=search_key]').focus();
            });
        });


        function updateCardStatus() {

            $('input[type="hidden"][name="slected_row_id[]"]').remove();
            $('#update_card_status_modal').modal('show');
            // table.rows({
            //     selected: true
            // }).data().each(function (data) {
            //     $('<input>').attr({
            //         type: 'hidden',
            //         name: 'slected_row_id[]',
            //         value: data.id
            //     }).appendTo('#update_card_status_modal form');
            // });
        }

        const resetStatus = () => {
            $('#update_card_status_modal').modal('hide');

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
                        url: "{{route('admin.barcode.change_status')}}",
                        method: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            numbers:numbers,
                            status:$('#status').val(),
                            agent_id:$('#agent_id').val(),
                            driver_id:$('#driver_id').val(),
                        },

                        success: function (html) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: html.msg,
                                showConfirmButton: false,
                                timer: 1500,
                        })
                            location.reload();
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
