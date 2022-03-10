@extends('layouts.master')

@section('title', ucfirst(Request::segment(1)))

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header py-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold"><i class="fas fa-bullhorn text-purple"></i> Announcements
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item btn btn-primary text-white"><button data-toggle="modal" data-target="#announcement_modal" class="btn btn-sm btn-primary">Create Announcement</button></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($anouncements as $anounce)
                    <div class="col-md-6 mb-3" style="max-height: 487px; overflow: auto">
                        <div class="callout  rounded-0 elevation-0">
                            <div class="">
                               <div class="float-left"> <h6 class="text-muted"><small>{{ $anounce->target_to }}</small></h6></div>
                                <div class="float-right"><h6 class="text-muted"><small>{{ $anounce->created_at->format('d M, Y') }}</small></h6></div>
                            </div>
                            <div class="mt-lg-5">
                                <h6 class="font-weight-bold">{{ $anounce->title }}</h6>
                            </div>
                            <img src="{{ asset('storage/uploaded/ads/image/'.$anounce->image_file) }}" width="100%" height="300px" alt="" srcset="">
                            {!! $anounce->content !!}
                            <button onclick="dataManage({{ $anounce->id }},'Delete_announcement','delete_announcement')" class="float-left btn btn-danger btn-sm mr-3"><i class="fas fa-trash"></i> Delete</button>
                            <button class="float-left btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</button>
                            <a href="#" class="float-right"><i class="fas fa-download"></i> Attached File</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <br><p></p><br>

      <!-- The Modal -->
      <div class="modal fade" id="announcement_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="announcement_loader"></div>
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add announcement or Ads</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="add_announcement_form" method="POST" action="add_announcement"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="banner_image">Banner Image:</label>
                            <input type="file" name="image_file" class="form-control-file" autofocus
                                autocomplete="false" required>
                        </div>

                        <div class="form-group">
                          <label for="details" title="short details">Short Details</label>
                          <textarea name="content" maxlength="255" class="form-control"  required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="expiredate">Expire at:</label>
                            <input type="date" name="expr_date" class="form-control" autofocus
                                autocomplete="false" required>
                        </div>
                        <div class="form-group">
                           <label for="">For</label>
                            <select class="form-control custom-select" name="target_to" required>
                                    <option value=""></option>
                                    <option>Incubators and Accelerators</option>
                                    <option>Startups</option>
                                    <option>Website Vistors</option>
                                    <option>All users</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Attachement Pdf File:</label>
                            <input type="file" name="attachment" class="form-control-file" autofocus
                                autocomplete="false" >
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6"><button  type="submit"
                                    class="btn btn-primary add_announcement_btn w-100">post</button></div>
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
