<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Masyarakat;
use App\Pengaduan;
use App\Dukungan;
use App\Tanggapan;
use DB;
// code by ismoyo

class HomeController extends Controller
{

  // halaman awal
    public function index()
    {
        return view('masyarakat.index');
    }

    public function home()
    {
     $task_ku = Pengaduan::where('nik', auth()->user()->nik)->where('tgl_pengaduan', date('Y-m-d'))->orderby('id_pengaduan', 'DESC')->get();
     $task_lamaku = Pengaduan::where('nik', auth()->user()->nik)->where('tgl_pengaduan', '<', date('Y-m-d'))->orderby('id_pengaduan', 'DESC')->get();
     $semua_task = Pengaduan::orderby('id_pengaduan', 'DESC')->get();

      return view('masyarakat.home', ['task_ku' => $task_ku, 'task_lamaku' => $task_lamaku, 'semua_task'=> $semua_task]);
    }

    // untuk melihat semua dukungan
    public function view_support($id){
     $dukungan_all = DB::table('pengaduan')->join('dukungan', 'pengaduan.id_pengaduan', '=', 'dukungan.id_pengaduan')->select('dukungan.*', 'pengaduan.*')->where('dukungan.id_pengaduan', $id)->count();
     return response()->json($dukungan_all);
    }

    public function LihatKomentarAdmin($id)
    {
      $data = DB::table('tanggapan')->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')->join('petugas', 'petugas.id_petugas', '=' ,'tanggapan.id_petugas')->select('tanggapan.*', 'pengaduan.*', 'petugas.*')->where('tanggapan.id_pengaduan', $id)->get();
      return response()->json($data);
    }

    // unutk melihat dukunganku ke orang lain
    public function view_support_ku($id){
      
      $dukungan_ku = DB::table('dukungan')->join('pengaduan', 'pengaduan.id_pengaduan', '=', 'dukungan.id_pengaduan')->select('dukungan.*', 'pengaduan.*')->where('dukungan.nik','=', auth()->user()->nik)->where('dukungan.id_pengaduan', $id)->count('id_dukung');
      return response()->json($dukungan_ku);
    }

    // untuk mengambil api dari table pengaduan
    public function api_lapor($id)
    { 
     $pengaduan = DB::table('pengaduan')->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->select('masyarakat.*', 'pengaduan.*')->where('id_pengaduan', $id)->get();
     return response()->json($pengaduan);
    }

    public function kirim_laporan(Request $request)
    {
    $request->validate([
      'isi_laporan' => 'required'
    ]);

    $block = Masyarakat::where('nik', $request->nik)->get();
    foreach ($block as $data) {
	if ($data->is_active == 1){

      //  upload gambar
    if ($request->hasFile('gambar')) {

            $resorce = $request->file('gambar');
            $name   = $resorce->getClientOriginalName();
            // memindahkan foto ke folder gambar
            $resorce->move(\base_path() ."/public/image", $name);
            $pengaduan = new Pengaduan;


            $pengaduan->tgl_pengaduan = date('Y-m-d');
            $pengaduan->nik = $request->nik;
            $pengaduan->isi_laporan = $request->isi_laporan;
            $pengaduan->subjek = $request->subjek;
            $pengaduan->status = '0';
            $pengaduan->foto = $name;
            $pengaduan->save();

            return redirect('/home')->with('laporan_terkirim', 'laporan terkirim');
      }else{
        echo "<script>alert('gambar tidak boleh kosong');window.history.back(-1);</script>";
      }

    }else{
      echo "<script>alert('Anda telah di blokir');window.history.back(-1);</script>";
    }
}
    
    
    }


    public function view_login(){
          return view('masyarakat.login_register.login');
    }

    public function proses_login(Request $request)
    {

      $request->validate([
        'username' => 'required',
        'password' => 'required'

      ]);
      
        $username = $request->username;
        $password = $request->password;

        $data = Masyarakat::where('username', $username)->get();
        
        if (count($data) > 0) {

          foreach ($data as $dta) {
            
              if (password_verify($password, $dta['password'])) {
                Auth::guard('masyarakat')->LoginUsingid($data[0]['nik']);
                  return redirect('/home');

              }else{
                return redirect('/login')->with('lost-password', 'Password Salah');
              }
        }
          }else{
            return redirect()->back()->with('no-akun', "Anda belum terdaftar");
          }
    }



    // view register
    public function view_register(){
      return view('masyarakat.login_register.register');
    }

    // proses registrasi
    public function proses_register(Request $request)
    {
      $request->validate([
        'nik' => 'required|size:15',
        'nama' => 'required',
        'username' => 'required',
        'password' => 'required',
        'telp' => 'required|numeric'
      ]);
      
      if($request->wilayah != 'Pilih Wilayah'){
      $masyarakat = new Masyarakat;

      $masyarakat->nik = $request->nik;
      $masyarakat->nama = $request->nama;
      $masyarakat->username = $request->username;
      $masyarakat->password = bcrypt($request->password);
      $masyarakat->telp = $request->telp;
      $masyarakat->id = $request->nik;
      $masyarakat->is_active = '1';
      $masyarakat->save();
      return redirect('/login')->with('register-success', 'Berhasil terdaftar');
      }else{
        echo "<script>alert('Isi wilayah');window.history.back(-1);</script>";
      }
    }

    public function proses_dukung(Request $request)
    {
      $dukungan = new Dukungan;
      $dukungan->nik = $request->nik;
      $dukungan->id_pengaduan = $request->id_pengaduan;
      $dukungan->status = 'disable';
      $dukungan->save();
    }

    // logout

    public function logout(){
      Auth::guard('masyarakat')->logout();
      return redirect('/login')->with('logout', 'Logout Berhasil');
    }
    
    // jumlah komentar
    public function JumlahKomentar()
    {
      $data = DB::table('tanggapan')->join('petugas', 'tanggapan.id_petugas', '=', 'petugas.id_petugas')->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')->select('tanggapan.*', 'pengaduan.*')->where('petugas.level', 1)->where('read', 1)->where('nik', auth()->user()->nik)->count();
      return response()->json($data);
    }

    public function KomentarAdmin()
    {
      $data = DB::table('tanggapan')->join('petugas', 'tanggapan.id_petugas', '=', 'petugas.id_petugas')->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')->select('tanggapan.*', 'pengaduan.*')->where('petugas.level', 1)->where('nik', auth()->user()->nik)->get();
      return response()->json($data);
    }

    // baca balasan
    public function BacaKomentar($id)
    {
      $data = DB::table('tanggapan')->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')->select('tanggapan.*', 'pengaduan.*')->where('nik', auth()->user()->nik)->where('id_tanggapan', $id)->get();
      return response()->json($data);
    }

    public function UpdateBaca($id)
    {
      DB::table('tanggapan')->where('id_tanggapan', $id)->update([
            'read' => '0'
        ]);
    }

}
