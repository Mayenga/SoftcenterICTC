@php
    use  App\Http\Controllers\UtilityController;
@endphp

<div class="form-group">
    <label for="product">When you Established your Organization</label>
    <input type="date"  name="est_year" class="form-control"  required>
</div>

<div class="form-group">
    <label for="sel1">Status:</label>
    <select class="form-control" id="sel1" name="isRegistered" required>
        <option value="1">Registered</option>
    </select>
</div>

<div class="form-group">
    <label for="Staffs">Number of Staffs</label>
    <input type="number" min="1" name="number_of_staffs" class="form-control" required>
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


