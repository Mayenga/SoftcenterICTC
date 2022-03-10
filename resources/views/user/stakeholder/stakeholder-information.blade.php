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
                    <div class="container">
                        <form id="stakeholder_details_form" action="save_stakeholder_details" method="post">
                          @csrf
                          @if ($status == "pending")
                              @include('user.stakeholder.pending_data')
                          @endif
                          @if ($status == "Approved")
                               @include('user.stakeholder.pending_data')
                          @endif
                          @if ($status == "Incomplete")
                              @include('user.stakeholder.incomplite_data')
                          @endif
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
