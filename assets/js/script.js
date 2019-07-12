$(document).ready(function () {
  $('.js-example-basic-single').select2();
});

$('.custom-file-input').on('change', function () {
  let fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').addClass("selected").html(fileName);
});

$('.privileges').on('change', function () {
  // alert("<?php echo $aa; ?>");
  $.ajax({
    url: 'http://localhost/SiUjian/admin/getListProdi',
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
      }
      else if ($('.privileges').val() === "Dosen") {
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
      }
      else {
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

$('.modalDetail').on("click", function () {
  var nim = $(this).data('id');
  $.ajax({
    url: 'http://localhost/SiUjian/Pimpinan/detailMahasiswa/' + nim,
    dataType: 'json',
    type: 'get',
    success: function (data) {
      $(".modal-body .card-body").html('');
      $(".modal-title .nama_mahasiswa").html(data.nama);
      $(".modal-body .card-body").html(`
          <form>
            <div class="form-group row mb-1">
              <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nama</label>
              <div class="col-sm-9">
                <span>:</span>
                <span>`+ data.nama + `</span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nim</label>
              <div class="col-sm-9">
                <span>:</span>
                <span>`+ data.nim + `</span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Jurusan</label>
              <div class="col-sm-9">
                <span>:</span>
                <span>`+ data.nama_jurusan + `</span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Prodi</label>
              <div class="col-sm-9">
                <span>:</span>
                <span>`+ data.nama_prodi + `</span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Angkatan</label>
              <div class="col-sm-9">
                <span>:</span>
                <span>`+ data.angkatan + `</span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Konsentrasi</label>
              <div class="col-sm-9">
                <span>:</span>
                <span>`+ data.konsentrasi + `</span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Alamat</label>
              <div class="col-sm-9">
                <span>:</span>
                <span>`+ data.alamat + `</span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">No.Telepon</label>
              <div class="col-sm-9">
                <span>:</span>
                <span>`+ data.noTelp + `</span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Asal Studi</label>
              <div class="col-sm-9">
                <span>:</span>
                <span>`+ data.asalStudi + `</span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tanggal Mulai Tugas Akhir</label>
              <div class="col-sm-9">
                <span>:</span>
                <span>`+ data.tglMulaiTA + `</span>
              </div>
            </div>

            <div class="row">
              <h5 class="col-sm-6 mt-2 ">Daftar Dosen Pendamping</h5>
            </div>

            <div class=" row ml-1 mr-1">

              <table class="table table-sm ">
                <thead>
                  <tr style="background-color: 	#C0C0C0; color: #101010">
                    <th scope="col">#</th>
                    <th scope="col">Nama Dosen</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody id="dosen_pembimbing">
                </tbody>
              </table>
            </div>
          </form>
            `);
      data.dosen_pembimbing.forEach(dosenLoop);
      a = 1;
    }
  })
});

var a = 1;

function dosenLoop(dosen_pembimbing) {
  document.getElementById("dosen_pembimbing").innerHTML +=
    `<tr>
    <th>`+ (a++) + `</th>
    <td>`+ dosen_pembimbing.nama + `</td>
    <td> Pembimbing `+ dosen_pembimbing.statusPembimbing + `</td>
    </tr>`;
};

// Pimpinan, Detail mahasiswa bimbingan Laporan Dosen

$('.modalDetailBimbingan').on("click", function () {
  var nip = $(this).data('id');
  $.ajax({
    url: 'http://localhost/SiUjian/Pimpinan/detailMahasiswaBimbingan/' + nip,
    dataType: 'json',
    type: 'get',
    success: function (data) {
      console.log(data);
      $(".modal-title .nama_dosen").html(data.nama);
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
}