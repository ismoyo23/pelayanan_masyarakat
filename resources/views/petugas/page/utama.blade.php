
<link rel="stylesheet" type="text/css" href="{{ url('tema_utama/theme/datatables/datatables.min.css') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">To:</label>
                    <input type="text" class="form-control to" disabled id="recipient-name">
                    <input type="hidden" class="id_petugas" value="{{ auth()->user()->id_petugas }}">
                    <input type="hidden" class="id_pengaduan" value="">
                    <input type="hidden" class="id-tanggapanku" value="">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control form_tanggapan" id="message-text"></textarea>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary kirim-tanggapan">Kirim Tanggapan</button>
                <button type="button" class="btn btn-info ubah-tanggapan">Ubah Tanggapan</button>
            </div>
            </div>
        </div>
        </div>

    <div class="col-md-6 kartu">
        <div class="shadow-lg p-3 mb-5 bg-white rounded ">
            <a href="#" class="tutup" style="margin-bottom: 10px;"><span>x</span></a>
            <br><br>
            <div class="lihat-laporan"></div>
        </div>
    </div>
    
    <div class="col-md-6 kartu">
        <div class="shadow-lg p-3 mb-5 bg-white rounded ">
        <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Dukungan</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Tanggapanku</a>
        </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" style="height: 300px; overflow:scroll;">
            <div class="lihat-dukungan"></div>
        </div>
        <div class="tab-pane fade" id="nav-profile" style="overflow: scroll; height: 400px;" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="tanggapan-petugas"></div>
        </div>
        </div>
            
        </div>
    </div>

</div>

<div class="tabel-laporan">
    <div class="shadow-lg p-2 mb-4 bg-white rounded">

    <nav style="margin-bottom: 10px;">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#laporan-masuk" role="tab" aria-controls="nav-home" aria-selected="true">Laporan Masuk</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#laporan-dahulu" role="tab" aria-controls="nav-profile" aria-selected="false">Laporan Selesai</a>

    </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="laporan-masuk" role="tabpanel" aria-labelledby="nav-home-tab">
            <table class="table table-bordered data">
                    <thead>
                    <tr>
                        <th>NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Isi Laporan</th>
                        <th scope="col">Tanggal Pengaduan</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                    </thead>
                    <tbody class="tbody">
                        
                    </tbody>
                </table>

        </div>
        <div class="tab-pane fade" id="laporan-dahulu" role="tabpanel" aria-labelledby="nav-profile-tab" >

            <table class="table table-bordered data-selesai">
                    <thead>
                    <tr>
                        <th>NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Isi Laporan</th>
                        <th scope="col">Tanggal Pengaduan</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                    </thead>
                    <tbody class="laporan-selesai">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tbody>
                </table>
    
        </div>

    </div>

    </div>
</div>
<script type="text/javascript" src="{{url('tema_utama/theme/jquery.js')}}"></script>
<script type="text/javascript" src="{{ url('tema_utama/theme/datatables/datatables.min.js') }}"></script>
<script src="{{ url('sweetalert.js') }}"></script>
<script>

    $('.data').DataTable();
    $('.data-selesai').DataTable();
   
    $('.tabel-laporan').show()
    $('.kartu').hide()
 
    $('.tutup').on('click', function(e){
       location.reload()

    e.preventDefault();
    })


    
