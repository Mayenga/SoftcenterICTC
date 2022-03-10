@extends('layouts.master')

@section('title', $role)

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header py-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item text-dark font-weight-bold">
                            <h4>Developer Details</h4>
                        </li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-info "><span class="{{ $text }}"></span> {{ $status }}
                        </li>
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
            <div class="card card-primary card-outline">
                <div class="card-header">
                    @if (count($details) == 0)
                        <span class="text-center text-muted">Professional Details</span>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body mb-lg-5">
                    <div class="container">

                        <form id="developer_form_data" method="POST" action="save_data" >
                            @csrf
                            <div class="col-md-10 offset-md-1">
                                <div class="form-group text-left">
                                    <label class="text-left mb-2">I have experience working in:</label>
                                    <div class="row">
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="position[]"
                                                id="1 position" value="Senior Software Engineer">
                                            <label class="form-check-label text-capitalize" s for="1 position">Senior
                                                Software Engineer</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="position[]"
                                                id="2 position" value="Mid Level Software Engineer">
                                            <label class="form-check-label text-capitalize" s for="2 position">Mid Level
                                                Software Engineer</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="position"
                                                id="12 position" value="IoT Software Engineer">
                                            <label class="form-check-label text-capitalize" s for="12 position">IoT
                                                Software Engineer</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="position[]"
                                                id="8 position" value="Hybrid Apps Developer">
                                            <label class="form-check-label text-capitalize" s for="8 position">Hybrid
                                                Apps Developer</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="position[]"
                                                id="10 position" value="Frontend Developer">
                                            <label class="form-check-label text-capitalize" s for="10 position">Frontend
                                                Developer</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="position[]"
                                                id="11 position" value="Embedded Systems Engineer">
                                            <label class="form-check-label text-capitalize" s for="11 position">Embedded
                                                Systems Engineer</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="position[]"
                                                id="9 position" value="DevOps">
                                            <label class="form-check-label text-capitalize" s
                                                for="9 position">DevOps</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="position[]"
                                                id="13 position" value="AI Engineer (with Python)">
                                            <label class="form-check-label text-capitalize" s for="13 position">AI
                                                Engineer (with Python)</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="position[]"
                                                id="3 position" value="Junior Software Engineer">
                                            <label class="form-check-label text-capitalize" s for="3 position"> Junior
                                                Software Engineer</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="position[]"
                                                id="7 position" value="iOS Apps Developer">
                                            <label class="form-check-label text-capitalize" s for="7 position"> iOS Apps
                                                Developer</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="position[]"
                                                id="5 position" value="Full Stack Developer">
                                            <label class="form-check-label text-capitalize" s for="5 position"> Full
                                                Stack Developer</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="position[]"
                                                id="4 position" value="Backend Engineer">
                                            <label class="form-check-label text-capitalize" s for="4 position"> Backend
                                                Engineer</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="position[]"
                                                id="6 position" value="Android Apps Developer">
                                            <label class="form-check-label text-capitalize" s for="6 position"> Android
                                                Apps Developer</label>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="form-group text-left">
                                    <label class="text-left mb-2">I consider myself as an/a: </label>
                                    <div class="row">
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="level" id="intern"
                                                value="intern">
                                            <label class="form-check-label" for="intern">Intern</label>
                                        </div>
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="level" id="junior"
                                                value="junior">
                                            <label class="form-check-label" for="junior">Associate/Junior</label>
                                        </div>
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="level" id="mid_level"
                                                value="mid_level">
                                            <label class="form-check-label" for="mid_level">Mid Level</label>
                                        </div>
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="level" id="senior"
                                                value="senior">
                                            <label class="form-check-label" for="senior">Senior</label>
                                        </div>
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="level"
                                                id="staff_engineer" value="staff_engineer">
                                            <label class="form-check-label" for="staff_engineer">Staff Engineer</label>
                                        </div>
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="level" id="architect"
                                                value="architect">
                                            <label class="form-check-label" for="architect">Architect</label>
                                        </div>
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="level" id="c_level"
                                                value="c_level">
                                            <label class="form-check-label" for="c_level">C Level</label>
                                        </div>
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="level" id="consultant"
                                                value="consultant">
                                            <label class="form-check-label" for="consultant">Consultant</label>
                                        </div>
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="level" id="other"
                                                value="other">
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="form-group text-left">
                                    <label class="text-left mb-2">How long have you been working in this?</label>
                                    <div class="row">
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="experience"
                                                id="undergraduate" value="undergraduate">
                                            <label class="form-check-label" for="undergraduate">Undergraduate</label>
                                        </div>
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="experience" id="1_year"
                                                value="1 year">
                                            <label class="form-check-label" for="1_year">6m - 1yr</label>
                                        </div>
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="experience" id="2_4"
                                                value="2-4 yrs">
                                            <label class="form-check-label" for="2_4">2-4</label>
                                        </div>
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="experience" id="4_7"
                                                value="4-7 yrs">
                                            <label class="form-check-label" for="4_7">4-7</label>
                                        </div>
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="experience" id="8_10"
                                                value="8-10 yrs">
                                            <label class="form-check-label" for="8_10">8-10</label>
                                        </div>
                                        <div class="col-md-3 form-check custom-radio form-check-inline">
                                            <input class="form-check-input" type="radio" name="experience" id="11+"
                                                value="11+ yrs">
                                            <label class="form-check-label" for="11+">11+</label>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="form-group text-left">
                                    <label class="text-left mb-2">What languages/stacks do you build with?</label>
                                    <div class="row">
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]"
                                                id="17 stack" value="Android(Java)">
                                            <label class="form-check-label" for="17 stack"> Android(Java)</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]" id="3 stack"
                                                value="C++">
                                            <label class="form-check-label" for="3 stack"> C++</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]"
                                                id="19 stack" value="iOS(Objective C)">
                                            <label class="form-check-label" for="19 stack"> iOS(Objective C)</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]"
                                                id="18 stack" value="iOS(Swift)">
                                            <label class="form-check-label" for="18 stack">iOS(Swift)</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]" id="7 stack"
                                                value="Java">
                                            <label class="form-check-label" for="7 stack"> Java</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]" id="6 stack"
                                                value="Javascript">
                                            <label class="form-check-label" for="6 stack"> Javascript</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]"
                                                id="11 stack" value="LAMP">
                                            <label class="form-check-label" for="11 stack"> LAMP</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]"
                                                id="10 stack" value="MEAN">
                                            <label class="form-check-label" for="10 stack"> MEAN</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]"
                                                id="13 stack" value="MongoDB">
                                            <label class="form-check-label" for="13 stack">MongoDB</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]"
                                                id="12 stack" value="MySQL">
                                            <label class="form-check-label" for="12 stack"> MySQL</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]" id="2 stack"
                                                value="PHP">
                                            <label class="form-check-label" for="2 stack"> PHP</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]" id="8 stack"
                                                value="Python">
                                            <label class="form-check-label" for="8 stack"> Python</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]"
                                                id="16 stack" value="Android(Kotlin)">
                                            <label class="form-check-label" for="16 stack">Android(Kotlin)</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]"
                                                id="15 stack" value="C#">
                                            <label class="form-check-label" for="15 stack">C#</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]" id="1 stack"
                                                value="C# for CRM">
                                            <label class="form-check-label" for="1 stack">C# for CRM</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]" id="9 stack"
                                                value="MERN">
                                            <label class="form-check-label" for="9 stack">MERN</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]"
                                                id="20 stack" value="Node.js">
                                            <label class="form-check-label" for="20 stack">Node.js</label>
                                        </div>
                                        <div class="col-md-3 form-check ">
                                            <input class="form-check-input" type="checkbox" name="stack[]"
                                                id="14 stack" value="React and Javascript">
                                            <label class="form-check-label" for="14 stack">React and Javascript</label>
                                        </div>
                                    </div>

                                </div>
                                 <hr>
                                 <div class="row">
                                     <div class="col-md-3"></div>
                                     <div class="col-md-6"><button class="btn btn-primary w-100 dev_save_btn">Submit Details</button></div>
                                     <div class="col-md-3"></div>
                                 </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
