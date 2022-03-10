@extends('layouts.master')

@section('title', $role)

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header py-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item text-dark font-weight-bold">
                            <h4>{{ $role }} Details</h4>
                        </li>
                        <li class="breadcrumb-item {{ $text }}">{{ $status }}</li>
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
                    <h3 class="card-title">{{ $messageNote }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body mb-lg-5">
                       @if (count($details) == 0)
                           <div class="container">
                                @if ($status == "Incomplete")
                                    @include('user.startup.incomplite_data')
                                @endif
                            </div>
                       @endif
                       @if (count($details) > 0)
                            <a href="/startup-add-product" class="float-left btn btn-primary">Add product / Service</a>
                            @include('user.startup.partials.products_data')
                       @endif
                    </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
