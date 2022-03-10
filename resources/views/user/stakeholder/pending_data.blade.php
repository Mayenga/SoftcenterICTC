<input type="hidden" name="mode" value="update" hidden>
<input type="hidden" name="id" value="{{ $details->id }}" hidden>

<div class="form-group">
    <label for="product">Name of Organization</label>
    <input type="text" name="org_name" class="form-control" value="{{ $details->org_name }}" 
    @if ($status == "Approved")
        disabled
    @endif

    required>
    <input type="hidden" name="org_name" class="form-control" value="{{ $details->org_name }}" required hidden>
</div>

<div class="form-group">
    <label for="product">Name of parent Organization </label>
    <input type="text" name="parent_name" class="form-control" value="{{ $details->parent_name }}" required>
</div>


<div class="form-group">
    <label for="product">When you Established your Organization ?</label>
    <input type="text" name="est_year" class="form-control" data-inputmask-alias="datetime"
        data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{ $details->est_year }}" required>
</div>

<div class="form-group">
    <label for="sel1">Status:</label>
    <select class="form-control" id="sel1" name="isRegistered" required>
        <option value="1">Registered</option>
    </select>
</div>

<div class="form-group">
    <label for="Staffs">Number of Staffs</label>
    <input type="number" min="1" name="number_of_staffs" class="form-control" value="{{ $details->number_of_staffs }}"  required>
</div>

<div class="form-group">
    <label for="Staffs">Founders Details</label>
    <div class="table-responsive">
        <table class="table table-bordered" id="dynamic_field">
            @php
                $initial = 1;
            @endphp
           @foreach (App\Models\foundersDetail::where('stake_holders_details_id',$details->id)->get() as $founder)
                {{-- <input type="hidden" name="founder_id[]" value="{{ $founder->id }}" hidden> --}}
                <tr id="row_remove{{ $initial }}">
                    <td>
                        <input type="text" name="founder_name[]" placeholder="Enter Founder Name"
                            class="form-control name_list" value="{{$founder->name}}" required="" />
                    </td>
                    <td><input type="text" name="founder_phone[]" placeholder="Enter Founder Phone" class="form-control name_list" value="{{$founder->phone}}" required="" /></td>
                    <td><select class="form-control" id="sel1" name="founder_gender[]"  required><option>{{$founder->gender}}</option><option value="Male">Male</option><option value="Female">Female</option> </select></td>
                   
                    @if ($initial == 1)
                        <td><button type="button" name="add" id="add_another" class="btn btn-success">Add Another</button></td> 
                    @else
                        <td><button type="button" name="remove" id="{{ $initial }}" class="btn btn-danger btn_remove_row">X</button></td>    
                    @endif
                   
                </tr>

                @php
                    $initial += 1;
                @endphp
           @endforeach
        </table>
    </div>
</div>



<div class="form-group">
    <label for="product">Physical Address</label>
    <input type="text" name="address" class="form-control" value="{{ $details->address }}" required>
</div>
<div class="form-group">
    <label for="product">Postal Code <small><a target="_blank" href="https://address.tcra.go.tz/postcode/Home/Home.do">Check postal code</a></small></label>
    <input type="text" name="postal_code" class="form-control" placeholder="postal code #####" data-inputmask='"mask": "99999"' data-mask value="{{ $details->postal_code }}" required>
</div>

<div class="form-group">
    <label for="Staffs">Maximum Number of 
        @if ($role == "Incubator")
            Incubation space
        @endif
        @if ($role == "Accelerator")
             Acceleration space
        @endif
    </label>
    <input type="number" min="1" name="max_startup" class="form-control" placeholder="how many startup you can handle" value="{{ $details->max_startup }}" required>
</div>
@php
    $stages = explode(",", $details->pref_startup_stage);
    $focus_sectors = explode(",", $details->focus_sectors_id);
    $service_provided = explode(",", $details->service_provided);
    $program_duration = explode(",", $details->program_duration);
