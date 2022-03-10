@php
    use  App\Http\Controllers\UtilityController;
@endphp
<input type="hidden" name="mode" value="submit" hidden>

<div class="form-group">
    <label for="product">Product or Service Name</label>
    <input type="text" name="product_name" value="{{ $details->product_name }}" class="form-control" required>
</div>

<div class="form-group">
    <label for="product">Product or Service Description</label>
    <textarea name="description" class="form-control text-editor" required>{!! $details->description !!}</textarea>
</div>

<div class="form-group">
    <label for="sel1">What is your solution/ Product Sector:</label>
    <select class="form-control" id="sel1" name="focus_sectors_id" required>
        <option value="">..........................</option>
        @foreach (App\Models\FocusSector::where('isShared', true)->get() as $sector)
            <option value="{{ $sector->id }}">{{ $sector->sector }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="product">Physical Address</label>
    <input type="text" name="address" class="form-control" value="{{ $details->address }}" required>
</div>

<div class="form-group">
    <label for="product">Postal Code <small><a target="_blank" href="https://address.tcra.go.tz/postcode/Home/Home.do">Check postal code</a></small></label>
    <input type="text" name="postal_code" class="form-control"  placeholder="postal code #####" data-inputmask='"mask": "99999"' data-mask value="{{ $details->postal_code }}" required>
</div>

<div class="form-group">
    <label for="product">Your Website <small class="text-muted">optional</small></label>
    <input type="url" name="web_url" class="form-control" placeholder="www.example.co.tz" value="{{ $details->web_url }}" >
</div>

<div class="form-group">
    <label for="sel1">What is the business model of your product?</label>
    <select id="business_model" class="form-control"  id="sel1" name="business_model" required>
        <option value="{{ $details->business_model }}">{{ $details->business_model }}</option>
        <option value="Non-Profit">Non-Profit</option>
        <option value="For Profit">For Profit</option>
    </select>
</div>

<div class="form-group">
    <label for="product">Description your Business model</label>
    <textarea name="business_model_desc" maxlength="10000" class="form-control text-editor" placeholder="Non-profit {how you are going to cover the cost}, For Profit {how your product is going to genarate profit} " required>{!! $details->business_model_desc !!}</textarea>
</div>

<div class="form-group">
    <label for="product">Attach your product or service Document(PDF File) <small class="text-maroon">if don't want to change the file do not browse file</small> </label>
    <input type="file" name="file_name" class="form-control-file" required>
</div>

<div class="form-group">
    <label for="sel1">What is the financial stage of your product? </label>
    <select class="form-control" id="sel1" name="finacial_stage" required>
        <option value="{{ $details->finacial_stage }}">{{ $details->finacial_stage }}</option>
        <option value="Pre revenue stage">Pre revenue stage</option>
        <option value="Revenue stage">Revenue stage</option>
    </select>
</div>

<div class="form-group">
    <label for="sel1">What is the stage of your product/service?</label>
    <select id="product_stage" class="form-control " id="sel1"  onclick="productstage()" name="product_stage"  required>
        <option value="{{ $details->product_stage }}">{{ $details->product_stage }}</option>
        @foreach (UtilityController::product_stage() as $stage)
             <option>{{ $stage['name'] }}</option>
        @endforeach
    </select>
</div>

<div id="productStageData"></div>

