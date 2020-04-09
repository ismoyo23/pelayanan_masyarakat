$(function () {
    $('.dashboard').addClass('menu-active')
    $('.menu').on('click', function () {
        var menu = $(this).attr('href');
        if (menu == '#home') {
            $('.komen-android').removeClass('menu-active')
            $('.dashboard').addClass('menu-active')
            $('.user-guide').removeClass('menu-active')
            $('.komentar').removeClass('menu-active')
            $('.comentar-android').removeClass('menu-active')
        } else if (menu == "#user-guide") {
            $('.comentar-android').removeClass('menu-active')
            $('.dashboard').removeClass('menu-active')
            $('.user-guide').addClass('menu-active')
            $('.komentar').removeClass('menu-active')
            $('.komen-android').removeClass('menu-active')
            $('.list-menu').hide();
           
        } else if (menu == "#komen") {
            $('.dashboard').removeClass('menu-active')
            $('.user-guide').removeClass('menu-active')
            $('.komentar').addClass('menu-active')
            $('.komen-android').addClass('menu-active')

        }

    })

    $('.u').on('click', function(e){
        e.preventDefault()
         $('.comentar-android').removeClass('menu-active')
    })

    $('.closes').on('click', function () {
        location.reload();
    })

    $('.comentar-android').on('click', function(e){
        e.preventDefault();
        $('.comentar-android').addClass('menu-active')
        $('.list-menu').show();

        setInterval(() => {

            $.ajax({
                url: '/home/KomentarAdmin',
                success: data => {
                    let komentar_admin = "";
                    data.forEach(d => {
                        komentar_admin += `
                        <a href="${d.id_pengaduan}" class="balasan" data-toggle="modal" style="text-decoration:none;" data-target="#lihat-komen">
                            <li class="list-group-item" style="height: 59px;">Balasan<br>
                                <p style="color: rgb(197, 191, 191); font-size: 12px;">${d.tanggapan}</p>
                            </li>
                        </a>
                `;
                    });
                    $('.komentar-admin').html(komentar_admin);

                    


                    $('.balasan').on('click', function (e) {
                        var id = $(this).attr('href');
                        $.ajax({
                            url: '/api/KomentarAdmin/' + id,
                            success: data => {
                                let komentar_admin = '';
                                data.forEach(d => {
                                    komentar_admin += `
                                        <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">${d.isi_laporan}</h5>
                                                <small class="text-muted">${d.tgl_pengaduan}</small>
                                                </div>
                                                <p class="mb-1">${d.tanggapan}</p>
                                                <small class="text-muted">from ${d.level}</small>
                                                <input type="hidden" class="baca" value="${d.id_tanggapan}"/>
                                            </a>
                                    `;
                                });
                                $('.see-koment').html(komentar_admin);

                                var id = $('.baca').val();
                                console.log(id)
                                $.ajax({
                                    url: '/home/UpdateBaca/'+id,
                                    success: data => {

                                    }
                                })

                            }

                        })
                        e.preventDefault();
                    })
                }
            })

        }, 1000);
    })



    $('.list-menu').hide();

    $('.komen-android').on('click', function(e){
        e.preventDefault();
        $('.list-menu').show();

        setInterval(() => {

            $.ajax({
                url: '/home/KomentarAdmin',
                success: data => {
                    let komentar_admin = "";
                    data.forEach(d => {
                        komentar_admin += `
                        <a href="${d.id_pengaduan}" class="balasan" data-toggle="modal" style="text-decoration:none;" data-target="#lihat-komen">
                            <li class="list-group-item" style="height: 59px;">Balasan<br>
                                <p style="color: rgb(197, 191, 191); font-size: 12px;">${d.tanggapan}</p>
                            </li>
                        </a>
                `;
                    });
                    $('.komentar-admin').html(komentar_admin);

                    


                    $('.balasan').on('click', function (e) {
                        var id = $(this).attr('href');
                        $.ajax({
                            url: '/api/KomentarAdmin/' + id,
                            success: data => {
                                let komentar_admin = '';
                                data.forEach(d => {
                                    komentar_admin += `
                                        <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">${d.isi_laporan}</h5>
                                                <small class="text-muted">${d.tgl_pengaduan}</small>
                                                </div>
                                                <p class="mb-1">${d.tanggapan}</p>
                                                <small class="text-muted">from ${d.level}</small>
                                                <input type="hidden" class="baca" value="${d.id_tanggapan}"/>
                                            </a>
                                    `;
                                });
                                $('.see-koment').html(komentar_admin);

                                var id = $('.baca').val();
                                console.log(id)
                                $.ajax({
                                    url: '/home/UpdateBaca/'+id,
                                    success: data => {

                                    }
                                })

                            }

                        })
                        e.preventDefault();
                    })
                }
            })

        }, 1000);
    })

    $('.ambil-data').on('click', function () {

        console.log($(this).data('imdb'))
        $.ajax({
            url: '/api/KomentarAdmin/' + $(this).data('imdb'),
            success: data => {
                    let komentar_admin = '';
                    data.forEach(d => {
                        komentar_admin += `
                                        <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">${d.nm_petugas}</h5>
                                                <small class="text-muted">${d.tgl_pengaduan}</small>
                                                </div>
                                                <p class="mb-1">${d.tanggapan}.</p>
                                            </a>
                                    `;
                    });
                    $('.komentarnya-admin').html(komentar_admin);

            }

        })


        $.ajax({
            url: "/api/get_lapor/" + $(this).data('imdb'),
            success: data => {
                const dta = data;
                let body = '';
                dta.forEach(m => {
                    body += `<nav class="navbar navbar-light bg-light" >
                                    <a class="navbar-brand" href="# style="margin-top: -10px;">
                                        <span style="font-size: 17px;"> ${m.nama}, Laporan banjir </span><br>
                                        <span style="font-size: 10px; color:grey; margin-top: -4px; margin-bottom: 12px;" > Di Post, ${m.tgl_pengaduan}</span>
                                    </a>
                                </nav>
                                
                                <img width="200" height="200" src="/image/${m.foto}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text"> ${m.isi_laporan} </p> 
                                </div>
                                
                                <input type="hidden" name="id_pengaduan" id="id_pengaduan" value="${m.id_pengaduan}">
                                    

                                `;


                    $('#body').html(body);


                })

                $('.unSupport').on('click', function (e) {

                    e.preventDefault();
                })

                setInterval(() => {
                    var id = $(this).data('imdb')

                    $.ajax({
                        type: 'GET',
                        url: "/view/support_ku/" + id,
                        success: function (data) {

                            if (data > 0) {

                                $.ajax({
                                    type: 'GET',
                                    url: "/view/support/" + id,
                                    success: function (data) {
                                        isi = `<a href="#" style="margin-left: 28px; color: aqua; text-decoration: none; background-color:white; border: 1px solid white;" class="col-xs-6 "><span class="fa fa-fw fa-arrow-up"></span>` + data + ` dukungan</a>`;
                                        $('.unSupport').show();
                                        $('#simpan-suport').hide();
                                        $('.unSupport').html(isi);

                                    }

                                })

                            } else {


                                $.ajax({
                                    type: 'GET',
                                    url: "/view/support/" + id,
                                    success: function (data) {
                                        isi = `<a href="#" style="margin-left: 28px; color: grey; text-decoration: none; background-color:white; border: 1px solid white;" class="col-xs-6 "><span class="fa fa-fw fa-arrow-up"></span>` + data + ` dukungan</a>`;
                                        $('.unSupport').hide();
                                        $('#simpan-suport').show();
                                        $('#simpan-suport').html(isi);

                                    }

                                })

                            }


                        }
                    })
                }, 1000);



            },
            error: (e) => {
                console.log(e.responseText);
            }
        })


        // Code by M Ismoyo 



    })


    $('#side-bar').hide();

    $('.select2').select2()

    $('#close').hide();
    $('#upload').hide();
    $('#lampiran').click(function (e) {
        $('#upload').show();
        $('#lampiran').hide();
        $('#close').show();

        e.preventDefault();
    })

    $('#close').click(function (e) {
        $('#upload').hide();
        $('#lampiran').show();
        $('#close').hide();

        e.preventDefault();
    })

    $('.page-scroll').on('click', function (e) {

        // ambil isi href
        var tujuan = $(this).attr('href');
        // tangkap element yang bersangkutan

        var elementTujuan = $(tujuan);

        $('body').animate({
            scrollTop: elementTujuan.offset().top
        }, 1000, 'swing');

        e.preventDefault();
    })
    // side bar tampil ketika di scroll
    var lastScroll = 0,
        delta = 20;
    $(window).scroll(function () {
        var scrollingUp = $(this).scrollTop();

        if (Math.abs(lastScroll - scrollingUp) >= delta) {
            if (scrollingUp > lastScroll) {
                // keatas
                $('.komen-android').removeClass('menu-active')
                $('#side-bar').fadeIn();
                $('.list-menu').hide();
                $('.dashboard').removeClass('menu-active')
                $('.user-guide').addClass('menu-active')
            } else {
                // kebawah
                $('#side-bar').fadeOut();
                $('.dashboard').addClass('menu-active')
                $('.user-guide').removeClass('menu-active')

            }

        }
        lastScroll = scrollingUp;
    });

    $('.dashboard').on('click', function () {
        $('#side-bar').hide();
        $('.list-menu').hide();
    })

    // task menu
    $('.task-ku').show();
    $('.task-lamaku').hide();
    $('.semua-task').hide();



    $('#task-ku').on('click', function (e) {
        $('#task-lamaku').removeClass('active');
        $('#semua-task').removeClass('active');
        $('#task-ku').addClass('active');
        $('.task-lamaku').hide();
        $('.semua-task').hide();
        $('.task-ku').show();

        e.preventDefault();
    })

    $('#task-lamaku').on('click', function (e) {
        $('#task-lamaku').addClass('active');
        $('#semua-task').removeClass('active');
        $('#task-ku').removeClass('active');
        $('.task-lamaku').show();
        $('.semua-task').hide();
        $('.task-ku').hide();

        e.preventDefault();
    })

    $('#semua-task').on('click', function (e) {
        $('#task-lamaku').removeClass('active');
        $('#semua-task').addClass('active');
        $('#task-ku').removeClass('active');
        $('.task-lamaku').hide();
        $('.semua-task').show();
        $('.task-ku').hide();

        e.preventDefault();
    })

    // alert

    const flashdata = $('.flash-data').data('flashdata');

    if (flashdata) {
        swal("Laporan Terkirim!", "" + flashdata, "success");
        console.log('ok')
    }

    $('#simpan-suport').on('click', function (e) {

        var data = {
            "nik": $('#nik').val(),
            "id_pengaduan": $('#id_pengaduan').val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $.ajax({
            type: 'POST',
            data: data,
            url: "/home/proses_dukung",
            success: function () {
                console.log('ok');
            }
        })

        e.preventDefault();
    })

    // simpan support
    $('#simpan-suport').on('click', function (e) {
        var data = {
            "nik": $('#nik').val(),
            "id_pengaduan": $('#id_pengaduan').val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $.ajax({
            type: 'POST',
            data: data,
            url: "",
            success: function () {
                console.log('ok');
            }
        })

        e.preventDefault();
    })

    // jumlah komentar
    setInterval(() => {
        $.ajax({
            url: '/home/JumlahKomentar',
            success: data => {
                jumlah = "<span>" + data + "</span>";
                $('.jumlah-comentar').html(jumlah);
            }

        })


    }, 1000);

    $('.komentar').on('click', function () {
        setInterval(() => {

            $.ajax({
                url: '/home/KomentarAdmin',
                success: data => {
                    let komentar_admin = "";
                    data.forEach(d => {
                        komentar_admin += `
                        <a href="${d.id_pengaduan}" class="balasan" data-toggle="modal" style="text-decoration:none;" data-target="#lihat-komen">
                            <li class="list-group-item" style="height: 59px;">Balasan<br>
                                <p style="color: rgb(197, 191, 191); font-size: 12px;">${d.tanggapan}</p>
                            </li>
                        </a>
                `;
                    });
                    $('.komentar-admin').html(komentar_admin);

                    


                    $('.balasan').on('click', function (e) {
                        var id = $(this).attr('href');
                        $.ajax({
                            url: '/api/KomentarAdmin/' + id,
                            success: data => {
                                let komentar_admin = '';
                                data.forEach(d => {
                                    komentar_admin += `
                                        <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">${d.isi_laporan}</h5>
                                                <small class="text-muted">${d.tgl_pengaduan}</small>
                                                </div>
                                                <p class="mb-1">${d.tanggapan}</p>
                                                <small class="text-muted">from ${d.level}</small>
                                                <input type="hidden" class="baca" value="${d.id_tanggapan}"/>
                                            </a>
                                    `;
                                });
                                $('.see-koment').html(komentar_admin);

                                var id = $('.baca').val();
                                console.log(id)
                                $.ajax({
                                    url: '/home/UpdateBaca/'+id,
                                    success: data => {

                                    }
                                })

                            }

                        })
                        e.preventDefault();
                    })
                }
            })

        }, 1000);
    })

})