@endphp
<div class="form-group">
    <label for="sel1">Preferred Startup Stage</label>
    <select class="select2bs4Theme1"  name="pref_startup_stage[]" multiple="multiple"  style="width: 100%;" required>
        @if ($role == "Incubator")
            @for ($s = 0; $s < count($stages); $s++)
                 <option selected="selected">{{ $stages[$s] }}</option>
            @endfor
            @if (!in_array("Ideation Stage", $stages))
                  <option value="Ideation Stage" selected>Ideation Stage</option>    
            @endif
            @if (!in_array("Prototype Stage", $stages))
                 <option value="Prototype Stage">Prototype Stage</option>    
            @endif 
        @endif
        @if ($role == "Accelerator")
            @for ($s = 0; $s < count($stages); $s++)
                <option selected="selected">{{ $stages[$s] }}</option>
            @endfor
            @if (!in_array("Prototype Stage", $stages))
                <option value="Growth Stage">Growth Stage</option>    
            @endif 
            @if (!in_array("Scaling Stage", $stages))
                <option value="Scaling Stage">Scaling Stage</option>    
            @endif
           
        @endif
    
    </select>
</div>

<div class="form-group">
    <label for="product">Source of Funds</label>
    <textarea name="source_funds" class="form-control text-editor" maxlength="30000" required>{!! $details->source_funds !!}</textarea>
</div>

<div class="form-group">
    <label for="sel1">Focus Sector:</label>
    <select class="select2bs4Theme1"  multiple="multiple" data-placeholder="Select a Focus Sector"  name="focus_sectors_id[]" style="width: 100%;" required>
        @foreach (App\Models\FocusSector::where('isShared', true)->get() as $sector)
            @if (in_array($sector->id, $focus_sectors))
                <option value="{{ $sector->id }}" selected="selected">{{ $sector->sector }}</option>
            @endif 
            @if (!in_array($sector->id, $focus_sectors))
                <option value="{{ $sector->id }}">{{ $sector->sector }}</option>
            @endif 
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="sel1">Service you provide:</label>
    <select  class="select2bs4Theme1"  multiple="multiple" data-placeholder="Select service you provide" name="service_provided[]" style="width: 100%;" required>
      
       {{-- <option>Others</option> --}}
        @for ($se = 0; $se < count($service_provided); $se++)
            <option selected="selected">{{ $service_provided[$se] }}</option>
        @endfor
        @if (!in_array("Coaching", $service_provided))
            <option>Coaching</option>    
        @endif 
        @if (!in_array("Value Addition", $service_provided))
            <option>Value Addition</option>    
        @endif 
        @if (!in_array("Skill Development", $service_provided))
            <option>Skill Development</option>    
        @endif 
        @if (!in_array("Application Development", $service_provided))
            <option>Application Development</option>    
        @endif 
        @if (!in_array("IT Consulting", $service_provided))
            <option>IT Consulting</option>    
        @endif 
        @if (!in_array("IT Management", $service_provided))
            <option>IT Management</option>    
        @endif 
        @if (!in_array("Project Management", $service_provided))
            <option>Project Management</option>    
        @endif 
        @if (!in_array("Branding, Digital Marketing", $service_provided))
            <option>Branding, Digital Marketing</option>    
        @endif 
        @if (!in_array("Research", $service_provided))
            <option>Research</option>    
        @endif 
    </select>
</div>


<div class="form-group">
    <label for="sel1">Program duration:</label>
    <select class="select2bs4Theme1"  multiple="multiple" data-placeholder="Select program duration"  name="program_duration[]" style="width: 100%;" required>
        @for ($s = 0; $s < count($program_duration); $s++)
            <option selected="selected">{{ $program_duration[$s] }}</option>
        @endfor
       
        @if (!in_array("Three Month", $program_duration))
            <option selected>Three Month</option>    
        @endif
        @if (!in_array("Six Month", $program_duration))
            <option>Six Month</option>    
        @endif
        @if (!in_array("One year", $program_duration))
            <option>One year</option>    
        @endif
        @if (!in_array("More than a year", $program_duration))
            <option>More than a year</option>    
        @endif
      
    </select>
</div>

<div class="form-group">
    <label for="sel1">What is the business model you preffer from startup?</label>
    <select class="form-control" id="sel1" name="business_model" required>
        <option>{{ $details->business_model }}</option>
        <option value="Non-Profit">Non-Profit</option>
        <option value="For Profit">For Profit</option>
    </select>
</div>

<div class="form-group">
    <label for="product" title="Non-profit {how you are going to cover the cost}, For Profit {which condition you have} ">Describe your Business model <i class="fas fa-info-circle"></i></label>
    <textarea name="business_model_desc" maxlength="30000" class="form-control text-editor" placeholder="Non-profit {how you are going to cover the cost}, For Profit {which condition you have} " required>{!! $details->business_model_desc !!}</textarea>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6"><button type="submit"
            class="btn btn-primary w-100 stakeholder_details_btn mt-5 mb-5">Save Changes</button>
    </div>
    <div class="col-md-3"></div>
</div>


