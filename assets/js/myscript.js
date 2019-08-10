var url = $(location).attr("href");
var segments = url.split("/");

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


$('.privileges').on('change', function () {
	// alert("<?php echo $aa; ?>");
	$.ajax({
		url: segments[0] + '/SiUjianTemp/admin/getListProdi',
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
		url: segments[0] + '/SiUjian/dosen/getDetailUjian/' + id,
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

// dataTable Dosen
$(document).ready(function () {
	$('#dataTablePublikasi').DataTable({
		initComplete: function () {
			this.api().columns([3, 4, 6, 7]).every(function () {
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

// dataTable Dosen-operator
$(document).ready(function () {
	$('#dataTableLaporanMhs').DataTable({
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
// akhir dataTable Dosen-operator
