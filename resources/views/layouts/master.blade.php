<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="images/SoftCenter.jpg" type="image/x-icon">
    <link rel="icon" href="images/SoftCenter.jpg" type="image/x-icon">

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/line_awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="dist/css/custo.css">
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">


        @include('layouts.navigation')
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content pt-3">
                @section('content')
                @show
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
         <p><br></p>
         <p><br></p>
         <p><br></p>
        <footer class="main-footer text-center fixed-bottom">
            <span class="small text-secondary">Copyright &copy; {{ date('Y') }} SoftCenter</span>
        </footer>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- The change pasdsword -->
        <div class="modal fade" id="chaangepassword">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="waiting-saving"></div>
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Change Password</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="changepassword-form" method="POST" action="changepassword">
                            @csrf
                            <div class="form-group">
                                <label for="password">Old Passwoprd:</label>
                                <input type="password" minlength="8" name="oldpassword" class="form-control"
                                    id="password" autofocus autocomplete="false" required>
                            </div>

                            <div class="form-group">
                                <label for="password">New Password:</label>
                                <input name="password" type="password" minlenght="8"
                                    class="form-control reg-input @error('password') is-invalid @enderror"
                                    autocomplete="new-password" id="password" required>
                            </div>

                            <div class="form-group">
                                <label for="cpassword">Confirm password:</label>
                                <input name="password_confirmation" autocomplete="new-password" type="password"
                                    minlenght="8" class="form-control reg-input" id="password-confirm" required>
                            </div>
                            <div class="message"></div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6"><button class="btn btn-primary changepassword_btn">Change password</button></div>
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
        <!-- The change user info -->
        <div class="modal fade" id="chaangeuserinfo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="waiting-change-saving"></div>
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Change User info</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="changeuserinfo_form" method="POST" action="chaangeuserinfo"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="password">Profile Image:</label>
                                <input type="file"  name="profile_image" class="form-control-file"  autofocus autocomplete="false" >
                            </div>
                            <div class="form-group">
                                <label for="password">Name:</label>
                                <input type="text" minlength="6" name="name" class="form-control" value="{{ Auth::user()->name }}" autofocus autocomplete="false" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Phone:</label>
                                <input type="text"  name="phone" class="form-control" value="{{ Auth::user()->phone }}" data-inputmask='"mask": "+255-999-999-999"' data-mask autofocus autocomplete="false" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Email:</label>
                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" autofocus autocomplete="false" required>
                            </div>
                            <div class="message"></div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6"><button class="btn btn-primary chaangeuserinfo_btn">save changes</button></div>
                                <div class="col-md-3"></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- ./wrapper -->


    <script>
        $.ajaxSetup({
             headers: {
                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
             }
         });
   </script>
    <script src="js/jquery.form.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/custo.js"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="dist/js/demo.js"></script> --}}
    <script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <script src="plugins/filterizr/jquery.filterizr.min.js"></script>
    {{-- DATETIMEPICKER --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"
        integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw=="
        crossorigin="anonymous"></script> --}}
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    {{-- input Mask --}}
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script src="js/softcenter.0.0.3.js"></script>
    <script>
        $('[data-mask]').inputmask();
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        $(function() {

            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })

    </script>
    <script>
        $(function() {
             //Initialize Select2 Elements

             $('.select2bs4Theme1').select2({
                theme: 'bootstrap4'
                })
             $('.select2bs4Theme2').select2({
                theme: 'bootstrap4'
                })


            $( "body" ).delegate( "#stakeholderList", "click", function() {
                  //Initialize Select2 Elements
                $('.select2').select2()
                //Initialize Select2 Elements
                $('.select2bs4').select2({
                theme: 'bootstrap4'
                })
            });

            $('#datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $('.text-editor').summernote({
            toolbar: [

                ['misc', ['codeview', 'fullscreen', 'undo', 'redo']]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video', 'hr', 'math']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });
    </script>
</body>

</html>
