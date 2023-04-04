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
                        <h4 class="m-0 text-dark">Card History</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.cards.all.index') }}">Cards list</a>
                            </li>
                            <li class="breadcrumb-item active">History</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="row mb-1">
                <div class="col-md-12">
                    <div class="callout callout-info">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Card No: {{$card->card_no}}</p>
                                <p>Batch No: {{$card->batch_no}}</p>
                                <!--<p>Batch Sr No: {{$card->batch_sr_no}}</p>-->
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


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="timeline">
                                        @foreach($logs as $log)
                                            <div class="time-label">
                                                <span
                                                    class="bg-info">{{$log->date}}</span>
                                            </div>
                                            <div>
                                                <i class="fas {{$log->icon}} bg-blue"></i>
                                                <div class="timeline-item"><span class="time"><i
                                                            class="fas fa-clock"></i> {{$log->time}}</span>
                                                    <h3 class="timeline-header text-gray">{{$log->title}}</h3>
                                                    <div class="timeline-body">
                                                        {{$log->descriprion}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('footer')
    @parent

    @stack('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

        });
    </script>
@endsection
