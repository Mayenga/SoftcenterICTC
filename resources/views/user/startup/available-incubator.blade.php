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
                            <h4>Incubators</h4>
                        </li>
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
                    <h3 class="card-title">Available Incubators</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body mb-lg-5">
                    <div class="">
                        <table id="datatable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Address</th>
                                    <th>Postal Code</th>
                                    <th>Business Modal</th>
                                    <th>Prefered startup Stage</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($details as $incubator)
                                    <tr>
                                        <td>{{ $incubator->org_name }}</td>
                                        <td>{{ $incubator->address }}</td>
                                        <td>{{ $incubator->postal_code }}</td>
                                        <td>{{ $incubator->business_model }}</td>
                                        <td>{{ $incubator->pref_startup_stage }}</td>
                                        <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#more-info{{ $incubator->id }}">More Info</button></td>
                                    </tr>

                                     <!-- The Modal -->
                                    <div class="modal fade" id="more-info{{ $incubator->id }}">
                                        <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                            <h4 class="modal-title"><small class="text-muted">Incubator</small> - {{ $incubator->org_name }}</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                               <b>Preffered Startup Stage</b>
                                               <p>{{ $incubator->pref_startup_stage }}</p>
                                               <hr>
                                               <b>Program Durations</b>
                                               <p>{{ $incubator->program_duration }}</p>
                                               <hr>
                                               <b>Service Provided</b>
                                               <p>{{ $incubator->service_provided }}</p>
                                               <hr>
                                               <b>Business Modal Description <small class="text-muted">{{ $incubator->business_model }}</small></b>
                                               <p>{!! $incubator->business_model_desc !!}</p>
                                               <hr>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                        </div>
                                    </div>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection
