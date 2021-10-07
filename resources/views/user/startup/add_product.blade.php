@extends('layouts.master')

@section('title', 'Startup')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header py-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item text-dark font-weight-bold">
                            <h4>Startup Details</h4>
                        </li>
                        <li class="breadcrumb-item ">Adding new product / Service</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-primary">Tanzania</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Fill the form below correctly<a href="startup-products" class="btn btn-sm btn-info">Go back</a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body mb-lg-5">
                   <div class="container">
                         @include('user.startup.incomplite_data')
                   </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
        $("#startup_details_form")[0].reset();
    </script>

@endsection