setInterval(() => {
// laporan selesai

$.ajax({
    url: '/petugas/LaporanSudahSelesai',
    success: data => {
        var table = "";
        data.forEach(d => {
            
            table += `
                <tr>
                        <td>${d.nik}</td>
                        <td>${d.nama}</td>
                        <td>${d.isi_laporan}</td>
                        <td>${d.tgl_pengaduan}</td>
                        <td>
                        <a href="${d.id_pengaduan}" class="btn btn-success proses-laporan">Selesai</a></td>
                </tr>
            `;
        });

        $('.laporan-selesai').html(table)
        
    }

})

// laporan masuk dan di proses
    $.ajax({
    url: '/petugas/LaporanMasuk',
    success: data => {
        table = '';
        data.forEach(d => {
            var isi_laporan = d.isi_laporan;
            var isiLapor = isi_laporan.slice(0,24);
            if (d.status == '0') {
                table += `
                <tr>
                        <td>${d.nik}</td>
                        <td>${d.nama}</td>
                        <td>`+isiLapor+`</td>
                        <td>${d.tgl_pengaduan}</td>
                        <td><a href="${d.id_pengaduan}" class="btn btn-primary lihat"><span class="fa fa-fw fa-eye"></span>Lihat</a>
                        <a href="${d.id_pengaduan}" class="btn btn-info proses-laporan">Proses</a></td>
                </tr>
            `;
            }else if (d.status == 'proses') {
                table += `
                <tr>
                        <td>${d.nik}</td>
                        <td>${d.nama}</td>
                        <td>`+isiLapor+`</td>
                        <td>${d.tgl_pengaduan}</td>
                        <td><a href="${d.id_pengaduan}" class="btn btn-primary lihat"><span class="fa fa-fw fa-eye"></span>Lihat</a>
                        <a href="${d.id_pengaduan}" class="btn btn-warning selesai">Selesai</a></td>
                </tr>
            `;
            }else if(count(d.status) < 1){
                table += `
                <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
            `;
            }
            
        });

        $('.tbody').html(table)

        // ketika tombol selesai di klick
        $('.selesai').on('click', function(e){
            var id = $(this).attr('href')
            $.ajax({
                url: '/petugas/LaporanSelesai/'+ id,
                success: function(){
                    console.log('berhasil')
                }
            })

            e.preventDefault()
        })

        $('.proses-laporan').on('click', function(e){
            var id = $(this).attr('href')
            $.ajax({
                url: '/petugas/ProsesLaporan/'+id,
                success: function(){
                    console.log('ok')
                }
            })
            e.preventDefault()
        })

        $('.lihat').on('click', function(e){
            $('.tabel-laporan').hide()
            $('.kartu').show()
                var id = $(this).attr('href')
                $.ajax({
                    url: '/petugas/LihatLaporan/'+id,
                    success: data => {
                        var lihat = '';
                        data.forEach(d => {
                            lihat += 
                            `
                                <img src="{{ url('/image/${d.foto}') }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">${d.subjek}</h5>
                                        <p class="card-text">${d.isi_laporan}</p>
                                        <div align="center">
                                        <a href="#" ambilId="${d.id_pengaduan}"  class="btn btn-danger">Delete</a>
                                        <a href="#" ambilId="${d.id_pengaduan}" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn btn-primary tanggapi">Tanggapi</a>
                                        </div>
                                    </div>
                            `;
                            $('.id_pengaduan').val(d.id_pengaduan)
                        });
                        $('.lihat-laporan').html(lihat)

                        // kirim tanggapan
                        $('.kirim-tanggapan').on('click', function(){

                        var data = {
                            "id_petugas": $('.id_petugas').val(),
                            "id_pengaduan": $('.id_pengaduan').val(),
                            "form_tanggapan": $('.form_tanggapan').val()
                            }

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        })

                            $.ajax({
                                type: 'POST',
                                url: "/admin/kirimTanggapan",
                                data: data,
                                success: function(){
                                    $('.form_tanggapan').val('')
                                    swal("Berhasil!", "Tanggapan dikirim", "success");
                                }
                            })
                        })

                        $('.ubah-tanggapan').on('click', function(){
                            var id_tanggapanku = $('.id-tanggapanku').attr('value')
                            var data = $('.form_tanggapan').val()
                            console.log(id_tanggapanku)
                            $.ajax({
                                url: '/petugas/UbahTanggapan/'+id_tanggapanku+'/'+data,
                                success: data=> {
                                    $('.form_tanggapan').val('')
                                    swal("Berhasil!", "Tanggapan diupdate", "success");
                                }
                            })
                        })

                    setInterval(() => {
                        
                    
                        // lihat dukungan
                        $.ajax({
                            url: '/admin/lihatDukung/'+id,
                            success: data => {
                                var dukungan = '';
                                data.forEach(d => {
                                    dukungan += `
                                        <li class="list-group-item  align-items-center" >
                                            <span class="fa fa-fw fa-user"></span>${d.nama}
                                        </li>
                                    `;
                                });
                                    $('.lihat-dukungan').html(dukungan)
                            }
                        })
                    
                        $.ajax({
                            url: '/petugas/LihatTanggapan/'+id,
                            success: data =>{
                                
                                let tanggapanku = '';
                                data.forEach(tanggapan => {
                                    tanggapanku += `
                                    <div class="card border-primary mb-3" style="width: 100%;">
                                        <div class="card-body text-dark">
                                            <h6 class="card-title">Tanggapan ku</h6>
                                            <p class="card-text">${tanggapan.tanggapan}</p>
                                            <button value="${tanggapan.id_tanggapan}" class="badge badge-danger hapus-tanggapan"><span class="fa fa-fw fa-remove"></span>hapus</button>
                                            <button value="${tanggapan.id_tanggapan}" class="badge badge-success edit-tanggapan"  data-toggle="modal" data-target="#exampleModal"><span class="fa fa-fw fa-pencil"></span>edit</button>
                                        </div>
                                    </div>
                                `; 
                                });
                                
                                
                                $('.tanggapan-petugas').html(tanggapanku)

                                // edit tanggapan
                                    $('.edit-tanggapan').on('click', function(){
                                        $('.ubah-tanggapan').show();
                                        $('.kirim-tanggapan').hide();
                                        var IdTanggapan = $(this).attr('value')
                                        $.ajax({
                                            url: '/petugas/LihatTanggapanId/'+IdTanggapan,
                                            success: data => {
                                            data.forEach(d => {
                                                $('.id-tanggapanku').val(d.id_tanggapan)
                                                $('.form_tanggapan').val(d.tanggapan);
                                                $('.to').val(d.nama);
                                            });
                                                
                                            }
                                        })


                                    })

                                // hapus tanggapan
                                $('.hapus-tanggapan').on('click', function(){
                                    idHapus = $(this).val();
                                    $.ajax({
                                        url: "/admin/hapusTanggapan/"+ idHapus,
                                        type: "GET",
                                        success: function(){
                                            swal("Berhasil!", "Tanggapan dihapus", "success");
                                        }
                                    })
                                })
                                
                            }

                        })

                        }, 1000);
                        // tanggapi laporan
                        $('.tanggapi').on('click', function(e){
                            $('.ubah-tanggapan').hide();
                            $('.kirim-tanggapan').show();
                            var id = $(this).attr('ambilId')
                            $.ajax({
                                url: '/petugas/LihatLaporan/' +id,
                                success: data => {
                                    data.forEach(d => {
                                        $('.to').val(d.nama)
                                    });
                                }
                            })
                            e.preventDefault()
                        })

                    }
                })
            e.preventDefault()
        })
    
    }
})

}, 1000);
</script>