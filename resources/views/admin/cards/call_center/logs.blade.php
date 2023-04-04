@extends('admin.layouts.app')

@section('title')
    Call Center
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
                        <h4 class="m-0 text-dark">Call Logs</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Card Management</li>
                            <li class="breadcrumb-item"><a
                                    href="{{  route('admin.cards.call-center.index') }}">Cards</a></li>
                            <li class="breadcrumb-item active">Call Logs</li>
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
                        <strong>Success!</strong> {{session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <form role="form" autocomplete="off" method="POST"
                                          action="{{route('admin.cards.call-logs.store')}}" role="form"
                                          autocomplete="off" enctype="multipart/form-data" id="form"
                                          class="needs-validation">
                                        @csrf
                                        <input type="hidden" name="card_id" required
                                               class="form-control" value="{{$card->id}}">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Call details</label>
                                                        <textarea class="form-control" name="log"
                                                                  placeholder="Enter call details here..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Select call date</label>
                                                        <input type="datetime-local" name="log_datetime" required
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Select Status</label>
                                                        <select name="status_id"
                                                                class="js-select2 form-control @error('status_id') is-invalid @enderror"
                                                                required>
                                                            <option value="" disabled selected>---Select---</option>
                                                            @foreach ($all_status as $item)
                                                                <option
                                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!-- /.row -->

                                            <div class="row align-items-center mt-2">
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-sm bg-gradient-danger"
                                                            id="btn_clear"><i class="fa fa-recycle m-r-5"></i> Clear
                                                    </button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit"
                                                            class="btn btn-sm bg-gradient-info float-right"
                                                            id="btn_filter">
                                                        <i class="fa fa-save m-r-5"></i> Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-md-12">
                            <div class="callout callout-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Card No: {{$card->card_no}}</p>
                                        <p>Batch No: {{$card->batch_no}}</p>
                                        <p>Batch Sr No: {{$card->batch_sr_no}}</p>
                                        <p>CIF No: {{$card->cif_no}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Customer Name: {{$card->customer_name}}</p>
                                        @if($card['mobile_no'])<p>Mobile: {{$card->mobile_no}}</p>@endif
                                        @if($card['telephone_no'])<p>Telephone: {{$card->telephone_no}}</p>@endif
                                        <p>Civil ID: {{$card->civil_id}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="timeline">
                                        @foreach ($card->callLogs as $log)
                                            <div class="time-label">
                                                <span
                                                    class="bg-info">{{date('d M Y', strtotime($log->log_datetime))}}</span>
                                            </div>
                                            <div>
                                                <i class="fas fa-phone bg-blue"></i>
                                                <div class="timeline-item"><span class="time"><i
                                                            class="fas fa-clock"></i> {{date('h:i a', strtotime($log->log_datetime))}}</span>
                                                    <h3 class="timeline-header text-gray">{{$log->status ? $log->status['name'] : '-'}}</h3>
                                                    @if($log->log)
                                                        <div class="timeline-body">
                                                            {{$log->log}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
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
    <!-- /.content-wrapper -->
@endsection

@section('footer')
    @parent

    @stack('scripts')

    <script type="text/javascript">
        // Clear
        $('#btn_clear').click(function (e) {
            location.reload();
        });
    </script>
@endsection
