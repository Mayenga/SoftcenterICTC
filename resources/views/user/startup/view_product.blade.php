@extends('layouts.master')

@section('title', $role)

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    @php
          use App\Http\Controllers\UtilityController;
    @endphp
    <div class="content-header py-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item text-dark font-weight-bold">
                            <h4>{{ $role }}</h4>
                        </li>
                        <li class="breadcrumb-item text-info">product details</li>
                        @if ($productData->isApproved)
                              <li class="breadcrumb-item">
                                  <a href="available_stakeholder?product_path={{ Crypt::encrypt($productData->id) }}" class="btn btn-sm btn-success">Check avalaible
                                      @if ($productData->product_cat == "Pre Mature")
                                         Incubators
                                      @endif
                                      @if ($productData->product_cat == "Matured")
                                          Accelerators
                                      @endif
                                      for your product
                                  </a>
                              </li>
                        @endif
                    </ol>
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
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Product Overview</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body mb-lg-5">
                     <div class="container">

                        <form id="startup_details_form" action="save_startup_details" method="post">
                            @csrf

                            <input type="hidden" name="mode" value="submit" hidden>

                            <div class="form-group">
                                <label for="product">Product or Service Name</label>
                                <input type="text" name="product_name" value="{{ $productData->product_name }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="product">Product or Service Description</label>
                                <textarea name="description" class="form-control text-editor" required>{!! $productData->description !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="sel1">Choose Ownership:</label>
                                <select id="ownershipTEST" onclick="checkOwnershipData()" class="form-control" id="sel1" name="ownership" required>
                                    <option>{{ $productData->ownership }}</option>
                                    <option>Individual</option>
                                    <option>Organization</option>
                                </select>
                            </div>

                            <div id="ownershipData"></div>

                            <div class="form-group">
                                <label for="sel1">What is your solution/ Product Sector:</label>
                                <select class="form-control" id="sel1" name="focus_sectors_id" required>
                                    <option value="{{ $productData->focus_sectors_id }}">{{ App\Models\FocusSector::find($productData->focus_sectors_id)->sector ?? null }}</option>
                                    @foreach (App\Models\FocusSector::where('isShared', true)->get() as $sector)
                                        <option value="{{ $sector->id }}">{{ $sector->sector }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product">Physical Address</label>
                                <input type="text" name="address" value="{{ $productData->address }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="product">Postal Code <small><a target="_blank"
                                            href="https://address.tcra.go.tz/postcode/Home/Home.do">Check postal code</a></small></label>
                                <input type="text" name="postal_code" value="{{ $productData->postal_code }}" class="form-control" placeholder="postal code #####"
                                    data-inputmask='"mask": "99999"' data-mask required>
                            </div>

                            <div class="form-group">
                                <label for="product">Your Website <small class="text-muted">optional</small></label>
                                <input type="url" name="web_url" value="{{ $productData->web_url }}" class="form-control" placeholder="http://www.example.co.tz">
                            </div>

                            <div class="form-group">
                                <label for="sel1">What is the business model of your product?</label>
                                <select id="business_model" class="form-control" id="sel1" name="business_model" required>
                                    <option value="{{ $productData->ownership }}">{{ $productData->business_model }}</option>
                                    <option value="Non-Profit">Non-Profit</option>
                                    <option value="For Profit">For Profit</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product">Description your Business model</label>
                                <textarea name="business_model_desc" maxlength="10000" class="form-control"
                                    placeholder="Non-profit {how you are going to cover the cost}, For Profit {how your product is going to genarate profit} "
                                    required>{!! $productData->business_model_desc !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="product">Attach your product or service Document(PDF File) </label>
                                <input type="file" name="file_name" class="form-control-file" >
                            </div>

                            <div class="form-group">
                                <label for="sel1">What is the financial stage of your product? </label>
                                <select class="form-control" id="sel1" name="finacial_stage" required>
                                    <option>{{ $productData->finacial_stage }}</option>
                                    <option value="Pre revenue stage">Pre revenue stage</option>
                                    <option value="Revenue stage">Revenue stage</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sel1">What is the stage of your product/service?</label>
                                <select id="product_stageTEST" class="form-control " id="sel1" onclick="productstage()" name="product_stage"
                                    required>
                                    <option>{{ $productData->product_stage }}</option>
                                    @foreach (UtilityController::product_stage() as $stage)
                                        <option>{{ $stage['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div id="productStageData"></div> --}}
                            <p class="text-muted text-center">Please kindly wait!! we are working for updating your details</p>

                        </form>

                        <script>
                            $("#startup_details_form")[0].reset();
                        </script>

                     </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
