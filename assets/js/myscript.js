$(window).on('load', function () {
	$('.tombol').addClass('pMuncul');
	$('.box').addClass('bMuncul');
	$('.box2').addClass('bMuncul');

	$('.dftr').each(function (i) {
		setTimeout(function () {
			$('.dftr').eq(i).addClass('muncul');
		}, 300 * (i + 1));
	});

})

$('.custom-file-input').on('change', function () {
	let fileName = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass("selected").html(fileName);
});
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
				$('#statusUjian').html(': PROSES');
			}
			$('#valid').html(': ' + data['ujian'].valid);
			$('#komentar').html(': ' + data['ujian'].komentar);
			$('#bobot').html(': ' + data['ujian'].bobot);
			$('#bukti').html(': ' + data['ujian'].bukti);
			$('#bukti').attr('href', 'http://localhost/SiUjian/assets/ujian/' + data['ujian'].bukti);

			data['penguji'].forEach(function (p) {
				$('.penguji').append(`
				<tr class="dosen-penguji">
					<th scope="row"></th>
					<td>` + p.nama_dosen + `</td>
					<td>Penguji ` + p.statusPenguji + `</td>
					<td>` + p.nilai + `</td>
				</tr>
				`);
			})

		}
	});
})

// $('.cls').on('click', function () {
// 	$('.dosen-penguji').remove();
// })


// akhir mahasiswa

// Operator
$('.info').on('click', function () {
	$('#penguji').remove();
	$('#loader').remove();
	let id = $(this).data('id');
	$.ajax({
		url: 'http://localhost/SiUjian/operator/getInfoPenguji/' + id,
		method: 'get',
		dataType: 'json',
		beforeSend: function () {
			$('#jadwal-dosen').append(`
				<div id="loader">
					<img src="http://localhost/SiUjian/assets/img/loader_fix.gif" style="width: 50%" class="rounded mx-auto d-block">
				</div>	
			`);

		},
		success: function (data) {
			$('#penguji').remove();
			$('#loader').remove();
			if (data.length != 0) {
				data.forEach(function (p) {
					$('#jadwal-dosen').append(`
						<div class="card" id="penguji" style="width:120%;">
							<h5 class="text-center">test</h5>
							<img src="http://localhost/SiUjian/assets/img/profile/237627.jpg" class="rounded mx-auto d-block img-thumbnail card-img-top" style="width: 50%">
							<div class="card-body">
								<table class="table table-bordered text-center" id="kuy" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>#</th>
											<th>Tanggal Ujian</th>
											<th>Jenis Ujian</th>
											<th>Status Penguji</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td>` + p.tgl_ujian + `</td>
											<td>` + p.nama_ujian + `</td>
											<td>Penguji ` + p.statusPenguji + `</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>	
					`);
				})
			} else {
				$('#jadwal-dosen').append(`
						<div class="card" id="penguji" style="width:120%;">
							<h5 class="text-center">test</h5>
							<img src="http://localhost/SiUjian/assets/img/profile/237627.jpg" class="rounded mx-auto d-block img-thumbnail card-img-top" style="width: 50%">
							<div class="card-body">
								<p>Tidak Ada Jadwal Ujian Dosen</p>
							</div>
						</div>	
					`);
			}

			$(document).ready(function () {
				$('#kuy').DataTable();
			});
		}
	});

})

$('.cls').on('click', function () {
	$('.loader').show();
	$('#penguji').remove();
})
// akhir Operator

// Script Dosen

$('.input-nilai').on('click', function () {
	let id = $(this).data('id');
	let nip = $('#nip').val();

	$('.daftar-penguji').remove();
	$.ajax({
		url: 'http://localhost/SiUjian/dosen/getDetailUjian/' + id,
		method: 'get',
		dataType: 'json',
		success: function (data) {
			var nilai_akhir = data['ujian'].nilai_akhir
			$('.namaMahasiswa').val(data['ujian'].nama)
			$('.namaMahasiswa').html(data['ujian'].nama)
			$('#nomorInduk').val(data['ujian'].nim)
			$('#judulTA').val(data['ujian'].judulTugasAkhir)
			$('#jenisUjian').val(data['ujian'].nama_ujian)
			$('#tanggalUjian').val(data['ujian'].tgl_ujian)
			$('#bobotNilai').val(data['ujian'].bobot)
			$('#nilai_akhir').html(nilai_akhir)


			let i = 1;
			data['penguji'].forEach(function (p) {
				if (p.nip == nip) {
					$('#idPenguji').val(p.id)
					$('#ujian').val(p.Ujianid)
					$('#inputNilai').val(p.nilai)
				}
				$('.penguji').append(`
				<tr class="daftar-penguji">
					<td>` + (i++) + `</td>
					<td>Penguji ` + p.statusPenguji + `</td>
					<td>` + p.nama_dosen + `</td>
					<td>` + p.nilai + `</td>
				</tr>
				`)

			})
			let j = 1;
			data['pembimbing'].forEach(function (p) {
				$('.pembimbing').append(`
				<tr class="daftar-pembimbing">
					<td>` + (j++) + `</td>
					<td>Pembimbing ` + p.statuspembimbing + `</td>
					<td>` + p.nama_dosen + `</td>
				</tr>
				`)
			})
		}
	})
});
// akhir dosen