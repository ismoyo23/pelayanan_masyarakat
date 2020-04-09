<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use App\Pengaduan;
Use DB;

class PetugasController extends Controller
{
    public function home()
    {
        return view('petugas.tema');
    }

    public function utama()
    {
        return view('petugas.page.utama');
    }

    // laporan belum diproses
    public function LaporanMasuk()
    {
        $data = DB::table('pengaduan')->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->select('masyarakat.*', 'pengaduan.*')->where('status', '0')->orWhere('status', 'proses')->get();
        return response()->json($data);
    }


    public function Lihatlaporan($id)
    {
        $data = DB::table('pengaduan')->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->select('masyarakat.*', 'pengaduan.*')->where('id_pengaduan', $id)->get();
        return response()->json($data);
    }

    public function LihatTanggapan($id)
    {
        $data = DB::table('tanggapan')->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')->join('petugas', 'petugas.id_petugas', '=', 'tanggapan.id_petugas')->select('tanggapan.*', 'pengaduan.*', 'tanggapan.*', 'petugas.*')->where('tanggapan.id_pengaduan', $id)->where('petugas.level', 'petugas')->get();
        return response()->json($data);
    }

    public function LihatTanggapanId($id)
    {
        $data = DB::table('tanggapan')->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->select('tanggapan.*', 'pengaduan.*', 'masyarakat.*')->where('tanggapan.id_tanggapan', $id)->get();
        return response()->json($data);
    }

    // Laporan di proses
    public function LaporanProses($id)
    {
        Pengaduan::where('id_pengaduan', $id)->update([
            'status' => 'proses'
        ]);
    }

    // Laporan selesai
    public function LaporanSelesai($id)
    {
        Pengaduan::where('id_pengaduan', $id)->update([
            'status' => 'selesai'
        ]);
    }

    public function LaporanSudahSelesai()
    {
        $data = DB::table('pengaduan')->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->select('pengaduan.*', 'masyarakat.*')->where('pengaduan.status', 'selesai')->get();
        return response()->json($data);
    }

    public function PermasalahanTuntas()
    {
        return view('petugas.page.tuntas');
    }

    public function UbahTanggapan($id, $data)
    {
        DB::table('tanggapan')->where('id_tanggapan', $id)->update([
            'tanggapan' => $data
        ]);
    }
}
