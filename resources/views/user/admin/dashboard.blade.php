@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    @php
    $acceleratorsID = App\Models\Role::where('name', 'Accelerator')->first()->id ?? null;
    $accelerator_id = App\Models\userRole::where('roles_id', $acceleratorsID)->pluck('users_id') ?? [];
    $incubatorID = App\Models\Role::where('name', 'Incubator')->first()->id ?? null;
    $incubator_id = App\Models\userRole::where('roles_id', $incubatorID)->pluck('users_id') ?? [];

    @endphp
    <div class="content-header py-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Dashboard</h1>
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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info rounded-0 elevation-0">
                        <div class="inner">
                            <h3>{{ App\Models\StartupProduct::where('isApproved', true)->count() }}</h3>

                            <p>Startups Projects</p>
                        </div>
                        <div class="icon">
                            <i class="la la-project-diagram"></i>
                        </div>
                        <a href="startups" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success rounded-0 elevation-0">
                        <div class="inner">
                            <h3>{{ App\Models\stakeHoldersDetail::whereIn('users_id', $accelerator_id)->where('isApproved', true)->count() }}
                            </h3>
                            <p>Accelerators</p>
                        </div>
                        <div class="icon">
                            <i class="la la-users"></i>
                        </div>
                        <a href="accelerators" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning rounded-0 elevation-0">
                        <div class="inner">
                            <h3>{{ App\Models\stakeHoldersDetail::whereIn('users_id', $incubator_id)->where('isApproved', true)->count() }}
                            </h3>

                            <p>Incubators</p>
                        </div>
                        <div class="icon">
                            <i class="la la-users"></i>
                        </div>
                        <a href="incubators" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info rounded-0 elevation-0">
                        <div class="inner">
                            <h3>{{ App\Models\userRole::where('roles_id','!=', 1)->count() }}</h3>

                            <p>Registered Users</p>
                        </div>
                        <div class="icon">
                            <i class="la la-user-tie"></i>
                        </div>
                        <a href="users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="card rounded-0 elevation-0 border">
                <div class="card-header bg-secondary rounded-0">
                    <h3 class="card-title" style="letter-spacing: 1px">SoftCenter new Requests</h3>
                    <div class="card-tools">
                        <a href="Admin?mode=developer"
                            class="btn btn-sm <?php echo $sty = $mode == 'developer' || $mode == '' ? 'active' : 'text-white'; ?>">Developers</a>
                        <a href="Admin?mode=startup"
                            class="btn btn-sm <?php echo $sty = $mode == 'startup' || $mode == '' ? 'active' : 'text-white'; ?>">Startups</a>
                        <a href="Admin?mode=incubator"
                            class="btn btn-sm <?php echo $sty = $mode == 'incubator' ? 'active' : 'text-white'; ?>">Incubators</a>
                        <a href="Admin?mode=accelerator"
                            class="btn btn-sm <?php echo $sty = $mode == 'accelerator' ? 'active' : 'text-white'; ?>">Accelerators</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-hover">
                        @if ($mode == 'developer')
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
                                        <td>
                                            {{ App\Models\User::find($developer->users_id)->name ?? '' }}</td>
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
                        @elseif ($mode == 'incubator' || $mode == 'accelerator')
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Company Name</th>
                                    <th>Address</th>
                                    <th>Postal Code</th>
                                    {{-- <th>Business Modal</th> --}}
                                    {{-- <th>Prefered startup Stage</th> --}}
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
                                        {{-- <td>{{ $incubator->business_model }}</td> --}}
                                        {{-- <td>{{ $incubator->pref_startup_stage }}</td> --}}
                                        <td>
                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#more-info{{ $incubator->id }}">More Info</button>
                                            @if (!$incubator->isApproved)
                                                <button class="btn btn-sm btn-primary"
                                                    onclick="dataManage({{ $incubator->id }},'Approve_stakeholder','Approve_stakeholder')">Approve</button>
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- The Modal -->
                                    <div class="modal fade" id="more-info{{ $incubator->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><small class="text-muted">Incubator</small> -
                                                        {{ $incubator->org_name }}</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
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
                                                    <b>Business Modal Description <small
                                                            class="text-muted">{{ $incubator->business_model }}</small></b>
                                                    <p>{!! $incubator->business_model_desc !!}</p>
                                                    <hr>
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
                        @else
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Name of product/Service</th>
                                    <th>Focus Sector</th>

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

                                        <td>
                                            <button class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#more-info{{ $startup->id }}">view</button>
                                            @if (!$startup->isApproved)
                                                <button class="btn btn-sm btn-primary"
                                                    onclick="dataManage({{ $startup->id }},'Approve_startup','Approve_startup')">Approve</button>
                                            @endif

                                            <button class="btn btn-sm btn-danger">Reject</button>
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
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <b>Focus Sector</b>
                                                    <p>{{ App\Models\FocusSector::find($startup->focus_sectors_id)->sector ?? null }}
                                                    </p>
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
                                                    Name:
                                                    <b>{{ App\Models\User::find($startup->users_id)->name }}</b><br>
                                                    Phone:
                                                    <b>{{ App\Models\User::find($startup->users_id)->phone }}</b><br>
                                                    Email:
                                                    <b>{{ App\Models\User::find($startup->users_id)->email }}</b><br>
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
                        @endif
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
