<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ url('tema_utama/theme/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
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
            <a class="navbar-brand center-android" href="#" style="color: white; font-family: Century Gothic;">Admin</a>

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
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="container">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-item nav-link menu" id="dashboard" style="color: purple;" href="#"> <span
                                    class="fa fa-fw fa-tachometer" ></span> Dashboard</a>
              </li>

              <li class="nav-item active">
                <a class="nav-item nav-link menu" style="color: purple;" href="#" id="laporan"> <span
                                    class="fa fa-fw fa-print"></span>Cetak Laporan</a>
              </li>

              <li class="nav-item active">
                <a class="nav-item nav-link menu" style="color: purple;" href="#" id="petugas"> <span
                                    class="fa fa-fw fa-user"></span> Person</a>
              </li>

              <li class="nav-item active logout">
                <a class="nav-item nav-link" style="color: purple;" href="{{ url('/admin/logout') }}" id="petugas"> <span
                                    class="fa fa-fw fa-sign-out"></span> logout</a>
              </li>
            </ul>
            </div>
          </div>
</nav>
    
   <div id="body"></div>
    
<!-- card lihat -->

    </div>
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
<script src="{{ url('tema_utama/theme/responsive-nao-calendar/jquery-nao-calendar.js') }}"></script>
<script src="{{ url('tema_utama/theme/responsive-nao-calendar/jquery-pseudo-ripple.js') }}"></script>
<script src="{{ url('tema_utama/theme/bootstrap/admin.js') }}"></script>




</html>
