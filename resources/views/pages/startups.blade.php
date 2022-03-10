@extends('layouts.master')

@section('title', ucfirst(Request::segment(1)))

@section('content')
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header py-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark font-weight-bold">Startups</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                {{-- <a href=""><li class="breadcrumb-item btn btn-primary text-white">Add Startup</li></a> --}}
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
            <h3 class="card-title" style="letter-spacing: 1px">SoftCenter registered startups</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="datatable" class="table table-striped table-hover">
              <thead>
                  <tr>
                      <th>Full Name</th>
                      <th>Name of product/Service</th>
                      <th>Focus Sector</th>
                      <th>Business Modal</th>
                      {{-- <th>Product Stage</th> --}}
                      {{-- <th>Finatial Stage</th> --}}
                      {{-- <th>File</th> --}}
                      <th>action</th>
                  </tr>
              </thead>
              <tbody>

                  @foreach ($details as $startup)
                      <tr>
                          <td>{{ App\Models\User::find($startup->users_id)->name ?? null }}</td>
                          <td>{{ $startup->product_name }}</td>
                          <td>{{ App\Models\FocusSector::find($startup->focus_sectors_id)->sector ?? null }}
                          </td>
                          <td>{!! $startup->business_model !!}</td>
                          {{-- <td>{{ $startup->product_stage }}</td> --}}
                          {{-- <td>{{ $startup->finacial_stage }}</td> --}}
                          {{-- <td><a href="/startup-download-file?file_path={{ Crypt::encrypt($startup->id) }}"><i class="fas fa-file-download"></i> download</a></td> --}}
                          <td>
                              <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#more-info{{ $startup->id }}">view</button>
                              @if (!$startup->isApproved)
                                 <button class="btn btn-sm btn-primary" onclick="dataManage({{ $startup->id }},'Approve_startup','Approve_startup')">Approve</button>
                              @endif

                              <button class="btn btn-sm btn-danger" >Reject</button>
                          </td>
                      </tr>

                      <!-- The Modal -->
                      <div class="modal fade" id="more-info{{ $startup->id }}">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                      <h4 class="modal-title"><small class="text-muted">Startup</small> -
                                          {{ $startup->product_name }}</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>

                                  <!-- Modal body -->
                                  <div class="modal-body">
                                      <b>Focus Sector</b>
                                      <p>{{ App\Models\FocusSector::find($startup->focus_sectors_id)->sector ?? null }}</p>
                                      <hr>
                                      <b>Product or Service Name</b>
                                      <p>{{ $startup->product_name }}</p>
                                      <hr>
                                      <b>Description</b>
                                      <p>{!! $startup->description !!}</p>
                                      <hr>
                                      <b>Address</b>
                                      <p>{{ $startup->address }}</p>
                                      <hr>
                                      <b>Startup Stage</b>
                                      <p>{{ $startup->product_stage }}</p>
                                      <hr>
                                      <b>Ownership</b>
                                      <p>{{ $startup->ownership }}</p>
                                      <hr>
                                      <b>Finatial Stage</b>
                                      <p>{{ $startup->finacial_stage }}</p>
                                      <hr>
                                      <b>Business Modal Description <small
                                              class="text-muted">{{ $startup->business_model }}</small></b>
                                      <p>{!! $startup->business_model_desc !!}</p>
                                      <hr>
                                      Contacts: <br>
                                      Name: <b>{{ App\Models\User::find($startup->users_id)->name }}</b><br>
                                      Phone: <b>{{ App\Models\User::find($startup->users_id)->phone }}</b><br>
                                      Email: <b>{{ App\Models\User::find($startup->users_id)->email }}</b><br>
                                      <br>
                                      <small class="text-muted">Approved by <b>SoftCenter</b></small>
                                  </div>

                                  <!-- Modal footer -->
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-danger"
                                          data-dismiss="modal">Close</button>
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
