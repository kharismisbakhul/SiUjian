// Pimpinan, Detail mahasiswa bimbingan Laporan Dosen
var url = $(location).attr("href");
var segments = url.split("/");
$('.modalDetailBimbingan').on("click", function () {
	var nip = $(this).data('id');
	var star_date = ''
	var end_date = ''
	if ($('.str').html() != null || $('.end').html() != null) {
		star_date = $('.str').html()
		end_date = $('.end').html();
	}
	console.log(star_date)
	$.ajax({
		url: segments[0] + '/SiUjian/Pimpinan/detailMahasiswaBimbingan/' + nip + '?star_date=' + star_date + '&end_date=' + end_date,
		dataType: 'json',
		type: 'get',
		beforeSend: function (data) {

		},
		success: function (data) {

			$(".modal-body").html('');
			$(".modal-title .nama_dosen").html(data.nama_dosen);
			if (data.mahasiswa_bimbingan.length != 0) {
				$(".modal-body").html('');
				$(".modal-body").html(`
            <div class= "card shadow mb-4" >
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-capitalize">Detail Mahasiswa Bimbingan </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="text-center">
                    <tr>
                      <th>#</th>
                      <th>Nama Mahasiswa</th>
                      <th>Tgl Mulai Tugas Akhir</th>
                      <th>Jenjang</th>
                      <th>Program Studi</th>
                      <th>Posisi Dosen</th>
                      <th>Status 1</th>
                      <th>Status 2</th>
                    </tr>
                  </thead>
                  <tbody id="mahasiswa_bimbingan">
                  </tbody>
                </table>
              </div>
  
            </div>
      </div >
            `);
				posisi_pembimbing = data.posisi;
				data.mahasiswa_bimbingan.forEach(bimbinganLoop);
				i = 1;
			} else {
				$(".modal-body").html('');
				$(".modal-body").html('<h3 class="text-center">Tidak Memiliki Mahasiswa Bimbingan</h3>');
			}
		}
	})
});

var i = 1;

function bimbinganLoop(mahasiswa_bimbingan) {
	var warnaClass = "";
	var kodeUjian = mahasiswa_bimbingan.ujian_terakhir.kode;
	var statusUjian = mahasiswa_bimbingan.ujian_terakhir.statusUjian;
	var namaUjian = mahasiswa_bimbingan.ujian_terakhir.nama_ujian;
	if (!kodeUjian) {
		namaUjian = "Baru Mulai";
		statusUjian = "-";
	}
	if (statusUjian == 1) {
		warnaClass = "text-success";
		statusUjian = "Lulus";
	} else if (statusUjian == 2) {
		warnaClass = "text-primary";
		statusUjian = "Proses";
	} else if (statusUjian == 3) {
		warnaClass = "text-danger";
		statusUjian = "Tidak Lulus";
	}
	$("#mahasiswa_bimbingan").append(
		`<tr>
    <td>` + (i++) + `</td>
    <td>` + mahasiswa_bimbingan.nama + `</td>
    <td>` + mahasiswa_bimbingan.tglMulaiTA + `</td>
    <td>` + mahasiswa_bimbingan.jenjang + `</td>
    <td>` + mahasiswa_bimbingan.nama_prodi + `</td>
    <td> Pembimbing ` + mahasiswa_bimbingan.statusPembimbing + `</td>
    <td class="text-center">` + namaUjian + `</td>
    <td class="status2 text-center font-weight-bold ` + warnaClass + `">` + statusUjian + `</td>
    </tr>`);
};
