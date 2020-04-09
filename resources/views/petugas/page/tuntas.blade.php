
<link rel="stylesheet" type="text/css" href="{{ url('tema_utama/theme/datatables/datatables.min.css') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="shadow-lg p-3 mb-5 bg-white rounded ">

            <table class="table table-bordered data">
        <thead>
            <tr>
            <th scope="col">Nama</th>
            <th scope="col">Isi Laporan</th>
            <th scope="col">Foto</th>
            <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody class="table-tuntas">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>
</table>


</div>
<script type="text/javascript" src="{{url('tema_utama/theme/jquery.js')}}"></script>
<script type="text/javascript" src="{{ url('tema_utama/theme/datatables/datatables.min.js') }}"></script>
<script src="{{ url('sweetalert.js') }}"></script>
<script type="text/javascript" src="{{ url('tema_utama/theme/datatables/datatables.min.js') }}"></script>
<script>
    $('.data').DataTable();
$.ajax({
    url: '/admin/AmbilDataMasyarakatVerify',
    success: data =>{
        table = "";
        data.forEach(d => {
            table += `
            <tr>
                <td>${d.nama}</td>
                <td>${d.isi_laporan}</td>
                <td><img src="{{ url('image/${d.gambar}') }}" alt=""></td>
                <td>${d.tgl_pengaduan}</td>
            </tr>
            `;
        });

        $('.table-tuntas').html(table)
    }
})
</script>