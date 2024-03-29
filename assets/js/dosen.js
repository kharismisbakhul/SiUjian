var url = $(location).attr("href");
var segments = url.split("/");
// Script Dosen

//  nilai
$('.input-nilai').on('click', function () {
	let id = $(this).data('id');
	let nip = $('#nip').val();
	let url = $(location).attr('href');
	let segments = url.split('/');
	let action = segments[7];

	$.ajax({
		url: segments[0] + '/SiUjian/dosen/getDetailUjian/' + id,
		method: 'get',
		dataType: 'json',
		success: function (data) {
			$('.daftar-penguji').remove();
			$('.daftar-pembimbing').remove();
			var nilai_akhir = data['ujian'].nilai_akhir
			$('.namaMahasiswa').val(data['ujian'].nama)
			$('.namaMahasiswa').html(data['ujian'].nama)
			$('#nomorInduk').val(data['ujian'].nim)
			$('#judulTA').val(data['ujian'].judulAkhir)
			$('#jenisUjian').val(data['ujian'].nama_ujian)
			$('#tanggalUjian').val(data['ujian'].tgl_ujian)
			$('#bobotNilai').val(data['ujian'].bobot)
			$('#nilai_akhir').html(nilai_akhir)
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
					<td>` + p.status_dosen + `</td>
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
	console.log(nim)
	$.ajax({
		url: segments[0] + '/SiUjian/dosen/getDetailBimbingan/' + nim,
		method: 'get',
		dataType: 'json',
		success: function (data) {
			$('.list-ujian').remove();
			$('.list-pembimbing').remove();
			$('.list-publikasi').remove();
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
			$('#nilaiTA').html(data['user'].nilaiTA)
			$('#nilai_huruf').html(data['user'].nilai_huruf)

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
			$('.judulTA').html(data['isianMahasiswa'].judulAkhir);
			$('.paradigma').html(data['isianMahasiswa'].paradigma);
			$('.kataKunci').html(data['isianMahasiswa'].kataKunci);
			$('.tujuanP').html(data['isianMahasiswa'].tujuanPenelitian);
			$('.metpen1').html(data['isianMahasiswa'].metodePenelitian1);
			$('.metpen2').html(data['isianMahasiswa'].metodePenelitian2);
			$('.temuan').html(data['isianMahasiswa'].temuan);
			$('.kontribusiImplikasi').html(data['isianMahasiswa'].kontribusiDanImplikasi);
		}
	})
});
// akhir bimbingan

// pimpinan
$('.ubahPimpinan').on('click', function () {
	let nip = $(this).data('nip');
	$.ajax({
		url: segments[0] + '/SiUjian/operator/getPosisiDosen/' + nip,
		method: 'get',
		dataType: 'json',
		success: function (data) {
			$('#nip_pimpinan_old').val(data['nip']);
			if (data['jabatan_pimpinan'] == 13) {
				$('.jabatan').val(data['status_dosen'] + ' ' + data['nama_prodi'] + ' ' + data['jenjang_prodi'])
			} else if (data['jabatan_pimpinan'] == 14) {
				$('.jabatan').val(data['status_dosen'] + ' ' + data['nama_jurusan'])
			} else {
				$('.jabatan').val(data['status_dosen'])
			}
			$('#prodi_p').val(data['prodi_dosen']);
			$('#jabatan_p').val(data['jabatan_pimpinan']);
			$('#jurusan_p').val(data['jurusankode']);
			$('#nip_pimpinan_old').val(data['nip']);
		}
	})
})
// akhir pimpinan




// akhir dosen
