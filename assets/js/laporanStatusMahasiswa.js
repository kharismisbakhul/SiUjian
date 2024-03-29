//pimpinan Laporan Status Mahasiswa
var url = $(location).attr("href");
var segments = url.split("/");
$('.modalDetail').on("click", function () {
	var nim = $(this).data('id');
	$.ajax({
		url: segments[0] + '/SiUjian/Pimpinan/detailMahasiswa/' + nim,
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
                  <span>` + data.nama + `</span>
                </div>
              </div>
  
              <div class="form-group row  mb-1">
                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nim</label>
                <div class="col-sm-9">
                  <span>:</span>
                  <span>` + data.nim + `</span>
                </div>
              </div>
  
              <div class="form-group row  mb-1">
                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Jurusan</label>
                <div class="col-sm-9">
                  <span>:</span>
                  <span>` + data.nama_jurusan + `</span>
                </div>
              </div>
  
              <div class="form-group row  mb-1">
                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Prodi</label>
                <div class="col-sm-9">
                  <span>:</span>
                  <span>` + data.nama_prodi + `</span>
                </div>
              </div>
  
              <div class="form-group row  mb-1">
                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Angkatan</label>
                <div class="col-sm-9">
                  <span>:</span>
                  <span>` + data.angkatan + `</span>
                </div>
              </div>
  
              <div class="form-group row  mb-1">
                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Konsentrasi</label>
                <div class="col-sm-9">
                  <span>:</span>
                  <span>` + data.konsentrasi + `</span>
                </div>
              </div>
  
              <div class="form-group row  mb-1">
                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Alamat</label>
                <div class="col-sm-9">
                  <span>:</span>
                  <span>` + data.alamat + `</span>
                </div>
              </div>
  
              <div class="form-group row  mb-1">
                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">No.Telepon</label>
                <div class="col-sm-9">
                  <span>:</span>
                  <span>` + data.noTelp + `</span>
                </div>
              </div>
  
              <div class="form-group row  mb-1">
                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Asal Studi</label>
                <div class="col-sm-9">
                  <span>:</span>
                  <span>` + data.asalStudi + `</span>
                </div>
              </div>
  
              <div class="form-group row  mb-1">
                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tanggal Mulai Tugas Akhir</label>
                <div class="col-sm-9">
                  <span>:</span>
                  <span>` + data.tglMulaiTA + `</span>
                </div>
              </div>

              <div class="card">
                <h6 class="card-header">Daftar Dosen Pendamping</h6>
                <div class="card-body">
                  <div class=" row ml-1 mr-1">
                    <table class="table table-sm table-striped">
                      <thead>
                        <tr class="bg-primary text-white">
                          <th scope="col">#</th>
                          <th scope="col">Nama Dosen</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody id="dosen_pembimbing">
                      </tbody>
                    </table>
                  </div>
                </div>
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
      <th>` + (a++) + `</th>
      <td>` + dosen_pembimbing.nama_dosen + `</td>
      <td> Pembimbing ` + dosen_pembimbing.statusPembimbing + `</td>
      </tr>`;
};
