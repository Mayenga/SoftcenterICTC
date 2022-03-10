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
                /* background-color: #007bff;
                color: white;
                text-align: center;
                line-height: 0.5cm; */
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
                /* background-color: #007bff;
                color: white;
                text-align: center;
                line-height: 1.5cm; */
            }
    </style>
</head>
<body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <p class="title">SoftCenter</p>
            <p class="title">{{ $role }} Document</p>             
            <p class="title">{{ $service }}</p>             
      </header>

      <footer>
          <p>Signature  ............................................</p>
          SoftCenter &copy; <?php echo date("Y");?>
      </footer>

      <!-- Wrap the content of your PDF inside a main tag -->
      <main>
         
      </main>
</body>
</html>