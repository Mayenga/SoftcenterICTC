@extends('layouts.master')

@section('title', ucfirst(Request::segment(1)))

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header py-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Accelerators</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <a href="">
                            <li class="breadcrumb-item btn btn-primary text-white">Add Accelerator</li>
                        </a> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card rounded-0 elevation-0 border">
                <div class="card-header bg-secondary rounded-0">
                    <h3 class="card-title" style="letter-spacing: 1px">SoftCenter registered accelerators</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Full Name</th>
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
                                    <td>{{ App\Models\User::find($incubator->users_id)->name ?? null }}</td>
                                    <td>{{ $incubator->org_name }}</td>
                                    <td>{{ $incubator->address }}</td>
                                    <td>{{ $incubator->postal_code }}</td>
                                    <td>{{ $incubator->business_model }}</td>
                                    <td>{{ $incubator->pref_startup_stage }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#more-info{{ $incubator->id }}">More Info</button>
                                        @if (!$incubator->isApproved)
                                            <button class="btn btn-sm btn-primary" onclick="dataManage({{ $incubator->id }},'Approve_stakeholder','Approve_stakeholder')">Approve</button>
                                        @endif
                                    </td>
                                </tr>

                                 <!-- The Modal -->
                                <div class="modal fade" id="more-info{{ $incubator->id }}">
                                    <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title"><small class="text-muted">Accelerator</small> - {{ $incubator->org_name }}</h4>
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
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    <div style="height: 50px"></div>


@endsection
