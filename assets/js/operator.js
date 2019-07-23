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