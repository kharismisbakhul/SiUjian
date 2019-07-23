// mahasiswa
$('.detail').on('click', function () {
    let id = $(this).data('id');
    $.ajax({

        url: 'http://localhost/SiUjian/mahasiswa/getDetailPublikasi/' + id,
        method: 'get',
        dataType: 'json',
        beforeSend: function () {
            $('.loader').attr('src', 'http://localhost/SiUjian/assets/img/loader2.gif')
        },
        success: function (data) {
            $('.loader').hide()
            $('#judulArtikel').html(data.judulArtikel);
            $('#namaJurnal').html(data.namaJurnal);
            $('#kategoriJurnal').html(data.kategoriJurnal);
            $('#statusJurnal').html(data.statusJurnal);
            $('#tanggal').html(data.tanggal);
            $('#volumeDanNoTerbitan').html(data.volumeDanNoTerbitan);
            $('#valid').html(data.valid);
            $('#bukti').html(data.bukti);
            $('#bukti').attr('href', 'http://localhost/SiUjian/assets/publikasi/' + data.bukti);

        }
    });
})

$('.cls').on('click', function () {
    $('.loader').show();
    $('#judulArtikel').html('');
    $('#namaJurnal').html('');
    $('#kategoriJurnal').html('');
    $('#statusJurnal').html('');
    $('#tanggal').html('');
    $('#volumeDanNoTerbitan').html('');
    $('#valid').html('');
    $('#bukti').html('');
    $('#bukti').attr('')
})


$('.detail-ujian').on('click', function () {
    let id = $(this).data('id');
    $('.dosen-penguji').remove();
    let url = $(location).attr('href');
    let segments = url.split('/');
    let action = segments[4];
    let controllers = 'mahasiswa';
    if (action == 'operator' || action == 'admin') {

    }
    console.log(action);
    $.ajax({
        url: 'http://localhost/SiUjian/mahasiswa/getDetailUjian/' + id,
        method: 'get',
        dataType: 'json',
        beforeSend: function (jqXHR, options) {
            $('.test').hide();
            $('.modal-body').append(`
				<div class="dosen-penguji" style="height:550px">
					<img src="http://localhost/SiUjian/assets/img/loader.gif" class="transis rounded mx-auto d-block" style="width:80%;">
				</div>
				`);
            setTimeout(function () {
                // null beforeSend to prevent recursive ajax call
                $.ajax($.extend(options, {
                    beforeSend: $.noop
                }));
            }, 500);
            // $('dosen-penguji').addClass('hilang');
            return false;

        },
        success: function (data) {
            $('.test').show();
            $('.dosen-penguji').remove();
            $('#nama_ujian').html(': ' + data['ujian'].nama_ujian);
            $('#nilai').html(': ' + data['ujian'].nilai_akhir);
            $('#tgl_ujian').html(': ' + data['ujian'].tgl_ujian);
            $('#nilai-akhir').html(data['ujian'].nilai_akhir)
            if (data['ujian'].statusUjian == 2) {
                $('.statusUjian').html('Proses');
                $('.statusUjian').addClass('badge badge-pill badge-primary');
            } else if (data['ujian'].statusUjian == 1) {
                $('.statusUjian').html('Lulus');
                $('.statusUjian').addClass('badge badge-pill badge-success');
            } else {
                $('.statusUjian').html('Tidak Lulus');
                $('.statusUjian').addClass('badge badge-pill badge-danger');
            }
            if (data['ujian'].valid == 2) {
                $('.valid').html('Proses');
                $('.valid').addClass('badge badge-pill badge-primary');
            } else if (data['ujian'].valid == 1) {
                $('.valid').html('Valid');
                $('.valid').addClass('badge badge-pill badge-success');
            } else {
                $('.valid').html('Tidak Valid');
                $('.valid').addClass('badge badge-pill badge-danger');
            }

            $('#komentar').html(': ' + data['ujian'].komentar);
            $('#bobot').html(': ' + data['ujian'].bobot);
            $('#bukti').html(': ' + data['ujian'].bukti);
            $('#bukti').attr('href', 'http://localhost/SiUjian/assets/ujian/' + data['ujian'].bukti);
            let i = 1;
            data['penguji'].forEach(function (p) {
                $('.penguji').append(`
				<tr class="dosen-penguji">
					<th scope="row">` + (i++) + `</th>
					<td>` + p.nama_dosen + `</td>
					<td>` + p.status_dosen + `</td>
					<td>` + p.nilai + `</td>
				</tr>
				`);
            })

        }
    });
})

// akhir mahasiswa