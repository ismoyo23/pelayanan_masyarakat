<html id="home">

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ url('tema_utama/theme/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link href="{{ url('tema_utama/theme/bootstrap/select2/select2.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('tema_utama/theme/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="theme/bootstrap//font-awesome/css/font-awesome.min.css">
    </head>
    <!-- Modal lihat laporan-->
    <body>
    <!-- alert-->

    <!-- akir alert -->
    <!-- navbar hitam -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-black-3 height-45px "
        style="border-bottom: 1px solid black;">
        <div class="container">
        <a class="navbar-brand color-white font-cursive" href="#"> <span class="fa fa-fw fa-paper-plane-o"></span>
            Aplikasi Pengaduan Masyarakat</a>
        <button style="color: white;" class="navbar-toggler color-white" type="button" data-toggle="collapse"
            data-target="#navbarku" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarku">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item hidden-deskop">
                <a class="nav-link color-white hover-aqua page-scroll" href="#user-guide"> <span
                    class="fa fa-fw fa-tachometer"></span>
                Dashboard</a>
            </li>

            <li class="nav-item hidden-deskop">
                <a class="nav-link color-white hover-aqua" href="login.html"> <span class="fa fa-fw fa-comment-o"></span>
                Coment</a>
            </li>
            <li class="nav-item hidden-deskop">
                <a class="nav-link color-white hover-aqua" href="login.html"> <span class="fa fa-fw fa-users"></span>
                About</a>
            </li>
            <li class="nav-item hidden-deskop">
                <a class="nav-link color-white hover-aqua" href="login.html"> <span class="fa fa-fw fa-book"></span> User
                Guide</a>
            </li>
            <li class="nav-item">
                <a class="nav-link color-white" href="{{ url('/login') }}"><span class="fa fa-fw fa-sign-out"></span>Login</a>
            </li>

            </ul>
        </div>
        </div>
       
    </nav>
    <!-- akir navbar hitam -->

    <!-- navbar biru -->
    <nav class="navbar navbar-expand-lg navbar-light height-82px hidden-android margin-top-45px"
        style="background-color: #072e49; border-bottom: 4px solid #0094ff;">

        <div class="container">
        <ul class="nav nav-pills mb-3" style="margin-top: 15px;" id="pills-tab" role="tablist">

            <li class="nav-item">
            <a style="border: 2px solid black; height: 79px; width: 90px;" class="btn color-white hover-aqua dashboard  menu page-scroll"
                href="#home"><span class="fa fa-fw fa-tachometer" style="font-size: 33px;"></span> <span
                style="font-size: 14px;">Dashboard</span> </a>
            </li>

            <li class="nav-item">
            <a style="border: 2px solid black; height: 79px; width: 101px;" class="btn color-white hover-aqua komentar menu"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#komen">
                <!-- notifikasi -->
                <div>
                <span class="btn btn-danger"
                    style="font-size: 14px; position: absolute; margin-top: -8px; margin-left: 19px; width: 30px; height: 30px;">0</span>
                </div>

                <span class="fa fa-fw fa-comment-o" style="font-size: 33px;"> </span> <span
                style="font-size: 14px;">Coment</span>
            </a>

            <!-- dropdown -->
            <div style="margin-left: 209px; width: 220px; height: 200px;" class="dropdown-menu scroll">
                <ul class="list-group" >
                    <div class="komentar-admin"></div>
                </ul>
            </div>
            </li>



            <li class="nav-item">
            <a style="border: 2px solid black; height: 79px; width: 90px;" class="btn color-white hover-aqua" href="">
                <!-- notifikasi -->

                <span class="fa fa-fw fa-users" style="font-size: 33px;"></span> <span style="font-size: 14px;">
                About</span>
            </a>
            </li>

            <li class="nav-item">
            <a style="border: 2px solid black; height: 79px; width: 101px;" class="btn color-white hover-aqua user-guide page-scroll"
                href="#user-guide"><span class="fa fa-fw fa-book" style="font-size: 33px;"></span> <span
                style="font-size: 14px;">User
                Guide</span> </a>
            </li>
        </ul>
        </div>
        </div>
    </nav>
    <!-- akir navbar biru -->

    <!-- side bar hidden  ketika versi android  -->
    <div id="side-bar" class="card mr-auto hidden-android 
    " style="height: 19rem; width: 101px; position: absolute; background-color: #072e49; position: fixed;">

        <a href="#home" class="btn hover-aqua dashboard page-scroll menu"
        style="border: 2px solid black; height: 79px; width: 101px; position: absulute; color: white;"><span
            class="fa fa-fw fa-tachometer dashboard" style="font-size: 33px;"></span> <span style="font-size: 14px;">Dashboard</span>
        </a>

        <a href="" class="btn hover-aqua color-white"
        style="border: 2px solid black; height: 79px; width: 101px; position: absulute;"><span
            class="fa fa-fw fa-comment-o" style="font-size: 33px;">
            <div>
            <span class="btn btn-danger"
                style="font-size: 14px; position: absolute; margin-top: -40px; margin-left: 19px; width: 30px; height: 30px;">0</span>
            </div>
        </span> <span style="font-size: 14px;">Coment</span>
        </a>

        <a href="" class="btn btn hover-aqua color-white"
        style="border: 2px solid black; height: 79px; width: 101px; position: absulute;">


        <span class="fa fa-fw fa-users" style="font-size: 33px;"></span> <span style="font-size: 14px;">About</span>
        </a>

        <a href="#user-guide" class="btn btn hover-aqua color-white user-guide menu page-scroll"
        style="border: 2px solid black; height: 79px; width: 101px; position: absulute;"><span class="fa fa-fw fa-book"
            style="font-size: 33px;"></span> <span style="font-size: 14px;">User Guide</span>
        </a>

    </div>
    <!-- akir side bar ketika di hidden -->


    <div class="container">
        <div class="row">


        <!-- bagian from pelaporan  -->
        <div class="margin-top-40px col-md-12 width-40px margin-top--80px " style="margin-bottom: 90px;">
            <div class="card shadow-lg p-3 mb-5" style="border-top: 5px solid aqua;">
            <div class="card-body">
                
                <div class="container">
                    <div class="form-group">

                    <div class="row">
                        <div class="col-md-6">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                            <a class="nav-link" id="task-ku" href="#">My report</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="task-lamaku" href="#">Long report</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="semua-task" href="#">All report</a>
                            </li>

                        </ul>

                        <!-- task ku -->
                        <ul class="list-group task-ku scroll" style="height: 280px">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p>silahkan login terlebih dahulu</p>
                                </li>

                        </ul>

                        <!-- list task ku -->
                        <ul class="list-group task-lamaku scroll" style="height: 280px">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p>silahkan login terlebih dahulu</p>
                                </li>
                        </ul>
                        <!-- list ku -->

                        <!-- list semua task -->
                        <ul class="list-group semua-task scroll" style="height: 280px">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                      <p>silahkan login terlebih dahulu</p>
                                </li>


                                
                        </ul>
                        <!-- semua task -->
                        </div>

                        <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                        <form method="post" action="{{ url('/home/kirim_laporan') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group mr-top-android-20px">
                       
                            <textarea name="isi_laporan" class="form-control @error('isi_laporan')is-invalid @enderror" id="exampleFormControlTextarea1"
                                style="height: 200px; margin-bottom: 30px;" placeholder="Masukkan Laporan"></textarea>
                            <select name="subjek" style="width: 100%;" class="form-control select2">
                                <option>Corona virus</option>
                                <option>Banjir</option>
                            </select>
                            <hr>
                            <!-- upload lampiran -->
                            <input type="file" name="gambar" class="btn btn-info" id="upload"/>
                            <!-- akir upload lampiran -->
                            <div class="row">
                                <div class="col-md-6" style="margin-top: 9px;">
                                <a href="" id="lampiran" style="text-decoration: none; color: black;"><span
                                    class="fa fa-fw fa-chain"></span>Lampiran gambar</a>

                                <a href="#" id="close" style="text-decoration: none; color: black;"><span
                                    class="fa fa-fw fa-chain"></span>Close</a>
                                </div>
                                <div class="col-md-6" style="margin-bottom: -40px;">
                                <input type="submit" style="background-color: red; color: white; margin-top: 9px;"
                                    class="btn margin-left-140px" value="LAPOR !">
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    </div>
                </div>
                
            </div>
            <!-- Button trigger modal -->

            </div>

        </div>
        </div>


    </div>


    <section class="container margin-left-200px" id="user-guide">
        <div class="row kartu-petunjuk">
        <div class="col-md-2">
            <div class="shadow-lg p-3 mb-5 bg-white rounded text-center height-deskop-280px">
            <h4 style="font-size: 30px;"><span class="fa fa-fw fa-pencil"></span></h4>
            <h5 style="font-size: 20px;">Masukkan Laporan</h5>
            <p style="font-size: 15px;">Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
            </div>
        </div>

        <div class="col-md-2">
            <div class="shadow-lg p-3 mb-5 bg-white rounded text-center height-deskop-280px">
            <h4 style="font-size: 30px;"><span class="fa fa-fw fa-share"></span></h4>
            <h5 style="font-size: 20px;">Proses Verifikasi</h5>
            <p style="font-size: 15px;">Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada instansi
                berwenang</p>
            </div>
        </div>

        <div class="col-md-2">
            <div class="shadow-lg p-3 mb-5 bg-white rounded text-center margin-left-280px height-deskop-280px">
            <h4 style="font-size: 30px;"><span class="fa fa-fw fa-comments"></span></h4>
            <h5 style="font-size: 20px;">Tindakan Lanjut</h5>
            <p style="font-size: 15px;">Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda</p>
            </div>
        </div>

        <div class="col-md-2">
            <div class="shadow-lg p-3 mb-5 bg-white rounded text-center height-deskop-280px">
            <h4 style="font-size: 30px;"><span class="fa fa-fw fa-commenting-o"></span></h4>
            <h5 style="font-size: 20px;">Beri Tanggapan</h5>
            <p style="font-size: 15px;">Anda dapat menanggapi kembali balasan yang diberikan oleh instansi dalam waktu 10
                hari</p>
            </div>
        </div>

        <div class="col-md-2">
            <div class="shadow-lg p-3 mb-5 bg-white rounded text-center height-deskop-280px">
            <h4 style="font-size: 30px;"><span class="fa fa-fw fa-check-square"></span></h4>
            <h5 style="font-size: 20px;">Selesai</h5>
            <p style="font-size: 15px;">Laporan Anda akan terus ditindaklanjuti hingga terselesaikan</p>
            </div>
        </div>
        </div>
    </section>

    <br><br><br>
    <footer class="row" style="background-color:rgb(27, 26, 26); height: 45px;">
        <div class="container col-xs-12" style="margin-top: 8px; margin-bottom: 0;">

        <p style="color: white;">Design Made By: M Ismoyo Setyonowidagdo</p>

        </div>
    </footer>

</body>

<script src="{{ url('tema_utama/theme/jquery.js') }}"></script>

<script type="text/javascript" src="{{ url('tema_utama/theme/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ url('tema_utama/theme/bootstrap/select2/select2.js') }}"></script>
<script src="{{ url('sweetalert.js') }}"></script>
<script>

      // task menu
    $('.task-ku').show();
    $('.task-lamaku').hide();
    $('.semua-task').hide();

    

    $('#task-ku').on('click', function (e) {
        $('#task-lamaku').removeClass('active');
        $('#semua-task').removeClass('active');
        $('#task-ku').addClass('active');
        $('.task-lamaku').hide();
        $('.semua-task').hide();
        $('.task-ku').show();

        e.preventDefault();
    })

    $('#task-lamaku').on('click', function (e) {
        $('#task-lamaku').addClass('active');
        $('#semua-task').removeClass('active');
        $('#task-ku').removeClass('active');
        $('.task-lamaku').show();
        $('.semua-task').hide();
        $('.task-ku').hide();

        e.preventDefault();
    })

    $('#semua-task').on('click', function (e) {
        $('#task-lamaku').removeClass('active');
        $('#semua-task').addClass('active');
        $('#task-ku').removeClass('active');
        $('.task-lamaku').hide();
        $('.semua-task').show();
        $('.task-ku').hide();

        e.preventDefault();
    })

    $('.dashboard').addClass('menu-active')
    $('.menu').on('click', function(){
        var menu = $(this).attr('href');
        if(menu == '#home'){
          $('#side-bar').hide();
            $('.dashboard').addClass('menu-active')
            $('.user-guide').removeClass('menu-active')
            $('.komentar').removeClass('menu-active')
        }else if(menu == "#user-guide"){
          $('#side-bar').fadeOut();
           $('.dashboard').removeClass('menu-active')
            $('.user-guide').addClass('menu-active') 
            $('.komentar').removeClass('menu-active')
        }else if(menu == "#komen"){
           $('.dashboard').removeClass('menu-active')
            $('.user-guide').removeClass('menu-active') 
            $('.komentar').addClass('menu-active') 
            
        }

    })

    $('#side-bar').hide();

    $('.select2').select2()

    $('#close').hide();
    $('#upload').hide();
    $('#lampiran').click(function (e) {
        $('#upload').show();
        $('#lampiran').hide();
        $('#close').show();

        e.preventDefault();
    })

    $('#close').click(function (e) {
        $('#upload').hide();
        $('#lampiran').show();
        $('#close').hide();

        e.preventDefault();
    })

    $('.page-scroll').on('click', function (e) {

        // ambil isi href
        var tujuan = $(this).attr('href');
        // tangkap element yang bersangkutan

        var elementTujuan = $(tujuan);

        $('body').animate({
            scrollTop: elementTujuan.offset().top
        }, 1000, 'swing');

        e.preventDefault();
    })
    // side bar tampil ketika di scroll
    var lastScroll = 0, delta = 20;
    $(window).scroll(function () {
        var scrollingUp = $(this).scrollTop();
        
        if (Math.abs(lastScroll - scrollingUp) >= delta) {
            if (scrollingUp > lastScroll) {
                // keatas
                $('#side-bar').fadeIn();

                $('.dashboard').removeClass('menu-active')
                $('.user-guide').addClass('menu-active')
            } else {
                // kebawah
                $('#side-bar').fadeOut();
                $('.dashboard').addClass('menu-active')
                $('.user-guide').removeClass('menu-active')
                
            }
            
        }
        lastScroll = scrollingUp;
    });


    $('.closes').on('click', function () {
        location.reload();
    })

    

</script>

</html>