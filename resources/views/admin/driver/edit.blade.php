@extends('admin.layouts.app')

@section('title')
    Create
@endsection

@section('header')
    @parent
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class=" content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Create</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <!-- <li class="breadcrumb-item">Masters</li> -->
                            <li class="breadcrumb-item"><a href="{{ route('admin.driver.driver.index') }}">Drivers</a>
                            </li>
                            <li class="breadcrumb-item active">Create</li>
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
                            <form method="POST" action="{{ route('admin.driver.driver.update', $drivers->id) }}"
                                ole="form" autocomplete="off" enctype="multipart/form-data" id="form"
                                class="needs-validation">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row mt-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Driver Name</label>
                                                <input type="text" name="driver_name" value="{{ $drivers->driver_name }}"
                                                    class="form-control @error('driver_name') is-invalid @enderror">

                                                @error('driver_name')
                                                    <div class="invalid-feedback">
                                                        This field is required
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                         <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Driver Email</label>
                                                <input type="text" name="email" value="@if(!empty($drivers->user->email)){{ $drivers->user->email }}@else @endif"
                                                    class="form-control @error('email') is-invalid @enderror">

                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        This field is required
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        @if(empty($drivers->user_id))
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" value=""
                                                           class="form-control @error('password') is-invalid @enderror">

                                                    @error('password')
                                                    <div class="invalid-feedback">
                                                        This field is required
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            @endif
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="number" name="contact_number"
                                                    value="{{ $drivers->contact_number }}"
                                                    class="form-control @error('contact_number') is-invalid @enderror">

                                                @error('contact_number')
                                                    <div class="invalid-feedback">
                                                        This field is required
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Capacity</label>
                                                <input type="number" name="capacity" value="{{ $drivers->capacity }}"
                                                    class="form-control @error('capacity') is-invalid @enderror">

                                                @error('contact_number')
                                                    <div class="invalid-feedback">
                                                        This field is required
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- /.row -->

                                    <div class="row mt-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status"
                                                    class="form-control js-select2 @error('status') is-invalid @enderror">
                                                    <option value="">Select Status</option>
                                                    <option value="1"
                                                        @if ($drivers->status == '1') selected @endif>
                                                        Active
                                                    </option>
                                                    <option value="0"
                                                        @if ($drivers->status == '0') selected @endif>
                                                        Inactive
                                                    </option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">
                                                        This field is required
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- /.row -->

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm bg-gradient-primary float-right"><i
                                            class="fas fa-save"></i>&nbsp; Save
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
@endsection
