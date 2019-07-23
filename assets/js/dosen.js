


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
        url: 'http://localhost/SiUjian/dosen/getDetailBimbingan/' + nim,
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



// akhir dosen