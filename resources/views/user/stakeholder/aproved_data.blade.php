<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" value="{{ $details->email }}" class="form-control"
        disabled>
</div>
<div class="form-group">
    <label for="email">Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ $details->phone }}" data-mask disabled>
</div>

<div class="form-group">
    <label for="product">Name of Organization</label>
    <input type="text" name="org_name" value="{{ $details->org_name }}" class="form-control disabled" disabled>
</div> 


<div class="form-group">
    <label for="Staffs">Number of Staffs</label>
    <input type="number" min="1" value="{{ $details->number_of_staffs }}" name="number_of_staffs" class="form-control" disabled>
</div>
<div class="form-group">
    <label for="Staffs">Founders Name</label>
    <div class="table-responsive">
        <table class="table table-bordered" id="dynamic_field">
            <tr>
                @foreach (App\Models\foundersDetail::where('stake_holders_details_id',$details->id)->get() as $founder)
                    <td><input type="text" value="{{ $founder->name }}"  placeholder="Enter Founder Name"
                        class="form-control name_list" disabled /></td>
                @endforeach
            </tr>
        </table>
    </div>
</div>
<div class="form-group">
    <label for="sel1">Status:</label>
    <select class="form-control" id="sel1" name="isRegistered" disabled>
        @if ($details->isRegistered)
           <option value="1">Registered</option>
        @else
           <option value="0">Non-Registered</option>
        @endif
    </select>
</div>

<div class="form-group">
    <label for="product">When you Established your Organization ?</label>
    <input type="text" name="est_year" class="form-control" value="{{ $details->est_year }}" disabled>
</div>
<div class="form-group">
    <label for="product">Where is your organization/ Office based?</label>
    <input type="text" value="{{ $details->org_based }}" name="org_based"  class="form-control" disabled>
</div>

<div class="form-group">
    <label for="sel1">Preferred Startup Stage</label>
    <select class="form-control" id="sel1" name="pref_startup_stage" disabled>
        <option>{{ $details->pref_startup_stage }}</option>
    </select>
</div>

<div class="form-group">
    <label for="product">Source of Funds</label>
    <textarea name="source_funds" class="form-control text-editor" disabled>{{ $details->source_funds }}</textarea>
</div>

<div class="form-group">
    <label for="sel1">Focus Sector:</label>
    <select class="form-control" id="sel1" name="focus_sectors_id" disabled>
        <option value="{{$details->focus_sectors_id}}">{{ App\Models\FocusSector::find($details->focus_sectors_id)->sector ?? null }}</option>
    </select>
</div>

<div class="form-group">
    <label for="sel1">What is the business model of your organization?</label>
    <select class="form-control" id="sel1" name="business_model" disabled>
        <option>{{ $details->business_model }}</option>
    </select>
</div>
<div class="form-group">
    <label for="sel1">What is the financial stage of your organization? </label>
    <select class="form-control" id="sel1" name="financial_stage" disabled>
        <option>{{ $details->financial_stage }}</option>
    </select>
</div>
