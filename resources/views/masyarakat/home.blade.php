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

<div class="dropdown-menu list-menu" style="position: absolute; margin-top: 156px; margin-left: 106px; height: 190px; overflow: scroll" aria-labelledby="dropdownMenuLink">
    <div class="komentar-admin"></div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">About</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div align="center"><h1 style="color: aqua;">Apa itu APM</h1></div>
        <p style="margin-top: 40px;">APM atau Aplikasi Pelayanan Masyarakat adalah sebuah web untuk pengelolaan pengaduan pelayanan publik di setiap organisasi penyelenggara di Indonesia belum terkelola secara efektif dan terintegrasi. Masing-masing organisasi penyelenggara mengelola pengaduan secara parsial dan tidak terkoordinir dengan baik. Akibatnya terjadi duplikasi penanganan pengaduan, atau bahkan bisa terjadi suatu pengaduan tidak ditangani oleh satupun organisasi penyelenggara, dengan alasan pengaduan bukan kewenangannya. Oleh karena itu, untuk mencapai visi dalam good governance maka perlu untuk mengintegrasikan sistem pengelolaan pengaduan pelayanan publik dalam satu pintu. Tujuannya, masyarakat memiliki satu saluran pengaduan secara Nasional.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <!-- Modal lihat laporan-->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <a href="#" style="color: black; margin-left: 10px; margin-top:8px;" class="closes" data-dismiss="modal">x</a>
      <div class="modal-body" style="overflow: scroll; height: 530px;">
        <div id="body"></div>
            <div class="row">
            <input type="hidden" name="nik" id="nik" value="{{ auth()->user()->nik }}">
            <a href="#" id="simpan-suport" class="simpan-suport"></a>
            <a href="#" class="unSupport"></a><br>

        </div>
        <hr>

        <div class="list-group">
            <h6 align="center">komentar Admin & petugas</h6>
        <div class="komentarnya-admin"></div>
        </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal lihat komentar admin -->
