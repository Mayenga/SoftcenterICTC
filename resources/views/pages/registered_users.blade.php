@extends('layouts.master')

@section('title', ucfirst(Request::segment(1)))

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header py-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Registered users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item "><button data-toggle="modal" data-target="#add_system_user"
                                class="btn btn-primary text-white">Add User</button> </li> --}}
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
                    <h3 class="card-title" style="letter-spacing: 1px">SoftCenter Registered Users</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td><img src="{{ asset('storage/uploaded/users/'.$user->profile_image) }}" alt="User DP" width="50px" height="50px" class="brand-image img-circle"></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ App\Models\Role::find(App\Models\userRole::where('users_id', $user->id)->first()->roles_id ?? null)->name ?? null }}
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#more-info{{ $user->id }}">Edit</button>
                                        <button onclick="dataManage({{ $user->id }},'delete_user','delete_users')" class="btn btn-sm btn-danger">Remove</button>
                                    </td>
                                </tr>

                                <!-- The Modal -->
                                <div class="modal fade" id="more-info{{ $user->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">update user</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form id="updateuserinfo_form{{ $user->id }}" method="POST"
                                                    action="chaangesystemuserinfo" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="mode" value="update_system_user">
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <div class="form-group">
                                                        <label for="password">Profile Image:</label>
                                                        <input type="file" name="profile_image" class="form-control-file"
                                                            autofocus autocomplete="false">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Name:</label>
                                                        <input type="text" minlength="6" name="name" class="form-control"
                                                            value="{{ $user->name }}" autofocus autocomplete="false"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Phone:</label>
                                                        <input type="text"  name="phone" class="form-control"
                                                            value="{{ $user->phone }}" autofocus autocomplete="false"
                                                            data-inputmask='"mask": "+255-999-999-999"' data-mask  required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password">Email:</label>
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ $user->email }}" autofocus autocomplete="false"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control custom-select" name="role" required>
                                                            @foreach ($userRoles as $userRole)
                                                                <option value="{{ $userRole->id }}">{{ $userRole->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="message"></div>
                                                    <div class="row">
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-6"><button dataId="{{ $user->id }}"
                                                                type="submit"
                                                                class="btn btn-primary chaangesystemuserinfo_btn w-100">save
                                                                changes</button></div>
                                                        <div class="col-md-3"></div>
                                                    </div>
                                                </form>
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

    <!-- The Modal -->
    <div class="modal fade" id="add_system_user">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">add user</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="add_system_user_form" method="POST" action="add_system_user"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="password">Profile Image:</label>
                            <input type="file" name="profile_image" class="form-control-file" autofocus
                                autocomplete="false">
                        </div>
                        <div class="form-group">
                            <label for="password">Name:</label>
                            <input type="text" minlength="6" name="name" class="form-control"
                                autofocus autocomplete="false" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Phone: </label>
                            <input type="text"  name="phone" class="form-control"
                                autofocus autocomplete="false" data-inputmask='"mask": "+255-999-999-999"' data-mask required>
                        </div>

                        <div class="form-group">
                            <label for="password">Email:</label>
                            <input type="email" name="email" class="form-control" autofocus
                                autocomplete="false" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control custom-select" name="role" required>
                                @foreach ($userRoles as $userRole)
                                    <option value="{{ $userRole->id }}">{{ $userRole->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="message"><small class="text-muted mb-5"><b>Password</b> will be sent to the email</small></div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6"><button  type="submit"
                                    class="btn btn-primary add_system_user_btn w-100">save</button></div>
                            <div class="col-md-3"></div>
                        </div>
                    </form>
                </div>


                <!-- Modal footer -->
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> --}}
                </div>

            </div>
        </div>
    </div>

@endsection
