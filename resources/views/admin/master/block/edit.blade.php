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
                            <li class="breadcrumb-item"><a href="{{ route('admin.masters.block.index') }}">Block</a>
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
                            <form method="POST" action="{{ route('admin.masters.block.update' ,$block->id) }}"
                                  role="form" autocomplete="off" enctype="multipart/form-data" id="form"
                                  class="needs-validation">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row mt-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Number</label>
                                                <input type="number" name="name" value="{{ $block->name }}"
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
                                                <label>Area</label>
                                                <select name="area_id"
                                                        class="form-control js-select2  @error('area_id') is-invalid @enderror">
                                                    <option value="">Select Area</option>
                                                    @foreach($areas as $row_area)
                                                        <option value="{{ $row_area->id }}"
                                                                @if($row_area->id == $block->area_id) selected @endif >{{ $row_area->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('area_id')
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
                                                    <option value="1" @if($block->status == '1') selected @endif>
                                                        Active
                                                    </option>
                                                    <option value="0" @if($block->status == '0') selected @endif>
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
