$(function () {

    $('#body').load('/admin/utama');


    $('#chek').hide();
    $('.close-suspend').hide();
    $('#suspend').on('click', function (e) {
        $('#chek').show();
        $('.close-suspend').show();
        $('.open-suspend').hide();
        $('#chek2').hide();
        e.preventDefault();
    });

    $('.close-suspend').on('click', function (e) {
        $('#chek').hide();
        $('.close-suspend').hide();
        $('.open-suspend').show();
        $('#chek2').show();
        e.preventDefault();
    })
    
   
        $('.menu').on('click', function (e) {
            var id = $(this).attr('id');
            if (id == 'dashboard') {
                $('#body').load('/admin/utama');
            } else if (id == 'laporan') {
                    $('#body').load('/admin/laporan');
            } else if (id == 'petugas') {
                $('#body').load('/admin/dataPetugas');
            }
            e.preventDefault();

        })

    
})