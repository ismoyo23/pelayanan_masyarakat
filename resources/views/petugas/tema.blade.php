<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ url('tema_utama/theme/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('tema_utama/theme/datatables/datatables.min.css') }}" />
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="{{ url('tema_utama/theme/bootstrap//font-awesome/css/font-awesome.min.css') }}">
</head>

<style>
    body {
        background-color: rgb(226, 226, 226);
    }

    .nav-link {
        color: purple;
        margin-left: 20px;

    }

    .nav-link:hover::after {
        content: '';
        display: block;
        border-bottom: 2px solid purple;
        padding-bottom: 5px;
        width: 43px;
        margin: auto;
        margin-bottom: -8px;
    }

    .myCalendar .month-head>div,
    .myCalendar .month-head>button {
        padding: 15px;
    }

    @media (max-width: 992px) {
        .dropdown{
            display: none;
        }
     }

     @media (min-width: 992px) { 
        .logout{
            display: none;
        }
      }
</style>

<body>



    <nav style="background-color: purple;" class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand center-android" href="#" style="color: white; font-family: Century Gothic;">Petugas</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown">
                        <a style="color: white; text-decoration: none;" class="dropdown-toggle" href="#"
                            id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                             <span style="color: white;">{{ auth()->user()->nm_petugas }}</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item " href="{{ url('/admin/logout') }}">Logout</a>
                            
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-item nav-link menu" style="color: purple;" href="LaporanMasuk"> <span
                            class="fa fa-fw fa-send-o" ></span> Laporan Masuk</a>
      </li>
      <li class="nav-item active">
        <a class="nav-item nav-link menu" style="color: purple;" href="PermasalahanTuntas"> <span
                            class="fa fa-book"></span>Permasalahan Tuntas</a>
      </li>
      <li class="nav-item active logout">
                <a class="nav-item nav-link" style="color: purple;" href="{{ url('/admin/logout') }}" id="petugas"> <span
                                    class="fa fa-fw fa-sign-out"></span> logout</a>
        </li>         
  </div>
  </div>
</nav>


 <div class="container">
   <div id="body" style="margin-top: 30px;"></div>
    
    </div>
</div>

    <br><br><br>
    <footer class="bottom row footer-bg-black">
        <div class="container col-xs-12">
            <hr style="width: 100%;">
            <div align="center">
                <p class="grey-color">Copyright By: M Ismoyo Setyonowidagdo</p>
            </div>
        </div>
    </footer>

</body>

<script type="text/javascript" src="{{url('tema_utama/theme/jquery.js')}}"></script>
<script type="text/javascript" src="{{ url('tema_utama/theme/bootstrap/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ url('tema_utama/theme/datatables/datatables.min.js') }}"></script>
<script>
    

    $('#body').load('/petugas/utama')
    $('.menu').on('click', function(e){
        var menu = $(this).attr('href')
        if (menu == 'LaporanMasuk') {
            $('#body').load('/petugas/utama')
        }else if (menu == 'PermasalahanTuntas') {
            $('#body').load('/petugas/PermasalahanTuntas')
        }
        e.preventDefault();
    })

   
</script>




</html>
