@php
use App\Http\Controllers\UtilityController;
@endphp
<form id="startup_details_form" action="save_startup_details" method="post">
    @csrf

    <input type="hidden" name="mode" value="submit" hidden>

    <div class="form-group">
        <label for="product">Product or Service Name</label>
        <input type="text" name="product_name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="product">Product or Service Description</label>
        <textarea name="description" class="form-control text-editor" required></textarea>
    </div>

    <div class="form-group">
        <label for="sel1">Choose Ownership:</label>
        <select id="ownership" onclick="checkOwnershipData()" class="form-control" id="sel1" name="ownership" required>
            <option value="">..........................</option>
            <option>Individual</option>
            <option>Organization</option>
        </select>
    </div>

    <div id="ownershipData"></div>

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
        <input type="text" name="address" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="product">Postal Code <small><a target="_blank"
                    href="https://address.tcra.go.tz/postcode/Home/Home.do">Check postal code</a></small></label>
        <input type="text" name="postal_code" class="form-control" placeholder="postal code #####"
            data-inputmask='"mask": "99999"' data-mask required>
    </div>

    <div class="form-group">
        <label for="product">Your Website <small class="text-muted">optional</small></label>
        <input type="url" name="web_url" class="form-control" placeholder="http://www.example.co.tz">
    </div>

    <div class="form-group">
        <label for="sel1">What is the business model of your product?</label>
        <select id="business_model" class="form-control" id="sel1" name="business_model" required>
            <option value="">..........................</option>
            <option value="Non-Profit">Non-Profit</option>
            <option value="For Profit">For Profit</option>
        </select>
    </div>

    <div class="form-group">
        <label for="product">Description your Business model</label>
        <textarea name="business_model_desc" maxlength="10000" class="form-control"
            placeholder="Non-profit {how you are going to cover the cost}, For Profit {how your product is going to genarate profit} "
            required></textarea>
    </div>

    {{-- <div class="form-group">
        <label for="product">Attach your product or service Document(PDF File) </label>
        <input type="file" name="file_name" class="form-control-file" >
    </div> --}}

    <div class="form-group">
        <label for="sel1">What is the financial stage of your product? </label>
        <select class="form-control" id="sel1" name="finacial_stage" required>
            <option value="">..........................</option>
            <option value="Pre revenue stage">Pre revenue stage</option>
            <option value="Revenue stage">Revenue stage</option>
        </select>
    </div>

    <div class="form-group">
        <label for="sel1">What is the stage of your product/service?</label>
        <select id="product_stage" class="form-control " id="sel1" onclick="productstage()" name="product_stage"
            required>
            <option value="">..........................</option>
            @foreach (UtilityController::product_stage() as $stage)
                <option>{{ $stage['name'] }}</option>
            @endforeach
        </select>
    </div>

    <div id="productStageData"></div>


</form>

<script>
    $("#startup_details_form")[0].reset();
</script>
