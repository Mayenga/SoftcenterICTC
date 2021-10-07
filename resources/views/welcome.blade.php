<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tanzania ICT Innovation Portal</title>
    <meta content="" name="description">
    <meta content="ict,TEHAMA, TEKINOLOGIA, TANZANIA, TECHNOLOGY, MAWASILIANO" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/favicon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="dist/line_awesome/css/line-awesome.min.css">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
     <!-- DataTables -->
     <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.0.0.1.css" rel="stylesheet">
    <link href="assets/css/custo.css" rel="stylesheet">

</head>

<body>
    <?php try {
    $anouncements =
    App\Models\Anouncement::where('target_to', 'Website Vistors')
    ->where('expr_date', '>', date('Y-m-d', time()))
    ->get() ?? [];
    $acceleratorsID = App\Models\Role::where('name', 'Accelerator')->first()->id ?? null;
    $accelerator_id = App\Models\userRole::where('roles_id', $acceleratorsID)->pluck('users_id') ?? [];
    $incubatorID = App\Models\Role::where('name', 'Incubator')->first()->id ?? null;
    $incubator_id = App\Models\userRole::where('roles_id', $incubatorID)->pluck('users_id') ?? [];
    } catch (Exception $err) {
    $anouncements = [];
    $acceleratorsID = [];
    $accelerator_id = [];
    $incubatorID = [];
    $incubator_id = [];
    } ?>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">info@ictc.go.tz</a>
                <i class="icofont-phone"></i> +255 738 171 742

            </div>
            <div class="social-links">
                <a href="https://web.facebook.com/ICT-Commission-106494500752999/" target="_blank" class="facebook"><i
                        class="icofont-facebook"></i></a>
                <a href="https://twitter.com/ict_commission?lang=en" target="_blank" class="twitter"><i
                        class="bx bxl-twitter"></i></a>
                <a href="https://www.instagram.com/ict_commission_tanzania/" target="_blank" class="instagram"><i
                        class="icofont-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="/">SoftCenter<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <a href="register" class="btn btn-primary ml-3 px-3 py-2 text-white btn-sm">Register</a>
                    <a href="login" class="btn btn-primary ml-3 px-3 py-2 text-white btn-sm">Sign In</a>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row mt-4">
                <div class="col-md-7">
                    <h1>Welcome to <span>SoftCenter</span></h1>
                    <h2>Tanzania ICT Innovation Portal</h2>
                    <div class="d-flex">
                        <a href="register" class="btn-get-started scrollto">Get Started</a>
                        <!-- <a href="" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a> -->
                    </div>
                </div>
                <div class="col-md-5">
                    @if (count($anouncements) > 0)
                        <div id="demo" class="carousel slide" data-ride="carousel">

                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                @php
                                    $i = 0;
                                    $a = 0;
                                @endphp
                                @foreach ($anouncements as $data)
                                    @if ($i == 0)
                                        <li data-target="#demo" data-slide-to="{{ $i }}" class="active"></li>
                                    @else
                                        <li data-target="#demo" data-slide-to="{{ $i }}"></li>
                                    @endif
                                    @php
                                        $i += 1;
                                    @endphp
                                @endforeach
                            </ul>

                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                @foreach ($anouncements as $anounce)
                                    <div
                                        class="carousel-item <?php echo $active = $a == 0 ? 'active' : ''; ?>">
                                        <img src="{{ asset('storage/uploaded/ads/image/' . $anounce->image_file) }}"
                                            alt="{{ $anounce->title }}" width="100%">
                                        <div class="text-gray-dark">
                                            {{ $anounce->content }}
                                        </div>
                                        <div class="carousel-caption">
                                            {{-- <h3 class="text-primary">{{ $anounce->title }}</h3> --}}
                                        </div>
                                    </div>
                                    @php
                                        $a += 1;
                                    @endphp
                                @endforeach
                            </div>

                            <!-- Left and right controls -->
                            <a class="carousel-control-prev text-primary" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>

                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section><!-- End Hero -->

    <!-- ======= Featured Services Section ======= -->

    <section id="featured-services" class="featured-services mt-lg-n5 pt-2">
        <div class="px-5" data-aos="fade-up">
            <div class="row">

                <div class="col d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="la la-code"></i></div>
                        <h4 class="title"><a href="#">Developers</a></h4>
                        <p class="description">software developer engages in identifying, designing, installing
                            and testing a software system they have built for a company from the ground up.</p>
                        <a href="#" onclick="openListModal('Developers')" class="btn btn-primary float-right">View
                            a List</a>
                    </div>
                </div>

                <div class="col d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="la la-user"></i></div>
                        <h4 class="title"><a href="#">Startups</a></h4>
                        <p class="description">A Person or young company founded by one or more entrepreneurs to
                            develop a unique product or service and bring it to market.</p>
                        <a href="#" onclick="openListModal('Startups')" class="btn btn-primary float-right">View a
                            List</a>
                    </div>
                </div>

                <div class="col d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="la la-project-diagram"></i></div>
                        <h4 class="title"><a href="">Incubators</a></h4>
                        <p class="description">Collaborative program designed to help tech- startups in their
                            infancy succeed by providing workspace, seed funding, mentoring and training.</p>
                        <a href="#" onclick="openListModal('Incubators')" class="btn btn-primary float-right">View
                            a List</a>
                    </div>
                </div>

                <div class="col d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="la la-chart-bar"></i></div>
                        <h4 class="title"><a href="">Accelerators</a></h4>
                        <p class="description">organization created by experienced tech entrepreneurs to help
                            early-stage tech companies develop their product, hone their business model, and
                            most importantly connect with investors.</p>
                        <a href="#" onclick="openListModal('Accelerators')" class="btn btn-primary float-right">View a
                            List</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About</h2>
                    <h3>Find Out More <span>About Us</span></h3>
                    <p>Infomation and Communications Technologies Commission (ICTC) is an ICT promotion
                        government
                        body.
                        The key mandate of ICTC among others is to foster investment in ICT. </p>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="la la-user"></i>
                            <span
                                data-toggle="counter-up">{{ App\Models\StartupProduct::where('isApproved', true)->count() ?? 0 }}</span>
                            <p>Developer</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="la la-user"></i>
                            <span
                                data-toggle="counter-up">{{ App\Models\StartupProduct::where('isApproved', true)->count() ?? 0 }}</span>
                            <p>Startups</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="la la-project-diagram"></i>
                            <span
                                data-toggle="counter-up">{{ App\Models\stakeHoldersDetail::whereIn('users_id', $incubator_id)->where('isApproved', true)->count() ?? 0 }}</span>
                            <p>Incubators</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="la la-chart-bar"></i>
                            <span
                                data-toggle="counter-up">{{ App\Models\stakeHoldersDetail::whereIn('users_id', $accelerator_id)->where('isApproved', true)->count() ?? 0 }}</span>
                            <p>Accelerators</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->


        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Services</h2>
                    <h3>Check our <span>Services</span></h3>
                    <p>To ensure successful achievements of its objectives and promotion of the ICT solutions
                        developed
                        by startups
                        teams / individuals, the Softcenter will provide.</p>
                </div>

                <section>
                    <div class="container">


                        <div class="row mbr-justify-content-center">

                            <div class="col-lg-6 mbr-col-md-10">
                                <div class="wrap">
                                    <div class="ico-wrap">
                                        <span class="mbr-iconfont fa-volume-up fa"></span>
                                    </div>
                                    <div class="text-wrap vcenter">
                                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">
                                            Promotion of
                                            local <span>ICT industry products</span></h2>
                                        <p class="mbr-fonts-style text1 mbr-text display-6">Promotion of the
                                            local ICT
                                            industry products and
                                            linking product solution to the market with an ultimate goal to
                                            have a
                                            vibrant software/ICT
                                            industry that contributes to the industrial economy in Tanzania</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mbr-col-md-10">
                                <div class="wrap">
                                    <div class="ico-wrap">
                                        <span class="mbr-iconfont fa-calendar fa"></span>
                                    </div>
                                    <div class="text-wrap vcenter">
                                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">
                                            Potential
                                            sources of
                                            <span>Capital</span>
                                        </h2>
                                        <p class="mbr-fonts-style text1 mbr-text display-6">Linkages to
                                            potential
                                            sources of capital, investors and corporate partners, and other
                                            related
                                            services, with the primary objective of ensuring that the Teams
                                            successfully
                                            enter or grow their
                                            services/products in the market.</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6 mbr-col-md-10">
                                        <div class="wrap">
                                            <div class="ico-wrap">
                                                <span class="mbr-iconfont fa-globe fa"></span>
                                            </div>
                                            <div class="text-wrap vcenter">
                                                <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">ICT
                                                    facilities
                                                    <span> Guidance in market entry</span>
                                                </h2>
                                                <p class="mbr-fonts-style text1 mbr-text display-6">Provision of office
                                                    spaces,
                                                    ICT facilities, capacity building, value addition, market
                                                    validation, legal
                                                    counselling, pitching facilitation, product exhibition and
                                                    promotion,
                                                    coaching and mentorship
                                                    and guidance in market entry.</p>
                                            </div>
                                        </div>
                                    </div> --}}
                            <div class="col-lg-6 mbr-col-md-10">
                                <div class="wrap">
                                    <div class="ico-wrap">
                                        <span class="mbr-iconfont fa-trophy fa"></span>
                                    </div>
                                    <div class="text-wrap vcenter">
                                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">
                                            Innovation
                                            <span>ICT business startups</span>
                                        </h2>
                                        <p class="mbr-fonts-style text1 mbr-text display-6">Promoting innovation
                                            and ICT
                                            business startups and therefore creating opportunities for ICT
                                            startups
                                            and enterprenuers in both local and international ICT business
                                            industry.</p>
                                    </div>
                                </div>
                            </div>




                        </div>

                    </div>

                </section>
            </div>
        </section><!-- End Services Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <h3><span>Contact Us</span></h3>
                    <p>Feel free to use the contact options below for help and any kind of information query.
                    </p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="la la-map-marker"></i>
                            <h3>Our Address</h3>
                            <p> 14 Jamhuri Street, Dar es Salaam, Tanzania </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="la la-envelope"></i>
                            <h3>Email Us</h3>
                            <p>info@ictc.go.tz</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="la la-phone"></i>
                            <h3>Call Us</h3>
                            <p>+255 738 171 742</p>
                        </div>
                    </div>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-6 ">
                        <iframe class="mb-4 mb-lg-0"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31692.73324232165!2d39.2981431!3d-6.8194167!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4b08b878c235%3A0x97ce84be8f44a00a!2sInformation%20and%20Communication%20Technologies%20Commission!5e0!3m2!1sen!2stz!4v1623151220288!5m2!1sen!2stz"
                            frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                    </div>

                    <div class="col-lg-6">
                        <form id="contact_form" action="contact_form" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="form-row">
                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" data-rule="minlen:4"
                                        data-msg="Please enter at least 4 chars" required />
                                    <div class="validate"></div>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email"
                                        required />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" data-rule="minlen:4"
                                    data-msg="Please enter at least 8 chars of subject" required />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                    data-msg="Please write something for us" placeholder="Message" required></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit" class="contact_btn">Send
                                    Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>Join Our Newsletter</h4>
                        <p>For up to date information from softcenter, subscribe to the newsletter</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>SoftCenter<span>.</span></h3>
                        <p>
                            14 Jamhuri Street, <br>
                            Dar es Salaam,<br>
                            Tanzania <br><br>
                            <strong>Phone:</strong> +255 738 171 742<br>
                            <strong>Email:</strong> info@ictc.go.tz<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Related Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a target="_blank" href="http://www.ega.go.tz">e
                                    Government</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a target="_blank"
                                    href="http://www.mwtc.go.tz">Policy</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a target="_blank"
                                    href="http://www.tcra.go.tz">Regulatory</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a target="_blank"
                                    href="http://www.tic.go.tz">Investment</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a target="_blank"
                                    href="http://www.costech.or.tz">Research</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Promotion of local ICT industry
                                    products</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Potential sources of Capital
                                </a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">ICT facilities Guidance in
                                    market entry </a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Innovation ICT business
                                    startups</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Stay connected to us for much more reliable info and help.</p>
                        <div class="social-links mt-3">
                            <a href="https://web.facebook.com/ICT-Commission-106494500752999/" target="_blank"
                                class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.instagram.com/ict_commission_tanzania/" target="_blank"
                                class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="https://twitter.com/ict_commission?lang=en" target="_blank" class="twitter"><i
                                    class="bx bxl-twitter"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Information and Communication Technology (ICTC)
                        2021</span></strong>. All
                Rights Reserved
            </div>
            <div class="credits">
                <!-- Designed by <a href="">SoftCenter</a> -->
            </div>
        </div>
    </footer><!-- End Footer -->
    @include('partials.modals')
    <!-- <div id="preloader"></div> -->
    <!-- <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a> -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        function openListModal(type) {
            // $('#listDataModal').modal('hide');
            $.ajax({
                url: "listData",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    mode: "listData",
                    type: type
                },
                // async: false, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
                success: function(response, textStatus, jqXHR) {
                    $('#listDataLabel').html('List of '.type);
                    $('#listData').html(response);
                    $('#listDataModal').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }

        $('#list-data-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
    </script>


</body>

</html>
