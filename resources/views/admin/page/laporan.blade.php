<!-- Modal -->
<link rel="stylesheet" href="{{ url('tema_utama/date/css/datepicker.css') }}">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <input type="text" id="tanggal-awal" class="form-control tgl_awal" placeholder="Tanggal Awal">
            </div>
            <div class="form-group">
                <input type="text" id="tanggal-akir" class="form-control tgl_akir" placeholder="Tanggal Akir">
            </div>

        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-fw fa-close tutup"></span></button>
            <button type="button" class="btn btn-success cari"><span class="fa fa-fw fa-search"></span></button>
        </div>
        </div>
    </div>
    </div>

<div class="container" >
<div class="col-md-12 for-table area-cetak" style="margin-top: 20px;">

                <div class="shadow-lg p-3 mb-5 bg-white rounded">

                <div class="container">
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1 ndelek">
                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                        <select class="custom-select mr-sm-2 pilihan" id="inlineFormCustomSelect">
                            <option status="all" >All</option>
                            <option status="terverifikasi">Terverifikasi</option>
                            <option status="selesai">Belum Diverifikasi</option>
                        </select>
                        </div>

                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-info click" data-toggle="modal" data-target="#exampleModal"><span class="fa fa-fw fa-search"></span></button>
                            <a class="print"></a>
                        </div>
                        <label for="" class="tgl_tmpl" style="margin-left:auto;"></label>
                        <table class="table table-striped table-bordered data">

                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Isi laporan</th>
                                    <th>Foto</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="tubuh">
                        
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>

<script type="text/javascript" src="{{url('tema_utama/theme/jquery.js')}}"></script>
<script src="{{ url('sweetalert.js') }}"></script>
<script src="{{ url('jquery.PrintArea.js') }}"></script>
<script src="{{ url('tema_utama/date/js/bootstrap-datepicker.js') }}"></script>
<script>
$(function(){

    $('.tutup').stop()

    $('#tanggal-awal').datepicker({
		autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight:  true,
	});

    $('#tanggal-akir').datepicker({
		autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight:  true,
	});

// semua laporan di cetak
$.ajax({
    type:'GET',
    url: "/rangeTanggalAll",
    success: data =>{
        let tblAll = data;
        let tableAll = '';
        tblAll.forEach(tbAll => {
            tableAll += 
            `
            <tr>
                <td>${tbAll.nama}</td>            
                <td>${tbAll.isi_laporan}</td>
                <td><img width="100px" height="100px" src="{{ url('/image/${tbAll.foto}') }}"</td>
                <td>${tbAll.tgl_pengaduan}</td>
        
            </tr>
            `;
        });
        $('.tubuh').html(tableAll);
        
        let tombol_cetak = '<a href="{{url('/print/All') }}" target="_blank" class="btn btn-success"><span class="fa fa-fw fa-print"></span></a>';
        $('.print').html(tombol_cetak);

        // proses range tanggal
    $('.click').on('click', function(){
        var status = $('.pilihan option:selected').attr('status');
        $('.cari').on('click', function(){
            $('#hide-table').hide();
            var awal = $('#tanggal-awal').val();
            var akir = $('#tanggal-akir').val();
            var status = $('.pilihan option:selected').attr('status');
            if (status == 'all') {
                $.ajax({
                    type:'GET',
                    url: "/rangeTanggal/"+awal+"/"+akir+"/"+status,
                    success: data => {

                        if (data <1) {
                            swal("Maaf", "Data tidak ditemukan", "error");
                        }else{
                            let tblAll = data;
                            let tableAll = '';
                            tblAll.forEach(tbAll => {
                                
                                tableAll += 
                                `
                                <tr>
                                    <td>${tbAll.nama}</td>            
                                    <td>${tbAll.isi_laporan}</td>
                                    <td><img width="100px" height="100px" src="{{ url('/image/${tbAll.foto}') }}"</td>
                                    <td>${tbAll.tgl_pengaduan}</td>
                            
                                </tr>
                                `;
                            });
                            
                            $('.tubuh').html(tableAll);
                            swal("Berhasil!", "Data Ditemukan", "success");
                            swal.close();
                            let tombol_cetak = '<a href='+'/print/'+awal+'/'+akir+'/'+status+' target="_blank" class="btn btn-success"><span class="fa fa-fw fa-print"></span></a>';
                            $('.print').html(tombol_cetak);

                            // hentikan eksekusi
                            

                        }
                        
        }
        })

            }else{
                $.ajax({
                url: "/rangeTanggal/"+awal+"/"+akir+"/"+status,
                success: data => {
                    if (data<1) {
                        swal("Maaf", "Data tidak ditemukan", "error");
                    }else{
                    let tampil_tgl = '<span class="awal">'+awal+'</span> sd <span class="akir">'+akir+'</span>';
                    $('.tgl_tmpl').html(tampil_tgl);
                    let tbl = data;
                    let table = '';
                    tbl.forEach(tb => {
                        table += `
                                <tr>
                                    <td>${tb.nama}</td>            
                                    <td>${tb.isi_laporan}</td>
                                    <td><img width="100px" height="100px" src="{{ url('/image/${tb.foto}') }}" alt=""></td>
                                    <td>${tb.tgl_pengaduan}</td>
        
                                </tr>
    
                        `;
                    });
                    $('.tubuh').html(table);
                    swal("Berhasil!", "Data Ditemukan", "success");

                    let tombol_cetak = '<a href='+'/print/'+awal+'/'+akir+'/'+status+' target="_blank" class="btn btn-success"><span class="fa fa-fw fa-print"></span></a>';
                    $('.print').html(tombol_cetak);
                    }
                }
            })

                

            }
            

            

        });
        
    })

    }
})

    
    })

</script>