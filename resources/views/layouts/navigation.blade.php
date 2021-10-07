<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top" style="background: #106eea">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
        </li>
        <a href="{{ $role }}">
            <h3 class="mx-2 text-white my-1 font-weight-bold">SoftCenter</h3>
        </a>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3 d-none d-sm-block">
        <div class="input-group input-group-sm">
            <input disabled="true" class="form-control form-control-navbar text-center font-weight-bold"
                value="{{ $role }}" style="border-radius: 3px">
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto my-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="la la-print h4 text-white"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right border-0 elevation-1 rounded-0">
                <h3 class="dropdown-footer font-weight-bold text-lg mt-2">Print Documents</h3>

                @if ($role == 'Admin')
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <div class="media">
                            <span class="mg-size-50 mr-3 img-circle"><i class="la la-file-pdf h4"></i></span>
                            <div class="media-body">
                                <h4 class="dropdown-item-title pt-1">
                                    Print startups list
                                    <span class="float-right text-sm text-danger"><i
                                            class="la la-download h5"></i></span>
                                </h4>
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <div class="media">
                            <span class="mg-size-50 mr-3 img-circle"><i class="la la-file-pdf h4"></i></span>
                            <div class="media-body">
                                <h4 class="dropdown-item-title pt-1">
                                    Print incubators list
                                    <span class="float-right text-sm text-danger"><i
                                            class="la la-download h5"></i></span>
                                </h4>
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <div class="media">
                            <span class="mg-size-50 mr-3 img-circle"><i class="la la-file-pdf h4"></i></span>
                            <div class="media-body">
                                <h4 class="dropdown-item-title pt-1">
                                    Print accelerators list
                                    <span class="float-right text-sm text-danger"><i
                                            class="la la-download h5"></i></span>
                                </h4>
                            </div>
                        </div>
                    </a>
                @endif
                @if ($role != 'Admin')
                    <div class="dropdown-divider"></div>
                    <a href="
                               @if ($role == "Incubator" || $role == "Accelerator")
                                      stakeholder_pdf
                               @endif
                               @if ($role == "Startup")
                                      startup_pdf
                               @endif
                            " class="dropdown-item">
                        <div class="media">
                            <span class="mg-size-50 mr-3 img-circle"><i class="la la-file-pdf h4"></i></span>
                            <div class="media-body">
                                <h4 class="dropdown-item-title pt-1">
                                    Print My Information
                                    <span class="float-right text-sm text-danger"><i
                                            class="la la-download h5"></i></span>
                                </h4>
                            </div>
                        </div>
                    </a>

                @endif

            </div>
        </li>
        <li class="nav-item dropdown d-none d-sm-block">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="la la-power-off text-white h4"></i>
            </a>
        </li>
</nav>
<!-- /.navbar -->
