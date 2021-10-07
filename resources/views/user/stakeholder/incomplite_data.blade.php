<input type="hidden" name="mode" value="submit" hidden>

<div class="form-group">
    <label for="product">Name of Organization</label>
    <input type="text" name="org_name" class="form-control" required>
</div>

<div class="form-group">
    <label for="product">Name of parent Organization </label>
    <input type="text" name="parent_name" class="form-control" required>
</div>


<div class="form-group">
    <label for="product">When you Established your Organization ?</label>
    <input type="text" name="est_year" class="form-control" data-inputmask-alias="datetime"
        data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
</div>

<div class="form-group">
    <label for="sel1">Status:</label>
    <select class="form-control" id="sel1" name="isRegistered" required>
        <option value="1">Registered</option>
    </select>
</div>

<div class="form-group">
    <label for="Staffs">Number of Staffs</label>
    <input type="number" min="1" name="number_of_staffs" class="form-control"  required>
</div>

<div class="form-group">
    <label for="Staffs">Founders Details</label>
    <div class="table-responsive">
        <table class="table table-bordered" id="dynamic_field">
            <tr>
                <td>
                    <input type="text" name="founder_name[]" placeholder="Enter Founder Name"
                        class="form-control name_list" required="" />
                </td>
                <td><input type="text" name="founder_phone[]" placeholder="Enter Founder Phone" class="form-control name_list" required="" /></td>
                <td><select class="form-control" id="sel1" name="founder_gender[]" required><option value="">select founder gender</option><option value="Male">Male</option><option value="Female">Female</option> </select></td>
                <td><button type="button" name="add" id="add_another" class="btn btn-success">Add Another</button></td>
            </tr>
        </table>
    </div>
</div>



<div class="form-group">
    <label for="product">Physical Address</label>
    <input type="text" name="address" class="form-control" required>
</div>
<div class="form-group">
    <label for="product">Postal Code <small><a target="_blank" href="https://address.tcra.go.tz/postcode/Home/Home.do">Check postal code</a></small></label>
    <input type="text" name="postal_code" class="form-control" placeholder="postal code #####" data-inputmask='"mask": "99999"' data-mask required>
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
    <input type="number" min="1" name="max_startup" class="form-control" placeholder="how many startup you can handle" required>
</div>

<div class="form-group">
    <label for="sel1">Preferred Startup Stage</label>
    <select class="select2bs4Theme1"  name="pref_startup_stage[]" multiple="multiple"  style="width: 100%;" required>
        @if ($role == "Incubator")
            <option value="Ideation Stage">Ideation Stage</option>
            <option value="Prototype Stage">Prototype Stage</option>
        @endif
        @if ($role == "Accelerator")
            <option value="Growth Stage">Growth Stage</option>
            <option value="Scaling Stage">Scaling Stage</option>
        @endif
    
    </select>
</div>

<div class="form-group">
    <label for="product">Source of Funds</label>
    <textarea name="source_funds" class="form-control text-editor" maxlength="30000" required></textarea>
</div>

<div class="form-group">
    <label for="sel1">Focus Sector:</label>
    <select class="select2bs4Theme1"  multiple="multiple" data-placeholder="Select a Focus Sector"  name="focus_sectors_id[]" style="width: 100%;" required>
        @foreach (App\Models\FocusSector::where('isShared', true)->get() as $sector)
            <option value="{{ $sector->id }}">{{ $sector->sector }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="sel1">Service you provide:</label>
    <select  class="select2bs4Theme1"  multiple="multiple" data-placeholder="Select service you provide" name="service_provided[]" style="width: 100%;" required>
       <option value="">........................</option>
       <option>Coaching</option>
       <option>Value Addition</option>
       <option>Skill Development</option>
       <option>Application Development</option>
       <option>IT Consulting</option>
       <option>IT Management</option>
       <option>Project Management</option>
       <option>Branding, Digital Marketing</option>
       <option>Research</option>
       <option>Others</option>
    </select>
</div>


<div class="form-group">
    <label for="sel1">Program duration:</label>
    <select class="select2bs4Theme1"  multiple="multiple" data-placeholder="Select program duration"  name="program_duration[]" style="width: 100%;" required>
        <option>Three Month</option>
        <option>Six Month</option>
        <option>One year</option>
        <option>More than a year</option>
    </select>
</div>

<div class="form-group">
    <label for="sel1">What is the business model you preffer from startup?</label>
    <select class="form-control" id="sel1" name="business_model" required>
        <option value="">..........................</option>
        <option value="Non-Profit">Non-Profit</option>
        <option value="For Profit">For Profit</option>
    </select>
</div>

<div class="form-group">
    <label for="product" title="Non-profit {how you are going to cover the cost}, For Profit {which condition you have} ">Describe your Business model <i class="fas fa-info-circle"></i></label>
    <textarea name="business_model_desc" maxlength="30000" class="form-control text-editor" placeholder="Non-profit {how you are going to cover the cost}, For Profit {which condition you have} " required></textarea>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6"><button type="submit"
            class="btn btn-primary w-100 stakeholder_details_btn mt-5 mb-5">Submit Form</button>
    </div>
    <div class="col-md-3"></div>
</div>