<!-- Modal -->
<div class="modal fade" id="lihat-komen" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Balasan Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="list-group">
                <div class="see-koment"></div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <body>
    <?php if (session('laporan_terkirim')): ?>
	<div class="flash-data" data-flashdata="Terimakasih sudah melapor"></div>
    <?php endif ?>
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
                <a class="nav-link color-white hover-aqua dashboard  menu page-scroll" href="#home"> <span
                    class="fa fa-fw fa-tachometer"></span>
                Dashboard</a>
            </li>

            <li class="nav-item hidden-deskop dropdown">
                <a class="nav-link color-white hover-aqua dropdown-toggle comentar-android menu" data-toggle="dropdown" href="#komen" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-fw fa-comment-o"></span>Coment</a>
                <div class="dropdown-menu" style="height: 170px; overflow: scroll;">
                  <div class="komentar-admin"></div>
                </div>
              </li>

            <li class="nav-item hidden-deskop">
                <a data-toggle="modal" data-target="#about" class="nav-link color-white hover-aqua" href="login.html"> <span class="fa fa-fw fa-users"></span>
                About</a>
            </li>
            <li class="nav-item hidden-deskop">
                <a class="nav-link color-white hover-aqua user-guide page-scroll u"  href="#user-guide"> <span class="fa fa-fw fa-book"></span> User
                Guide</a>
            </li>
            <li class="nav-item">
                <a class="nav-link color-white" href="login.html"><span class="fa fa-fw fa-user"></span>{{ auth()->user()->nama }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link color-white" href="{{ url('/logout') }}"><span class="fa fa-fw fa-sign-out"></span>Logout</a>
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
            <a style="border: 2px solid black; height: 79px; width: 101px;"  class="btn color-white hover-aqua komentar menu"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#komen">
                <!-- notifikasi -->
                <div>
                <span class="btn btn-danger"
                    style="font-size: 14px; position: absolute; margin-top: -8px; margin-left: 19px; width: 30px; height: 30px;"><span class="jumlah-comentar"></span></span>
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
            <a style="border: 2px solid black; height: 79px; width: 90px;" data-toggle="modal" data-target="#about" class="btn color-white hover-aqua" href="">
                <!-- notifikasi -->

                <span class="fa fa-fw fa-users" style="font-size: 33px;"></span> <span style="font-size: 14px;">
                About</span>
            </a>
            </li>

            <li class="nav-item">
            <a style="border: 2px solid black; height: 79px; width: 101px;" class="btn color-white hover-aqua user-guide menu page-scroll"
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

        <a href="#komen" class="btn hover-aqua menu komen-android color-white" 
        style="border: 2px solid black; height: 79px; width: 101px; position: absulute; color: white;"><span
            class="fa fa-fw fa-comment-o" style="font-size: 33px;">
            <div>
            <span class="btn btn-danger"
                style="font-size: 14px; position: absolute; margin-top: -40px; margin-left: 19px; width: 30px; height: 30px;"><span class="jumlah-comentar"></span></span>
            </div>
        </span> <span style="font-size: 14px;">Coment</span>


        <a data-toggle="modal" data-target="#about" href="" class="btn btn hover-aqua color-white"
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
                            <?php foreach ($task_ku as $my_task): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo substr($my_task->isi_laporan, 0, 15) ?> 
                                <a href="#" data-toggle="modal" style="margin-left: auto;" data-target="#exampleModalScrollable" class="badge badge-primary badge-pill ambil-data" data-imdb="{{ $my_task->id_pengaduan}}"><span class="fa fa-fw fa-eye"></span></a>
                                <?php if ($my_task->status == '0'): ?>
                                    <a href="" class="badge badge-info badge-pill" style="margin-left: 3px;">terkirim</a>
                                    <?php elseif ($my_task->status == 'proses' || 'selesai'): ?>
                                    <a href="" class="badge badge-warning badge-pill" style="margin-left: 3px;">Proses</a>
                                    <?php elseif ($my_task->status == 'terverifikasi'): ?>
                                    <a href="" class="badge badge-success badge-pill" style="margin-left: 3px;">Selesai</a>
                                <?php endif ?>
                                
                                </li>
                            <?php endforeach ?>
                        </ul>
                        
                        <!-- list task ku -->
                        <ul class="list-group task-lamaku scroll" style="height: 280px">
                            <?php foreach ($task_lamaku as $long_task): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo substr($long_task->isi_laporan, 0, 15) ?>
                                <a href="#" data-toggle="modal" style="margin-left: auto;" data-target="#exampleModalScrollable" class="badge badge-primary badge-pill ambil-data" data-imdb="{{ $long_task->id_pengaduan}}"><span class="fa fa-fw fa-eye"></span></a>
                                <?php if ($long_task->status == '0'): ?>
                                    <a href="" class="badge badge-info badge-pill" style="margin-left: 3px;">terkirim</a>
                                    <?php elseif ($long_task->status == 'proses' || 'selesai'): ?>
                                    <a href="" class="badge badge-warning badge-pill" style="margin-left: 3px;">Proses</a>
                                    <?php elseif ($long_task->status == 'terverifikasi'): ?>
                                    <a href="" class="badge badge-success badge-pill" style="margin-left: 3px;">Selesai</a>
                                <?php endif ?>
                                </li>
                            <?php endforeach ?>
                        </ul>
                        <!-- list ku -->

                        <!-- list semua task -->
                        <ul class="list-group semua-task scroll" style="height: 280px">
                            <?php foreach($semua_task as $all_task ): ?>
                                
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo substr($all_task->isi_laporan, 0, 15) ?>
                                <a href="#" data-toggle="modal" style="margin-left: auto;" data-target="#exampleModalScrollable" class="badge badge-primary badge-pill ambil-data" data-imdb="{{ $all_task->id_pengaduan}}"><span class="fa fa-fw fa-eye"></span></a>
                                <?php if ($all_task->status == '0'): ?>
                                    <a href="" class="badge badge-info badge-pill" style="margin-left: 3px;">terkirim</a>
                                    <?php elseif ($all_task->status == 'proses' || 'selesai'): ?>
                                    <a href="" class="badge badge-warning badge-pill" style="margin-left: 3px;">Proses</a>
                                    <?php elseif ($all_task->status == 'terverifikasi'): ?>
                                    <a href="" class="badge badge-success badge-pill" style="margin-left: 3px;">Selesai</a>
                                <?php endif ?>
                                </li>
                            <?php endforeach ?>
                                
                        </ul>
                        <!-- semua task -->
                        </div>

                        <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                        <form method="post" action="{{ url('/home/kirim_laporan') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group mr-top-android-20px">
                            <input type="hidden" name="nik" value="{{ auth()->user()->nik }}"/>
                            <textarea name="isi_laporan" class="form-control @error('isi_laporan')is-invalid @enderror" id="exampleFormControlTextarea1"
                                style="height: 200px; margin-bottom: 30px;" placeholder="Masukkan Laporan"></textarea>
                            <select name="subjek" style="width: 100%;" class="form-control select2">
                                <option>Bencana Alam</option>
                                <option>Penyakit Menular</option>
                                <option>Perselisihan Antar Kelompok</option>
                                <option>Jalanan Rusak</option>
                                <option>Perudungan</option>
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
<script src="{{ url('tema_utama/theme/bootstrap/script.js') }}"></script>

</html>
