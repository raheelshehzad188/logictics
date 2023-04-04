@extends('admin.layouts.app')

@section('title')
    Create
@endsection

@section('header')
    @parent
    <style>
        body {
            background: #ccc;
        }

        form {
            background: #fff;
            padding: 20px;
        }

        .progress {
            position: relative;
            width: 100%;
        }

        .bar {
            background-color: #002bff;
            width: 0%;
            height: 22px;
        }

        .percent {
            position: absolute;
            display: inline-block;
            left: 50%;
            color: #040608;
        }
    </style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class=" content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Import</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <!-- <li class="breadcrumb-item">Masters</li> -->
                            <li class="breadcrumb-item">Card Management</li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.cards.newly-arrived.index') }}">Newly Arrived</a></li>
                            <li class="breadcrumb-item active">Import</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card card-primary card-outline">
                            <!-- form start -->
                            <form method="POST" action="{{route('admin.cards.newly-arrived.store')}}" role="form"
                                  autocomplete="off" enctype="multipart/form-data" id="form" class="needs-validation">
                                @csrf
                                <div class="card-body">
                                    <div class="row mt-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Select File(.csv)</label><br>
                                                <input type="file" name="fileimport" value=""
                                                       class="@error('fileimport') is-invalid @enderror">

                                                @error('fileimport')
                                                <div class="invalid-feedback">
                                                    This field is required
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="progress" style="line-height: 20px;">
                                                    <div class="bar"></div>
                                                    <div class="percent">0%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->

                                </div>
                                <!-- /.card-body -->
                                <div style="display: flex;justify-content: center;">
                                    <button type="submit" class="upload-btn btn btn-sm btn-success"
                                            style="border-radius: 5px; width: 100px;"><span
                                            class="fa fa-check-circle"></span> Upload
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('footer')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script type="text/javascript">
        var SITEURL = "{{route('admin.cards.newly-arrived.index')}}";
        $(function () {
            $(document).ready(function () {
                var bar = $('.bar');
                var percent = $('.percent');
                console.log(percent);
                $('form').ajaxForm({
                    beforeSend: function () {
                        var percentVal = '0%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                        $('.upload-btn').prop('disabled', true);
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    complete: function (xhr) {
                        console.log(xhr);
                        window.location.href = SITEURL;
                        $('.upload-btn').prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
