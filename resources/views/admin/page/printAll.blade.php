<link rel="stylesheet" href="{{ url('tema_utama/theme/bootstrap/css/bootstrap.css') }}">
<div align="center">
        <h2>Laporan Pengaduan</h2>
</div>
<div class="container">
<p >Tanggal Awal: All</p>
<p style="margin-top: -8px;">Tangal Akir : All</p>
<table style="width: 100%;" border="1" cellpading="10">
<tr>
    <th>Nama</th>
    <th>Isi Laporan</th>
    <th>Tanggal</th>
    <th>subjek</th>
    <th>wlayah</th>
</tr>
@foreach($printAll as $print)
<tr>
    <td>{{ $print->nama }}</td>
    <td>{{ $print->isi_laporan }}</td>
    <td>{{ $print->tgl_pengaduan }}</td>
    <td>{{ $print->subjek }}</td>
    <td>{{ $print->wilayah }}</td>

</tr>
@endforeach
</table>
</div>

<script>
window.print();
</script>