<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\Pengaduan;
use App\Masyarakat;
use App\Tanggapan;
use App\Petugas;
use DB;

class AdminController extends Controller
{

    public function view_login()
    {
        return view('admin.login_register.login');
    }

    // menu dashboard

    public function home()
    {
        return view('admin.tema');
    }
    public function ReportNoVerify()
    {
        $report = DB::table('pengaduan')->where('status', 'selesai')->count();
        return response()->json($report);
    }

    public function JumlahUser()
    {
        $jumlah_user = DB::table('masyarakat')->count();
        return response()->json($jumlah_user);
    }

    public function ReportVerify()
    {
        $report = DB::table('pengaduan')->where('status', 'terverifikasi')->count();
        return response()->json($report);
    }

    // verifikasi laporan
    public function verify($id)
    {
        Pengaduan::where('id_pengaduan', $id)->update([
            'status' => 'terverifikasi'
        ]);
    }

    public function utama()
    {
        return view('admin.page.utama');
    }

    public function AmbilDataMasyarakat()
    {
        $data = DB::table('masyarakat')->join('pengaduan', 'masyarakat.nik', '=', 'pengaduan.nik')->select('masyarakat.*', 'pengaduan.*')->where('pengaduan.status', 'selesai')->get();
        return response()->json($data);
    }

    public function AmbilDataMasyarakatVerify()
    {
        $data = DB::table('masyarakat')->join('pengaduan', 'masyarakat.nik', '=', 'pengaduan.nik')->select('masyarakat.*', 'pengaduan.*')->where('pengaduan.status', 'terverifikasi')->get();
        return response()->json($data);
    }

    public function proses_login(Request $request)
    {
    $request->validate([
        'username' => 'required',
        'password' => 'required'

      ]);

    $username = $request->username;
    $password = $request->password;
    $data = Admin::where('username', $username)->get();

    if (count($data) > 0) {
    foreach ($data as $dta) {

    if (password_verify($password, $dta['password'])) {
    Auth::guard('admin')->LoginUsingid($data[0]['id']);

    if ($dta['level'] == 'admin') {
    return redirect('/admin/home');
    }else if ($dta['level'] == 'petugas') {
    return redirect('/petugas/home');
    }
    }else{
        return redirect()->back()->with('lost-password', 'Password Salah');
    }

    }
	}else{
        return redirect()->back()->with('no-akun', 'Akun belum terdaftar');
    }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin')->with('logout-berhasil', 'Logout Berhasil');
    }

    public function lihat_lapor($id)
    {
        $pengaduan = DB::table('pengaduan')->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->select('masyarakat.*', 'pengaduan.*')->where('id_pengaduan', $id)->get();
        return response()->json($pengaduan);
    }

    public function lihat_dukung($id)
    {
        $lihat_dukung = DB::table('masyarakat')->join('dukungan', 'masyarakat.nik', '=', 'dukungan.nik')->select('masyarakat.*', 'dukungan.*')->where('id_pengaduan', $id)->get();
        return response()->json($lihat_dukung);
    }

    public function kirim_tanggapan(Request $request)
    {
        $tanggapan = new Tanggapan;
        $tanggapan->id_pengaduan = $request->id_pengaduan;
        $tanggapan->tgl_tanggapan = Date('Y-m-d');
        $tanggapan->tanggapan = $request->form_tanggapan;
        $tanggapan->id_petugas = $request->id_petugas;
        $tanggapan->read = '1';
        $tanggapan->save();
    }

    // ubah tanggapan admin
    public function UbahTanggapan($id, $data)
    {
        DB::table('tanggapan')->where('id_tanggapan', $id)->update([
            'tanggapan' => $data
        ]);
    }

    public function tanggapan_ku($id)
    {
        $data = DB::table('tanggapan')->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')->join('petugas', 'petugas.id_petugas', '=', 'tanggapan.id_petugas')->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->select('tanggapan.*', 'pengaduan.*', 'masyarakat.*')->where('tanggapan.id_pengaduan', $id)->where('petugas.level', 'admin')->get();
        return response()->json($data);
    }

    public function idTanggapanKu($id)
    {
        $data = DB::table('tanggapan')->join('pengaduan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan')->join('masyarakat', 'masyarakat.nik', '=' , 'pengaduan.nik')->select('pengaduan.*', 'tanggapan.*', 'masyarakat.*')->where('id_tanggapan', $id)->get();
        return response()->json($data);
    }

