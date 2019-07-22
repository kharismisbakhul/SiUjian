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

		url: 'http://localhost:8080/SiUjian/mahasiswa/getDetailPublikasi/' + id,
		method: 'get',
		dataType: 'json',
		beforeSend: function () {
			$('.loader').attr('src', 'http://localhost:8080/SiUjian/assets/img/loader2.gif')
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
			$('#bukti').attr('href', 'http://localhost:8080/SiUjian/assets/publikasi/' + data.bukti);

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
		url: 'http://localhost:8080/SiUjian/mahasiswa/getDetailUjian/' + id,
		method: 'get',
		dataType: 'json',
		beforeSend: function (jqXHR, options) {
			$('.test').hide();
			$('.modal-body').append(`
				<div class="dosen-penguji" style="height:550px">
					<img src="http://localhost:8080/SiUjian/assets/img/loader.gif" class="transis rounded mx-auto d-block" style="width:80%;">
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
			$('#bukti').attr('href', 'http://localhost:8080/SiUjian/assets/ujian/' + data['ujian'].bukti);
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

// Operator
$('.info').on('click', function () {
	$('#penguji').remove();
	$('#loader').remove();
	let id = $(this).data('id');
	$.ajax({
		url: 'http://localhost:8080/SiUjian/operator/getInfoPenguji/' + id,
		method: 'get',
		dataType: 'json',
		beforeSend: function () {
			$('#jadwal-dosen').append(`
				<div id="loader">
					<img src="http://localhost:8080/SiUjian/assets/img/loader_fix.gif" style="width: 50%" class="rounded mx-auto d-block">
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
							<img src="http://localhost:8080/SiUjian/assets/img/profile/237627.jpg" class="rounded mx-auto d-block img-thumbnail card-img-top" style="width: 50%">
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
							<img src="http://localhost:8080/SiUjian/assets/img/profile/237627.jpg" class="rounded mx-auto d-block img-thumbnail card-img-top" style="width: 50%">
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




$('.privileges').on('change', function () {
	// alert("<?php echo $aa; ?>");
	$.ajax({
		url: 'http://localhost:8080/SiUjianTemp/admin/getListProdi',
		method: 'get',
		dataType: 'json',

		success: function (data) {
			var d = [];
			for (i = 0; i < data.length; i++) {
				d.push(data[i]['nama_prodi']);
			}
			if ($('.privileges').val() === "Mahasiswa") {
				clear();
				$('.a').addClass('form-group row');
				$('.a').append(`
                <label for= "prodi" class= "col-sm-4 col-form-label" >Prodi</label >
                    <div class="col-sm-8">
                        <select class="form-control listProdi" name="prodi" id="prodi" placeholder="prodi">
                        </select>
                        </div>`);
				d.forEach(myFunction);
			} else if ($('.privileges').val() === "Dosen") {
				clear();
				$('.a').addClass('form-group row');
				$('.a').append(`
                        <label for= "jenjang" class= "col-sm-4 col-form-label" >Jenjang</label >
                            <div class="col-sm-8">
                                <select class="form-control jenjang" name="jenjang" id="jenjang">
                                <option>S2</option>
                                <option>S3</option>
                                </select>
                                </div>`);
			} else {
				clear();
			}
		}
	})
});

function clear() {
	$('.a').removeClass('form-group row');
	$('.a').html(``);
}

function myFunction(item) {
	document.getElementById("prodi").innerHTML += `<option>` + item + `</option>`;
}


// Script Dosen

//  nilai
$('.input-nilai').on('click', function () {
	let id = $(this).data('id');
	let nip = $('#nip').val();
	let url = $(location).attr('href');
	let segments = url.split('/');
	let action = segments[7];
	$('.daftar-penguji').remove();
	$('.daftar-pembimbing').remove();
	$.ajax({
		url: 'http://localhost:8080/SiUjian/dosen/getDetailUjian/' + id,
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


			console.log(action)
			let i = 1;
			data['penguji'].forEach(function (p) {

				if (p.nip == nip || p.nip == action) {
					$('#idPenguji').val(p.id)
					$('#ujian').val(p.Ujianid)
					$('.inputNilai').val(p.nilai)
					$('#operator-nip').val(p.nip)
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
// akhir nilai

// bimbingan
$('.info-bimbingan').on('click', function () {
	let nim = $(this).data('nim');
	$('.list-ujian').remove();
	$('.list-pembimbing').remove();
	$('.list-publikasi').remove();
	$.ajax({
		url: 'http://localhost:8080/SiUjian/dosen/getDetailBimbingan/' + nim,
		method: 'get',
		dataType: 'json',
		success: function (data) {
			$('#nama-bimbingan').html(data['user'].nama)
			let i = 1;
			let td;
			data['ujian'].forEach(function (p) {
				if (p.statusUjian == 1) {
					td = `<td class="text-success font-weight-bold">Lulus</td>`
				} else if (p.statusUjian == 2) {
					td = `<td class="text-primary font-weight-bold">Proses</td>`
				} else {
					td = `<td class="text-danger font-weight-bold">Tidak Lulus</td>`
				}
				$('.ujian').append(`
				<tr class="list-ujian">
				<td>` + (i++) + `</td>
				<td>` + p.nama_ujian + `</td>
				<td>` + p.tgl_ujian + `</td>
				` + td + `
				<td>` + p.bobot + `</td>
				<td>` + p.nilai_akhir + `</td>
				</tr>`);
			})
			$('#nama').html(data['user'].nama)
			$('#nim').html(data['user'].nim)
			$('#nama_jurusan').html(data['fakultas'].nama_jurusan)
			$('#nama_prodi').html(data['fakultas'].nama_prodi)
			$('#angkatan').html(data['user'].angkatan)
			$('#konsentrasi').html(data['user'].konsentrasi)
			$('#alamat').html(data['user'].alamat)
			$('#noTelp').html(data['user'].noTelp)
			$('#asalStudi').html(data['user'].asalStudi)
			$('#tglMulaiTA').html(data['user'].tglMulaiTA)


			let j = 1;
			data['pembimbing'].forEach(function (p) {
				$('.pembimbing').append(`
				<tr class="list-pembimbing">
					<th scope="row">` + (j++) + `</th>
					<td>` + p.nama_dosen + `</td>
					<td>Pembimbing ` + p.statusPembimbing + `</td>
				</tr>
				`)
			})
			let k = 1;
			data['publikasi'].forEach(function (p) {
				$('.publikasi').append(`
				<tr class="list-publikasi">
					<th scope="row">` + (k++) + `</th>
					<td>` + p.judulArtikel + `</td>
					<td>` + p.statusJurnal + `</td>
				</tr>
				`)
			})
		}
	})
});

// akhir bimbingan



// akhir dosen

// dataTable Ujian-operator
$(document).ready(function () {
	$('#test').DataTable({
		initComplete: function () {
			this.api().columns([3, 4, 5, 6]).every(function () {
				var column = this;
				var select = $('<select class="form-control-sm" ><option value=""></option></select>')
					.appendTo($(column.footer()).empty())
					.on('change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search(val ? '^' + val + '$' : '', true, false)
							.draw();
					});
				console.log(select);

				column.data().unique().sort().each(function (d, j) {
					select.append('<option value="' + d + '">' + d + '</option>')
				});
			});
		}
	});
});
// akhir dataTable Ujian-operator

// dataTable Dosen-operator
$(document).ready(function () {
	$('#dataTableDosen').DataTable({
		initComplete: function () {
			this.api().columns([1, 3, 4]).every(function () {
				var column = this;
				var select = $('<select class="form-control-sm" ><option value=""></option></select>')
					.appendTo($(column.footer()).empty())
					.on('change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search(val ? '^' + val + '$' : '', true, false)
							.draw();
					});
				console.log(select);

				column.data().unique().sort().each(function (d, j) {
					select.append('<option value="' + d + '">' + d + '</option>')
				});
			});
		}
	});
});
// akhir dataTable Dosen-operator

// dataTable Dosen
$(document).ready(function () {
	$('#dataTableBimbingan').DataTable({
		initComplete: function () {
			this.api().columns([3, 4, 5, 6]).every(function () {
				var column = this;
				var select = $('<select class="form-control-sm" ><option value=""></option></select>')
					.appendTo($(column.footer()).empty())
					.on('change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search(val ? '^' + val + '$' : '', true, false)
							.draw();
					});
				console.log(select);

				column.data().unique().sort().each(function (d, j) {
					select.append('<option value="' + d + '">' + d + '</option>')
				});
			});
		}
	});
});
// akhir dataTable Dosen
