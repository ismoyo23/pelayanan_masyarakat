<div class="col-md-6">
<div class="shadow-lg p-3 mb-5 bg-white rounded card" style="margin-top: 20px;">
                <div class="row">
                <button class="close" style="background-color:white; border: 0 solid white; margin-top:-14px; height: 10px; margin-left: 8px;">x</button>

                <nav class="navbar navbar-light bg-light col-md-6">
                    <a class="navbar-brand" href="#">
                        <img src="" style="border-radius: 40px;" width="36" height="36" class="d-inline-block align-top" alt="">
                        <span style="color: grey; font-size: 15px;">${m.nama}, Laporan ${m.subjek}</span>
                    </a>
                </nav>

                <nav style="margin-top:-7px;" class="navbar navbar-light bg-light col-md-3">
                    <a class="navbar-brand" href="#">

                    </a>
                </nav>
                    </div>
                    <img src="/image/${m.foto}" height="400" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">`+ isiLapor +`</p>
                            <a href="#" style="color:grey; text-decoration: none;">Lebih Lanjut</a><br>
                            </div>
                            <div align="center">
                            <a href="" class="btn btn-primary">Verifikasi</a>
                            <a href="" id="delete" class="btn btn-danger delete">Delete</a>
                            <button data-imdbid="${m.id_pengaduan}" class="btn btn-success tekan-tombol" data-toggle="modal" data-target="#exampleModal">Tanggapi</button>
                        </div>
                </div>
            </div> 
    </div>
</div>

<div class="col-md-6 pendukung">
                    <div class="shadow-lg p-3 mb-5 bg-white rounded card " style="margin-top: 20px; ">
                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#pendukung" role="tab" aria-controls="home" aria-selected="true">Pendukung</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tanggapan_klick" id="profile-tab" data-toggle="tab" href="#tanggapan" role="tab" aria-controls="tanggapan" aria-selected="false">Tangapan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Petugas</a>
                                </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="pendukung" role="tabpanel" aria-labelledby="home-tab">
                                <ul class="list-group" id="chek2" style="overflow: scroll; height: 300px;">
                                        <div class="dukungan"></div>
                                </ul> 
                                
                                </div>
                                <div class="tab-pane fade" id="tanggapan" role="tabpanel" aria-labelledby="profile-tab" style="overflow: scroll; height: 400px;">
                                <br>
                                <div class="tanggapan_ku"></div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                                </div> 
                        
                    </div>
                </div>