 <!-- Main Sidebar Container -->
 <aside class="main-sidebar main-sidebar-custom bg-white elevation-1">
     <!-- Brand Logo -->
     <a href="#" data-toggle="modal" data-target="#chaangeuserinfo" class="brand-link border-bottom">
         <img src="{{ asset('storage/uploaded/users/'.Auth::user()->profile_image) }}" alt="User DP" class="brand-image img-circle">
         <span class="brand-text font-weight-light small font-weight-bold">{{ Auth::user()->name }}</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item @if (Request::segment(1)=='{{ $role }}' ) custo @endif">
                     <a href="{{ $role }}" class="nav-link">
                         <i class="la la-sliders-h text-lg nav-icon"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>

                 @if ($role == 'Admin')
                     @include('layouts.admin_sidebar')
                 @endif
                 @if ($role == 'Accelerator' || $role == 'Incubator')
                     @include('layouts.stakeholder_sidebar')
                 @endif
                 @if ($role == 'Startup')
                     @include('layouts.startup_sidebar')
                 @endif


                 <li class="nav-item menu-open">
                     <a href="#" class="nav-link border border-dark rounded">
                         <i class="nav-icon la la-adjust text-lg"></i>
                         <p>
                             Account settings
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item @if (Request::segment(1)=='chaangepassword' ) custo @endif">
                             <a href="#" data-toggle="modal" data-target="#chaangepassword" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Change Password</p>
                             </a>
                         </li>
                         <li class="nav-item @if (Request::segment(1)=='chaangeuserinfo' ) custo @endif">
                             <a href="#" data-toggle="modal" data-target="#chaangeuserinfo" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Update User Info</p>
                             </a>
                         </li>
                     </ul>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->

     <div class="sidebar-custom">
         {{-- <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a> --}}
     </div>
     <!-- /.sidebar-custom -->
 </aside>
