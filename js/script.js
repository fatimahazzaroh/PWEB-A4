$(function() {  
    $('.tombolTambahDataKamar').on('click', function() {
        $$('#formModalKamarLabel').html('Tambah Data Kamar');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#jenis_kamar').val('');
        $('#harga').val('');
        $('#deskripsi').val('');
    });

    $('.tampilModalUbah').on('click', function(){
        
        $('#formModalKamarLabel').html('Ubah Data Kamar');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/PWEB-A9/kamar/updateKamar')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/PWEB-A9/kamar/getKamarById',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#jenis_kamar').val(data.jenis_kamar);
                $('#harga').val(data.harga);
                $('#deskripsi').val(data.deskripsi);
                $('#id').val(data.id);
            }
        })
    });
});