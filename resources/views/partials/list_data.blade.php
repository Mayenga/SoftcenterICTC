@if ($mode == 'listData')
    <table id="datatable" class="table table-striped table-hover">
        @if ($type == 'Developer')
            {{-- id 	users_id 	position 	level 	experience 	stack --}}
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Position</th>
                <th>Stack</th>
            </thead>
            <tbody>
                @foreach ($listData as $developer)
                    <tr>
                        <td>
                          <img width="50px" height="50px" src="{{ asset('storage/uploaded/users/' . App\Models\User::find($developer->users_id)->profile_image) }}" alt="image" class="img-circle img-fluid">
                        </td>
                        <td>{{ App\Models\User::find($developer->users_id)->name ?? '' }}</td>
                        <td>
                            {{ App\Models\User::find($developer->users_id)->phone ?? '' }} <br>
                            {{ App\Models\User::find($developer->users_id)->email ?? '' }}
                        </td>
                        <td>{{ $developer->position }}</td>
                        <td>{{ $developer->stack }}</td>
                    </tr>
                @endforeach
            </tbody>
        @endif

        @if ($type == 'Startups')
            {{-- id 	users_id 	product_name 	description 	focus_sectors_id 	address 	postal_code --}}
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Focus Sectors</th>
            </thead>
            <tbody>
                @foreach ($listData as $startup)
                    @php
                        $focusSectorIds = App\Models\StartupProduct::where('users_id', $startup->id)->pluck('focus_sectors_id') ?? [];
                        $FocusSector = App\Models\FocusSector::whereIn('id', $focusSectorIds)->pluck('sector') ?? ["not yet provided"];
                    @endphp
                    <tr>
                        <td>
                            <img width="50px" height="50px" src="{{ asset('storage/uploaded/users/' . $startup->profile_image) }}" class="img-circle" alt="image" srcset="">
                        </td>
                        <td>{{ $startup->name  }}</td>
                        <td>
                            {{ $startup->phone  }} <br>
                            {{ $startup->email }}
                        </td>
                        <td>{{ implode(", ",json_decode($FocusSector)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        @endif

        @if ($type == 'Incubators' || $type == 'Accelerators')
            {{-- id 	users_id 	product_name 	description 	focus_sectors_id 	address 	postal_code --}}
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Focus Sectors</th>
            </thead>
            <tbody>
                @foreach ($listData as $stakeHolder)
                    @php
                        $FocusSector = App\Models\FocusSector::whereIn('id', explode(',',$stakeHolder->focus_sectors_id))->pluck('sector');
                    @endphp
                    <tr>
                        <td>
                            <img src="{{ asset('storage/uploaded/users/' . App\Models\User::find($stakeHolder->users_id)->profile_image) }}" width="50px" height="50px" class="img-circle" alt="image" srcset="">
                        </td>
                        <td>{{ App\Models\User::find($stakeHolder->users_id)->name ?? '' }}</td>
                        <td>
                            {{ App\Models\User::find($stakeHolder->users_id)->phone ?? '' }} <br>
                            {{ App\Models\User::find($stakeHolder->users_id)->email ?? '' }}
                        </td>
                        <td>{{ implode(", ", json_decode($FocusSector)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        @endif
    </table>
@endif
