<link rel="stylesheet" type="text/css" href="{{ url('tema_utama/theme/datatables/datatables.min.css') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container" >
    <div class="row">
        <div class="col-md-8 for-table area-cetak" style="margin-top: 20px;">

                <div class="shadow-lg p-4 mb-12 bg-white rounded" >
                        <ul class="nav nav-tabs" style="margin-bottom: 12px; margin-top: -10px;">
                                <li class="nav-item">
                                    <a class="nav-link tmenu" link="user" href="#">User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tmenu" link="admin" href="#">Admin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tmenu" link="petugas" href="#">Petugas</a>
                                </li>
                            </ul>
                        <div class="container">
                            <div class=" align-items-center table-responsive-sm">
                            <!-- table user -->
                            <div class="user">
                                <table class="table table-striped table-bordered data">
                                
                                    <thead>
                                    <tr>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>No Hp</th>
                                        <th>Tindakan</th>                              
                                    </tr>
                                    </thead>

                                    <tbody class="tubuh-user" >
                                    
                                    </tbody>
                                </table>
                                </div>

                                <!-- admin -->
                                <div class="admin">
                                <table class="table table-striped table-bordered data">
                                
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>No Hp</th>
                                        <th>Tindakan</th>                              
                                    </tr>
                                    </thead>

                                    <tbody class="tubuh-admin" >
                                    
                                    </tbody>
                                </table>
                                </div>

                                <!-- petugas -->
                                <div class="petugas">
                                <table class="table table-striped table-bordered data">
                                
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>No Hp</th>
                                        <th>Tindakan</th>                              
                                    </tr>
                                    </thead>

                                    <tbody class="tubuh-petugas" >
                                    
                                    </tbody>
                                </table>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>

        <div class="col-md-4">
            <div class="shadow-lg p-3 mb-4 bg-white rounded" style="margin-top: 20px;">
    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control nama" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama">
                        <div class="valid-nama"></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Username">
                        <div class="valid-username"></div>
                    </div>

                    <div class="form-group password-hide">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Password">
                        <div class="valid-password"></div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Hp</label>
                        <input type="number" class="form-control hp" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan no Hp">
                        <div class='valid-hp'></div>
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Level</label>
                        <select class="form-control level">
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
    </div>
                    <button type="submit"  class="btn btn-primary daftar">Daftar</button>
                    <button type="submit"  class="btn btn-danger cancel">cancel</button>
                    <button type="submit"  class="btn btn-info update">Update</button>
            

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{url('tema_utama/theme/jquery.js')}}"></script>
<script type="text/javascript" src="{{ url('tema_utama/theme/datatables/datatables.min.js') }}"></script>
<script src="{{ url('sweetalert.js') }}"></script>
<script>
$('.user').show();
$('.admin').hide();
$('.petugas').hide();
$('.update').hide();
$('.cancel').hide();

        $('.tmenu').on('click', function(e){
                var link = $(this).attr('link');
                if (link == 'user') {
                    $('.user').show();
                    $('.admin').hide();
                    $('.petugas').hide();
                }else if(link =='admin'){
                    $('.user').hide();
                    $('.admin').show();
                    $('.petugas').hide();
                }else if(link =='petugas'){
                    $('.user').hide();
                    $('.admin').hide();
                    $('.petugas').show();
                }
                e.preventDefault();
            })
        
    var interval = setInterval(() => {
    // admin
    $.ajax({
            type: 'GET',
            url: '/admin/ambilPetugas',
            success: data =>{
            tubuh_petugas = "";
                data.forEach(dta => {
                tubuh_petugas += `
                    <tr >
                        <td>${dta.nm_petugas}</td>
                        <td>${dta.username}</td>
                        <td>${dta.tlp}</td>
                        <td>
                        <a href="#" imdbId="${dta.id_petugas}" class="badge badge-danger hapus-admin">Delete</a>
                        <a href="#" imdbId="${dta.id_petugas}" class="badge badge-info edit-admin">update</a>
                    </tr>
                    `;
                        });
            $('.tubuh-petugas').html(tubuh_petugas);
            // hapus admin
            $('.hapus-admin').on('click', function(e){
                var id = $(this).attr('imdbId')
                swal({
                    title: "Yakin?",
                    text: "Data akan di hapus",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'GET',
                            url: '/admin/hapusAdmin/'+id,
                            success: function(){
                                swal("Berhasil!", "Data Berhasil Di Hapus", "success");
                            }
                        })
                    }
                });
                e.preventDefault();
            })

            // update admin
            $('.edit-admin').on('click', function(){
                
                let id = $(this).attr('imdbId')
                $('.update').on('click', function(){
            
                let data = {
                    "nama": $('.nama').val(),
                    "username": $('.username').val(),
                    "tlp": $('.hp').val(),
                    "level": $('.level option:selected').attr('value')
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    type: 'POST',
                    url: '/admin/UpdateAdmin/'+id,
                    data: data,
                    success: function(){
                        swal("Berhasil!", "Data Berhasil Di Di Update", "success");
                    $('.nama').val('')
                    $('.username').val('')
                    $('.hp').val('')
                    $('.update').stop()
                    }
                })
                })
                
            })

            // show id admin
                $('.edit-admin').on('click', function(e){
                    let id = $(this).attr('imdbId')
                    $.ajax({
                        url: '/admin/LihatAdminId/'+id,
                        success: data =>{
                            data.forEach(dta => {
                                $('.nama').val(dta.nm_petugas);
                                $('.username').val(dta.username);
                                $('.hp').val(dta.tlp);
                                $('.password-hide').hide();
                                $('.daftar').hide();
                                $('.update').show();
                                $('.cancel').show();
                            });
                        }
                    })
                    e.preventDefault();
                })
                
                // tombol batal di click
                $('.cancel').on('click', function(){
                    $('.nama').val('');
                                $('.username').val('');
                                $('.hp').val('');
                                $('.password-hide').show();
                                $('.daftar').show();
                                $('.update').hide();
                                $('.cancel').hide();
                })
                    
                }
            })

        // admin
    $.ajax({
            type: 'GET',
            url: '/admin/ambilAdmin',
            success: data =>{
            tubuh_admin = "";
                data.forEach(dta => {
                tubuh_admin += `
                    <tr >
                        <td>${dta.nm_petugas}</td>
                        <td>${dta.username}</td>
                        <td>${dta.tlp}</td>
                        <td>
                        <a href="#" imdbId="${dta.id_petugas}" class="badge badge-danger hapus-admin">Delete</a>
                        <a href="#" imdbId="${dta.id_petugas}" class="badge badge-info edit-admin">update</a>
                        </td>
                    </tr>
                    `;
                        });
            $('.tubuh-admin').html(tubuh_admin);
            

            // hapus admin
            $('.hapus-admin').on('click', function(e){
                let id = $(this).attr('imdbId')
                swal({
                    title: "Yakin?",
                    text: "Data akan di hapus",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'GET',
                            url: '/admin/hapusAdmin/'+id,
                            success: function(){
                                swal("Berhasil!", "Data Berhasil Di Hapus", "success");
                            }
                        })
                    }
                });
                e.preventDefault();
            })

            // update admin
            $('.edit-admin').on('click', function(){
        
                var id = $(this).attr('imdbId')
                $('.update').on('click', function(){
                    var id_petugas = id;
                    console.log(id_petugas)
                var data = {
                    "nama": $('.nama').val(),
                    "username": $('.username').val(),
                    "tlp": $('.hp').val(),
                    "level": $('.level option:selected').attr('value')
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                
                $.ajax({
                    type: 'POST',
                    url: '/admin/UpdateAdmin/'+id_petugas,
                    data: data,
                    success: function(){
                        $('.edit-admin').stop()
                        swal("Berhasil!", "Data Berhasil Di Di Update", "success");
                    $('.nama').val('')
                    $('.username').val('')
                    $('.hp').val('')
                    
                    }
                })
                })
                
            })

            // show id admin
                $('.edit-admin').on('click', function(e){
                    var id = $(this).attr('imdbId')
                    $.ajax({
                        url: '/admin/LihatAdminId/'+id,
                        success: data =>{
                            data.forEach(dta => {
                                $('.nama').val(dta.nm_petugas);
                                $('.username').val(dta.username);
                                $('.hp').val(dta.tlp);
                                $('.password-hide').hide();
                                $('.daftar').hide();
                                $('.update').show();
                                $('.cancel').show();
                            });
                        }
                    })
                    e.preventDefault();
                })
                
                // tombol batal di click
                $('.cancel').on('click', function(){
                    $('.nama').val('');
                                $('.username').val('');
                                $('.hp').val('');
                                $('.password-hide').show();
                                $('.daftar').show();
                                $('.update').hide();
                                $('.cancel').hide();
                })
                }
            })
    // user
    $.ajax({
        url: '/admin/dataUser',
        success: data=> {
            let tubuh_user = '';
            data.forEach(dta => {
                if (dta.is_active == 0) {
                    tubuh_user += `
                <tr>
                    <td>${dta.nik}</td>
                    <td>${dta.nama}</td>
                    <td>${dta.username}</td>
                    <td>${dta.telp}</td>
                    <td>
                    <a href="" imdbId="${dta.nik}" class="badge badge-info Unblock">Unblock</a>
                    <a href="" imdbId="${dta.nik}" class="badge badge-danger hapus">Delete</a></td>
                </tr>
                `;
                }else{
                    tubuh_user += `
    
                <tr >
                    <td>${dta.nik}</td>
                    <td>${dta.nama}</td>
                    <td>${dta.username}</td>
                    <td>${dta.telp}</td>
                    <td>
                    <a href="" imdbId="${dta.nik}" class="badge badge-warning block">Block</a>
                    <a href="" imdbId="${dta.nik}" class="badge badge-danger hapus">Delete</a></td>
                </tr>
                `;
                }
                
            });
            $('.tubuh-user').html(tubuh_user);

            // hapus user
            $('.hapus').on('click', function(e){
                var id = $(this).attr('imdbId')
                swal({
                    title: "Yakin?",
                    text: "User akan di hapus",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'GET',
                            url: '/admin/hapusUser/'+id,
                            success: function(){
                                swal("Berhasil!", "Data Berhasil Di Hapus", "success");
                            }
                        })
                    }
                });
                e.preventDefault();
            })

            // block user
            $('.block').on('click', function(e){
                var id = $(this).attr('imdbId');

                swal({
                    title: "Yakin?",
                    text: "User akan di block",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willBlock) => {
                    if (willBlock) {
                        $.ajax({
                            type: 'GET',
                            url: '/admin/blockUser/'+id,
                            success: function(){
                                console.log('ok')
                            }
                        })
                    }
                });

                e.preventDefault();
            })

            // un block user

            $('.Unblock').on('click', function(e){
                var id = $(this).attr('imdbId')
                swal({
                    title: "Yakin?",
                    text: "Block User akan hilang",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willBlock) => {
                    if (willBlock) {
                        $.ajax({
                            type: 'GET',
                            url: '/admin/UnBlockUser/'+id,
                            success: function(){
                                console.log('ok')
                            }
                        })
                    }
                });
                e.preventDefault();
            })

            // link menu
            
        }
    })
}, 1000);
    

    $('.daftar').on('click', function(){
        var nama = $('.nama').val().length;
        var username = $('.username').val().length;
        var password = $('.password').val().length;
        var hp = $('.hp').val().length;
        if (nama == 0) {
            var valid_nama = '<small id="emailHelp" class="form-text text-danger">form nama harus diisi.</small>';
            $('.valid-nama').html(valid_nama);
            $('.nama').addClass('is-invalid');
            
        }else if (username == 0) {
            var valid_username = '<small id="emailHelp" class="form-text text-danger">form username harus diisi.</small>';
            $('.valid-username').html(valid_username);
            $('.username').addClass('is-invalid');
        }else if(password < 5){
            var valid_password = '<small id="emailHelp" class="form-text text-danger">password harus lebih dari 5 huruf.</small>';
            $('.valid-password').html(valid_password);
            $('.password').addClass('is-invalid');
        }else if (hp == 0) {
            var valid_hp = '<small id="emailHelp" class="form-text text-danger">form no harus Hp </small>';
            $('.valid-hp').html(valid_hp);
            $('.hp').addClass('is-invalid');
        }else{
        
            var data = {
                    "nama": $('.nama').val(),
                    "username": $('.username').val(),
                    "password": $('.password').val(),
                    "tlp": $('.hp').val(),
                    "level": $('.level option:selected').attr('value')
                }
            
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })

            $.ajax({
                type: 'POST',
                url: '/admin/addPerson',
                data: data,
                success: function(){
                    swal("Berhasil!", "Data Berhasil Di simpan", "success");
                    // nama
                    $('.valid-nama').html('');
                    $('.nama').removeClass('is-invalid');
                    $('.nama').val('');
                    // username
                    $('.valid-username').html('');
                    $('.username').removeClass('is-invalid');
                    $('.username').val('');
                    // passoword
                    $('.valid-password').html('');
                    $('.password').removeClass('is-invalid');
                    $('.password').val('');
                    // hp
                    $('.valid-hp').html('');
                    $('.hp').removeClass('is-invalid');
                    $('.hp').val('');

                }
            })
        }
    })
    
    $('.data').DataTable();

    
        
    
</script>
