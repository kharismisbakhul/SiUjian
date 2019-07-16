// Pimpinan, Detail mahasiswa bimbingan Laporan Dosen

$('.modalDetailDosen').on("click", function () {
    var nip = $(this).data('id');
    $.ajax({
        url: 'http://localhost/SiUjian/Pimpinan/detailMahasiswaBimbingan/' + nip,
        dataType: 'json',
        type: 'get',
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
            }
            else {
                $(".modal-body").html('');
                $(".modal-body").html('<h3 class="text-center">Tidak Memiliki Mahasiswa Bimbingan</h3>');
            }
        }
    })
});

var i = 1;

function bimbinganLoop(mahasiswa_bimbingan) {
    var warnaClass = "";
    var statusUjian = mahasiswa_bimbingan.ujian_terakhir.statusUjian;
    var namaUjian = mahasiswa_bimbingan.ujian_terakhir.nama_ujian;
    if (!namaUjian) {
        namaUjian = "-";
    }
    if (statusUjian == 1) {
        warnaClass = "text-success";
        statusUjian = "Lulus";
    }
    else if (statusUjian == 2) {
        warnaClass = "text-primary";
        statusUjian = "Proses";
    }
    else if (statusUjian == 3) {
        warnaClass = "text-danger";
        statusUjian = "Tidak Lulus";
    }
    else {
        statusUjian = "-";
    }
    $("#mahasiswa_bimbingan").append(
        `<tr>
    <td>`+ (i++) + `</td>
    <td>`+ mahasiswa_bimbingan.nama + `</td>
    <td>`+ mahasiswa_bimbingan.jenjang + `</td>
    <td>`+ mahasiswa_bimbingan.nama_prodi + `</td>
    <td> Pembimbing `+ mahasiswa_bimbingan.statusPembimbing + `</td>
    <td class="text-center">`+ namaUjian + `</td>
    <td class="status2 text-center font-weight-bold `+ warnaClass + `">` + statusUjian + `</td>
    </tr>`);
};