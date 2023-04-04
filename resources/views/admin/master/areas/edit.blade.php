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
                            <li class="breadcrumb-item">Masters</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.masters.areas.index') }}">Areas</a>
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
                            <form method="POST" action="{{ route('admin.masters.areas.update' ,$areas->id) }}"
                                  role="form" autocomplete="off" enctype="multipart/form-data" id="form"
                                  class="needs-validation">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row mt-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" value="{{ $areas->name }}"
                                                       class="form-control @error('name') is-invalid @enderror">

                                                @error('name')
                                                <div class="invalid-feedback">
                                                    This field is required
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Governorate</label>
                                                <select name="governorate_id"
                                                        class="form-control js-select2 @error('governorate') is-invalid @enderror">
                                                    <option value="">Select Governorate</option>
                                                    @foreach($governorates as $governorate)
                                                        <option value="{{ $governorate->id }}"
                                                                @if($governorate->id == $areas->governorate_id) selected @endif >{{ $governorate->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('status')
                                                <div class="invalid-feedback">
                                                    This field is required
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status"
                                                        class="form-control js-select2 @error('status') is-invalid @enderror">
                                                    <option value="">Select Status</option>
                                                    <option value="1" @if($areas->status == '1') selected @endif>
                                                        Active
                                                    </option>
                                                    <option value="0" @if($areas->status == '0') selected @endif>
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
