<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/favicon.png" rel="apple-touch-icon">

    <title>{{ config('app.name', 'SoftCenter') }}</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/softcenter.css">

</head>

<body class="hold-transition register-page"
    style="background: url(images/img_bg_1.png); background-repeat: no-repeat; background-size: cover ">
    {{ $slot }}
    @include('sweetalert::alert')
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    {{-- input Mask --}}
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    {{-- jquery form --}}
    <script src="js/jquery.form.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <script>
        // $("#example1").DataTable({
        //     responsive: true,
        //     autoWidth: false
        // });
        $('[data-mask]').inputmask()
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
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

        function newsManage(id, mode) {
            // var mode = "removeMedication";
            swal.fire({
                title: 'Are you sure?',
                text: "You are going to " + mode + " !",
                type: 'warning',
                icon: "warning",
                dangerMode: true,
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, ' + mode,
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                url: 'media-manage',
                                type: 'POST',
                                data: {
                                    id: id,
                                    mode: mode
                                },
                                dataType: 'json'
                            })
                            .done(function(response) {
                                if (response.error) {
                                    swal.fire({
                                        icon: 'error',
                                        title: 'Message',
                                        text: response.error,
                                    });
                                }
                                if (response.success) {
                                    swal.fire({
                                        icon: 'success',
                                        title: 'Message',
                                        text: response.success,
                                    });
                                    location.reload();
                                }

                            })
                            .fail(function() {
                                swal.fire('Oops...', 'Something went wrong !', 'error');
                            });
                    });
                },
                allowOutsideClick: false
            });
        }

        $(document).ready(function(e) {
            $("#register_form").ajaxForm({
                beforeSend: function() {
                    $('.register_btn').addClass('disabled');
                    $('.register_btn').attr('disabled', '');
                    $(".register_btn").html(
                        ' <div class="overlay d-flex justify-content-center align-items-center"><i class="fas fa-2x fa-sync fa-spin"></i></div>'
                    );
                },

                success: function(data) {
                    if (data.errors) {
                        $('.register_btn').removeAttr('disabled', '');
                        $('.register_btn').removeClass('disabled');
                        $(".register_btn").html('Create Account');
                        toastr.error(data.errors);
                    }
                    if (data.success) {
                        $('.register_btn').removeAttr('disabled', '');
                        $('.register_btn').removeClass('disabled');
                        $(".register_btn").html('Create Account');
                        $("#register_form")[0].reset();
                        toastr.success(data.message);
                        window.location.href = data.success;
                    }
                }
            });
            $("#login_form").ajaxForm({
                beforeSend: function() {
                    $('.login_btn').addClass('disabled');
                    $('.login_btn').attr('disabled', '');
                    $(".login_btn").html(
                        ' <div class="overlay d-flex justify-content-center align-items-center"><i class="fas fa-2x fa-sync fa-spin"></i></div>'
                    );
                },

                success: function(data) {
                    if (data.errors) {
                        $('.login_btn').removeAttr('disabled', '');
                        $('.login_btn').removeClass('disabled');
                        $(".login_btn").html('Continue to SoftCenter');
                        toastr.error(data.errors);
                    }
                    if (data.success) {
                        $('.login_btn').removeAttr('disabled', '');
                        $('.login_btn').removeClass('disabled');
                        $(".login_btn").html('Continue to SoftCenter');
                        $("#login_form")[0].reset();
                        toastr.success(data.message);
                        window.location.href = data.success;
                    }
                }
            });

            $("#contact_form").ajaxForm({
                beforeSend: function() {
                    $('.contact_btn').addClass('disabled');
                    $('.contact_btn').attr('disabled', '');
                },

                success: function(data) {
                    if (data.errors) {
                        $('.contact_btn').removeAttr('disabled', '');
                        $('.contact_btn').removeClass('disabled');
                        toastr.error(data.errors);
                    }
                    if (data.success) {
                        $('.contact_btn').removeAttr('disabled', '');
                        $('.contact_btn').removeClass('disabled');
                        $("#contact_form")[0].reset();
                        toastr.success(data.message);
                    }
                }
            });

        });

        function checkPasswordStrength() {
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            if ($('#password').val().length < 8) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('weak-password');
                $('#password-strength-status').html("Weak (should be atleast 8 characters.)");
            } else {
                if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $(
                        '#password').val().match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('strong-password');
                    $('#password-strength-status').html("Strong");
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('medium-password');
                    $('#password-strength-status').html(
                        "Medium (should include alphabets, numbers and special characters.)");
                }
            }
        }

        function confirmPassword() {
            if ($('#cpassword').val().length != "") {
                if ($('#password').val() == $('#cpassword').val()) {
                    $('#password-confirm-status').removeClass();
                    $('#password-confirm-status').addClass('strong-password');
                    $('#password-confirm-status').html("confirmed");
                } else {
                    $('#password-confirm-status').removeClass();
                    $('#password-confirm-status').addClass('weak-password');
                    $('#password-confirm-status').html("Password does not match");
                }
            } else {
                $('#password-confirm-status').removeClass();
                $('#password-confirm-status').html("");
            }

        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        function isName(name) {
            var regex = /^[a-z ,.'-]+$/i;
            return regex.test(name);
        }

        $(document).on("click", ".sendVerificationCode", function() {
            var email = $("#user_email").val();
            var name = $("#full_name").val();
            if (email != ""  && name != "") {
                if (isEmail(email) && isName(name)) {
                    $('.sendVerificationCode').html('<small><i>sending...</i></small>');
                    $.post("sendVerificationCode", {
                            email: email,name:name
                        })
                        .done(function(data) {
                            if (data.errors) {
                                toastr.error(data.errors);
                                $('.sendVerificationCode').html('try again');
                            }
                            if (data.success) {
                                toastr.success(data.success);
                                $("#user_email_hold").val(email);
                                $("#user_code_hold").val(data.code);
                                $('.sendVerificationCode').html('resend code');
                            }
                        });
                } else {
                    toastr.error("Please enter a correct email format  and your full name");
                }
            } else {
                toastr.error("Please enter email address and your full name");
            }

        });

    </script>

</body>

</html>