    public function hapusTanggapan($id)
    {
        DB::table('tanggapan')->where('id_tanggapan', $id)->delete();
    }

    public function updateTanggapan(Request $request)
    {
        Tanggapan::where('id', $request->id_pengaduan)->update([
            'id_pengaduan' => $request->id_pengaduan,
            'tanggapan' => $request->form_tanggapan,
            'id_petugas' => $request->id_petugas
            ]);
    }

    public function hapusLaporan($id)
    {
        DB::table('pengaduan')->where('id_pengaduan', $id)->delete();
    }


    // menu laporan
    public function view_laporan()
    {
        return view('admin.page.laporan');
    }
    
    public function rangeTanggalAll(){
        $rangeAll = DB::table('pengaduan')->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->select('masyarakat.*', 'pengaduan.*')->get();
        return response($rangeAll);
    }

    public function rangeTanggal($awal, $akir, $status)
    {
        if ($status == 'all') {
            $range = DB::table('pengaduan')->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->select('masyarakat.*', 'pengaduan.*')->whereBetween('tgl_pengaduan', [$awal, $akir])->get();
            return response()->json($range);
        }else{
        $range = DB::table('pengaduan')->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->select('masyarakat.*', 'pengaduan.*')->whereBetween('tgl_pengaduan', [$awal, $akir])->where('status', $status)->get();
        return response()->json($range);
        }
        
    }

    public function printAll()
    {
        $printAll = DB::table('pengaduan')->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->select('masyarakat.*', 'pengaduan.*')->get();
        return view('admin.page.printAll', compact('printAll'));
    }


    public function print($awal, $akir, $status)
    {
        if ($status == 'all') {
             $print = DB::table('pengaduan')->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->select('masyarakat.*', 'pengaduan.*')->whereBetween('tgl_pengaduan', [$awal, $akir])->get();
             
        }else{
            $print = DB::table('pengaduan')->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->select('masyarakat.*', 'pengaduan.*')->whereBetween('tgl_pengaduan', [$awal, $akir])->where('status', $status)->get();
        }
        
        return view('admin.page.print', ['print' => $print, 'awal' => $awal, 'akir' => $akir]);
    }
    
    // menu petugas

    public function dataPetugas()
    {
        $petugas = DB::table('petugas')->get();
        return view('admin.page.data_petugas');
    }

    public function addPerson(Request $request)
    {
        $petugas = new Petugas;
        $petugas->id_petugas = $request->nik;
        $petugas->nm_petugas = $request->nama;
        $petugas->username = $request->username;
        $petugas->password = bcrypt($request->password);
        $petugas->tlp = $request->tlp;
        $petugas->level = $request->level;
        $petugas->id = $request->nik;
        $petugas->save();
    }

    public function dataUser()
    {
        $data = Masyarakat::get();
        return response()->json($data);
    }

    public function hapusUser($id)
    {
        Masyarakat::where('nik', $id)->delete();
    }

    public function blockUser($id)
    {
        Masyarakat::where('nik', $id)->update([
            'is_active' => '0'
        ]);
    }

    public function UnBlockUser($id)
    {
        Masyarakat::where('nik', $id)->update([
            'is_active' => '1'
        ]);
    }

    public function cariDataUser($cari)
    {
        $cari = Masyarakat::where('nama', 'like', "%".$cari."%")->get();
        return response()->json($cari);
    }

    public function ambilAdmin()
    {
        $admin = Petugas::where('level', 'admin')->get();
        return response()->json($admin);
    }

    public function ambilPetugas()
    {
        $petugas = Petugas::where('level', 'petugas')->get();
        return response()->json($petugas);
    }

    public function hapusAdmin($id)
    {
        Petugas::where('id_petugas', $id)->delete();
    }
    public function LihatAdminId($id)
    {
        $petugas = Petugas::where('id_petugas', $id)->get();
        return response()->json($petugas);
    }

    public function UpdateAdmin(Request $request, $id)
    {
        Petugas::where('id_petugas', $id)->update([

            'nm_petugas' => $request->nama,
            'username' => $request->username,
            'tlp' => $request->tlp,
            'level' => $request->level
        ]);
    }

    
}
