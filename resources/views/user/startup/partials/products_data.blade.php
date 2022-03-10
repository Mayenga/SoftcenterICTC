<table id="datatable" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Focus Sector</th>
            <th>Business Modal</th>
            <th>Product Stage</th>
            <th>Finatial Stage</th>
            <th>status</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($details as $product)
            @php
                if ($product->product_cat == "Matured") {
                    $stakeHolder = "Accelerator";
                    $isNow = "Acceleration";
                } else {
                    $stakeHolder = "Incubator";
                    $isNow = "Incubation";
                }

            @endphp
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ App\Models\FocusSector::find($product->focus_sectors_id)->sector ?? null }}</td>
                <td>{!! $product->business_model !!}</td>
                <td>{{ $product->product_stage }}</td>
                <td>{{ $product->finacial_stage }}</td>
                <td>
                    @if ($product->isApproved)
                        @if ($product->isStakeHolderApproved)
                            is in {{ $isNow }} stage
                        @else
                            waiting for {{ $stakeHolder }}
                        @endif
                    @else
                       <span class="badge badge-info">pending</span>
                    @endif
                </td>
                <td>
                    <a href="view_product?product_path={{ Crypt::encrypt($product->id) }}" class="btn btn-sm btn-primary">View</a>
                    @if (!$product->isApproved)
                        <button onclick="dataManage({{ $product->id }},'remove_product','startup_manage')" class="btn btn-sm btn-danger">Remove</button>
                    @endif
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
