var url = $(location).attr("href");
var segments = url.split("/");

$('.custom-file-input').on('change', function () {
	let fileName = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass("selected").html(fileName);
});

$('.privileges').on('click', function () {
	var clicked = $('.privileges');
	clear();
	if (clicked.val() === "Mahasiswa" || clicked.val() === "Dosen" || clicked.val() === "Pimpinan") {
		$('.a').addClass('form-group row');
		$('.a').append(`
			<label for= "jenjang" class= "col-sm-4 col-form-label">Jenjang</label>
			<div class="col-sm-8">
				<select class="form-control jenjang" name="jenjang" id="jenjang">
					<option>Pilih Jenjang</option>
					<option>S2</option>
					<option>S3</option>
				</select>
			</div>
		`);
	}
});

$('.a').on('click', '.jenjang', function () {
	clear2();
	var jenjang = $('.jenjang').val();
	if (jenjang === "S2" || jenjang === "S3") {
		$('.b').addClass('form-group row');
		$('.b').append(`
			<label for= "prodi" class= "col-sm-4 col-form-label">Prodi</label>
			<div class="col-sm-8">
				<select class="form-control listProdi" name="prodi" id="prodi" placeholder="prodi">
				</select>
			</div>`);
		$.ajax({
			url: segments[0] + '/SiUjian/admin/getListProdi/' + jenjang,
			method: 'get',
			dataType: 'json',

			success: function (data) {
				data.forEach(myFunction);

				if ($('.privileges').val() === "Pimpinan") {
					$('.c').addClass('form-group row');
					$('.c').append(`
						<label for= "posisi" class= "col-sm-4 col-form-label" >Posisi</label>
						<div class="col-sm-8">
							<textarea class="form-control posisi" name="posisi" id="posisi"></textarea>
						</div>
					`);
				}
			}
		})
	} else {
		clear2();
	}
});

function clear() {
	$('.a').removeClass('form-group row');
	$('.a').html(``);
	clear2();
}

function clear2() {
	$('.b').removeClass('form-group row');
	$('.b').html(``);
	$('.c').removeClass('form-group row');
	$('.c').html(``);
}

function myFunction(item) {
	document.getElementById("prodi").innerHTML += `<option value="` + item.kode + `">` + item.nama_prodi + `</option>`;
}
