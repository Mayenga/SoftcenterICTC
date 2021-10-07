@if ($mode == 'productStage')
    @if ($needIncubation)
        <p>Do you have Incubator ?</p>
        <input type="hidden" name="product_cat" value="Pre Mature">
        <div class="form-check-inline">
            <label class="form-check-label" onclick="hasStakeholder('Incubator','{{ $id }}',1)">
                <input dataValue="1" type="radio" class="form-check-input hasStakeholder" value="1"
                    name="hasStakeholder">Yes
            </label>
        </div>
        <div class="form-check-inline" onclick="hasStakeholder('Incubator','{{ $id }}',0)">
            <label class="form-check-label">
                <input dataValue="0" type="radio" class="form-check-input hasStakeholder" value="0"
                    name="hasStakeholder">No
            </label>
        </div>
    @endif

    @if ($needAccelerator)
        <p>Do you have Accelerator ?</p>
        <input type="hidden" name="product_cat" value="Matured">
        <div class="form-check-inline">
            <label class="form-check-label" onclick="hasStakeholder('Accelerator','{{ $id }}',1)">
                <input dataValue="1" type="radio" class="form-check-input hasStakeholder" value="1"
                    name="hasStakeholder">Yes
            </label>
        </div>
        <div class="form-check-inline" onclick="hasStakeholder('Accelerator','{{ $id }}',0)">
            <label class="form-check-label">
                <input dataValue="0" type="radio" class="form-check-input hasStakeholder" value="0"
                    name="hasStakeholder">No
            </label>
        </div>
    @endif

    <div id="checkStakeHolder"></div>
@endif

@if ($mode == 'checkStakeHolder')
    @if ($hasStakeholder)
         <h5 class="text-muted">Please select the name of your {{ $stage }} if not listed then select <i>Not listed and write the name of your {{ $stage }}</i></h5>
        <div class="form-group">
            <label for="sel1">Choose  {{ $stage }}:</label>
            <select id="stakeholderList" name="stake_holders_details_id" class="form-control"  required>
                <option value="">..........................</option>
                @foreach ($data as $stakeHolder)
                  <option value="{{ $stakeHolder->id }}">{{ $stakeHolder->org_name }}</option>
                @endforeach
                <option>Not listed</option>
            </select>
        </div>

        <div id="notListed" class="form-group d-none">
            <label for="product">{{ $stage }} Name</label>
            <input type="text" name="stakeholder_name" class="form-control" >
        </div>
    {{-- @else
        <div class="form-group">
            <label for="sel1">Request  {{ $stage }}:</label>
            <select id="stakeholderList" class="form-control select2bs4" id="sel1" name="stake_holders_details_id" required>
                <option value="">..........................</option>
                @foreach ($data as $stakeHolder)
                  <option value="{{ $stakeHolder->id }}">{{ $stakeHolder->org_name }}</option>
                @endforeach
            </select>
        </div> --}}
    @endif

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6"><button type="submit"
                class="btn btn-primary w-100 startup_details_btn mt-5 mb-5">Submit Form</button>
        </div>
        <div class="col-md-3"></div>
    </div>
@endif

{{-- @if ($mode == '')

@endif --}}
