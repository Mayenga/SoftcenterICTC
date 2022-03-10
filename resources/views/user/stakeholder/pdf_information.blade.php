<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ Auth::user()->name }} Document</title>
    @php
        $userRole = App\Models\userRole::where('users_id',Auth::user()->id)->first();
        $role = App\Models\Role::find($userRole->roles_id)->name;
        $isApproved = App\Models\stakeHoldersDetail::where('users_id',Auth::user()->id)->first()->isApproved;
    @endphp
    <style>
         .page-break {
            page-break-after: always;
        }

        .title{
            margin: 0;
        }


        @page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 2cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;


                /** Extra personal styles **/
                background-color: #007bff;
                color: white;
                text-align: center;
                line-height: 0.5cm;
            }

            header p{
                font-size: 12px;
            }

            /** Define the footer rules **/
            footer {
                position: fixed;
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;

                /** Extra personal styles **/
                background-color: #007bff;
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }
    </style>
</head>
<body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <p class="title">SoftCenter</p>
            <p class="title">{{ $role }} Document</p>             
            <p class="title">{{ $org_name }}</p>             
      </header>

      <footer>
          <p>
              @if ($isApproved)
                  <small><span class="text-muted">Approved By <b>Softcenter</b></span></small>
              @else
                  <small><span class="text-muted">Not yet Approved by <b>Softcenter</b> </span></small>
              @endif
              Signature  ............................................
          </p>
          SoftCenter &copy; <?php echo date("Y");?>
      </footer>

      <!-- Wrap the content of your PDF inside a main tag -->
      <main>
        <b>Organization / Company Name</b>
        <p>{{ $org_name }}</p>
        <hr>
        <b>Parent</b>
        <p>{{ $parent_name }}</p>
        <hr>
        <b>Established</b>
        <p>{{ $est_year }}</p>
        Address: <b>{{ $address }}</b><br>
        PostalCode: <b>{{ $postal_code }}</b><br>
        Maximum Startup: <b>{{ $max_startup }}</b>
        <hr>
        <b>Source of Fund</b>
        <p>{!! $source_funds !!}</p>
        <hr>
        <b>Program Durations</b>
        <p>{{ $program_duration }}</p>
        <hr>
        <b>Service Provided</b>
        <p>{{ $service_provided }}</p>
        <hr>
        <b>Business Modal Description <small class="text-muted">{{ $business_model }}</small></b>
        <p>{!! $business_model_desc !!}</p>
        <hr>
      </main>
</body>
</html>