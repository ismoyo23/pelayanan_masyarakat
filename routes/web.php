<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//untuk user 
Route::get('/', 'HomeController@index');
// login
Route::get('/login', 'HomeController@view_login');
Route::get('/midleware', function(){
    return back();
})->name('login');
Route::post('/proses_login', 'HomeController@proses_login');
// register
Route::get('/register', 'HomeController@view_register');
Route::post('/proses_register', 'HomeController@proses_register');

// mengirim laporan
Route::group(['middleware' => 'auth:masyarakat'], function(){
    Route::get('/home', 'HomeController@home');
    Route::post('/home/kirim_laporan', 'HomeController@kirim_laporan');
    Route::get('/view/support/{id}', 'HomeController@view_support');
    Route::get('/view/support_ku/{id}', 'HomeController@view_support_ku');
    Route::get('/api/get_lapor/{id}', 'HomeController@api_lapor');

    Route::get('api/KomentarAdmin/{id}', 'HomeController@LihatKomentarAdmin');

    // jumlah komentar
    Route::get('/home/JumlahKomentar', 'HomeController@JumlahKomentar');
    Route::get('/home/KomentarAdmin', 'HomeController@KomentarAdmin');

    // baca balasan
    Route::get('/home/BacaKomentar/{id}', 'HomeController@BacaKomentar');
    Route::get('/home/UpdateBaca/{id}', 'HomeController@UpdateBaca');
    
});

// logout
Route::get('/logout', "HomeController@logout");


// Admin
Route::get('/admin', 'AdminController@view_login');
Route::post('/admin/proses_login', 'AdminController@proses_login');
Route::group(['middleware' => 'auth:admin'], function(){
Route::get('/admin/home', 'AdminController@home');
Route::get('/admin/utama', 'AdminController@utama');
Route::get('/admin/verify/{id}', 'AdminController@verify');

// Ambil data masyarakat yang belum di verifikasi / ambil laporan
Route::get('/admin/AmbilDataMasyarakat', 'AdminController@AmbilDataMasyarakat');

// Ambil data masyarakat yang sudah di verifikasi / ambil laporan
Route::get('/admin/AmbilDataMasyarakatVerify', 'AdminController@AmbilDataMasyarakatVerify');

// melihat detail laporan
Route::get('/admin/lihatLapor/{id}', 'AdminController@lihat_lapor');
Route::get('/admin/lihatDukung/{id}', 'AdminController@lihat_dukung');

Route::post('/admin/kirimTanggapan', 'AdminController@kirim_tanggapan');
Route::get('/admin/tanggapan_ku/{id}', 'AdminController@tanggapan_ku');

// ubah tangggapan
Route::get('/admin/UbahTanggapan/{id}/{data}', 'AdminController@UbahTanggapan');
Route::get('/petugas/UbahTanggapan/{id}/{data}', 'AdminController@UbahTanggapan');

Route::get('/admin/idTanggapanKu/{id}', 'AdminController@idTanggapanKu');
Route::get('/admin/hapusTanggapan/{id}', 'AdminController@hapusTanggapan');
Route::post('admin/updateTanggapan', 'AdminController@updateTanggapan');

Route::get('/admin/hapusLaporan/{id}', 'AdminController@hapusLaporan');
Route::get('/admin/jumlahUser', 'AdminController@JumlahUser');
Route::get('/admin/ReportVerify', 'AdminController@ReportVerify');
Route::get('/admin/ReportNoVerify', 'AdminController@ReportNoVerify');
// menu laporan
Route::get('/admin/laporan', 'AdminController@view_laporan');
Route::get('rangeTanggalAll', 'AdminController@rangeTanggalAll');
Route::get('/rangeTanggal/{awal}/{akir}/{status}', 'AdminController@rangeTanggal');

// print laporan
Route::get('/print/All', 'AdminController@printAll');
Route::get('/print/{awal}/{akir}/{status}', 'AdminController@print');

// menu petugas
Route::get('/admin/dataPetugas', 'AdminController@dataPetugas');
Route::post('/admin/addPerson', 'AdminController@addPerson');
Route::get('/admin/dataUser', 'AdminController@dataUser');
Route::get('/admin/hapusUser/{id}', 'AdminController@hapusUser');
Route::get('/admin/blockUser/{id}', 'AdminController@blockUser');
Route::get('/admin/UnBlockUser/{id}', 'AdminController@UnBlockUser');
Route::get('/admin/cariDataUser/{cari}', 'AdminController@cariDataUser');
Route::get('/admin/ambilAdmin', 'AdminController@ambilAdmin');
Route::get('/admin/ambilPetugas', 'AdminController@ambilPetugas');
Route::get('/admin/hapusAdmin/{id}', 'AdminController@hapusAdmin');
Route::get('/admin/LihatAdminId/{id}', 'AdminController@LihatAdminId');
Route::post('/admin/UpdateAdmin/{id}', 'AdminController@UpdateAdmin');


// petugas
Route::get('/petugas/home', 'PetugasController@home');
Route::get('/petugas/utama', 'PetugasController@utama');

// ambil laporan dari masyarakat / belum diproses / masuk
Route::get('/petugas/LaporanMasuk', 'PetugasController@LaporanMasuk');
Route::get('/petugas/LihatLaporan/{id}', 'PetugasController@Lihatlaporan');

// tanggapan petugas
Route::get('petugas/LihatTanggapan/{id}', 'PetugasController@LihatTanggapan');

Route::get('/petugas/LihatTanggapanId/{id}', 'PetugasController@LihatTanggapanId');

// tindakan laporan
Route::get('/petugas/ProsesLaporan/{id}', 'PetugasController@LaporanProses');
Route::get('/petugas/LaporanSelesai/{id}', 'PetugasController@LaporanSelesai');
// ambil data laporan sudah selesai
Route::get('/petugas/LaporanSudahSelesai', 'PetugasController@LaporanSudahSelesai');

Route::get('petugas/PermasalahanTuntas', 'PetugasController@PermasalahanTuntas');


});



Route::post('/home/proses_dukung', 'HomeController@proses_dukung');

Route::get('/admin/logout', "AdminController@logout");




