@extends('layouts.master')

@section('title', ucfirst(Request::segment(1)))

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header py-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Developers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <a href="">
                            <li class="breadcrumb-item btn btn-primary text-white">Add Incubator</li>
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
                    <h3 class="card-title" style="letter-spacing: 1px">SoftCenter registered Developer</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-hover">
                        {{-- id 	users_id 	position 	level 	experience 	stack --}}
                        <thead>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Stack</th>
                            <th>Position</th>
                            <th>Experiance</th>
                            <th>Level</th>
                        </thead>
                        <tbody>
                            @foreach ($details as $developer)
                                <tr>
                                    <td>
                                        <img width="50px" height="50px" src="{{ asset('storage/uploaded/users/' . App\Models\User::find($developer->users_id)->profile_image) }}" alt="image" class="img-circle">
                                    </td>
                                    <td>{{ App\Models\User::find($developer->users_id)->name ?? '' }}</td>
                                    <td>
                                        {{ App\Models\User::find($developer->users_id)->phone ?? '' }} <br>
                                        {{ App\Models\User::find($developer->users_id)->email ?? '' }}
                                    </td>
                                    <td>{{ $developer->stack }}</td>
                                    <td>{{ $developer->position }}</td>
                                    <td>{{ $developer->experience }}</td>
                                    <td>{{ $developer->level }}</td>
                                </tr>
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
