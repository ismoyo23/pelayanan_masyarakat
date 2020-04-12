<link rel="stylesheet" href="{{ url('tema_utama/theme/bootstrap/css/bootstrap.css') }}">
<div align="center">
        <h2>Laporan Pengaduan</h2>
</div>
<div class="container">
<p >Tanggal Awal: <?php echo $awal; ?></p>
<p style="margin-top: -8px;">Tangal Akir : <?php echo $akir; ?></p>
<table style="width: 100%;" border="1">
<tr>
    <th>Nama</th>
    <th>Isi Laporan</th>
    <th>Tanggal</th>
    <th>subjek</th>
    
</tr>
@foreach($print as $pr)
<tr>
    <td>{{ $pr->nama }}</td>
    <td>{{ $pr->isi_laporan }}</td>
    <td>{{ $pr->tgl_pengaduan }}</td>
    <td>{{ $pr->subjek }}</td>
    

</tr>
@endforeach
</table>
</div>

<script>
window.print();
</script>
