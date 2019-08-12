var url = $(location).attr("href");
var segments = url.split("/");

$('.custom-file-input').on('change', function () {
	let fileName = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass("selected").html(fileName);
});

$('.privileges').on('change', function () {
	// alert("<?php echo $aa; ?>");
	$.ajax({
		url: segments[0] + '/SiUjian/admin/getListProdi',
		method: 'get',
		dataType: 'json',

		success: function (data) {
			console.log(data);
			var d = [];
			for (i = 0; i < data.length; i++) {
				d.push(data[i]);
			}
			if ($('.privileges').val() === "Mahasiswa") {
				clear();
				$('.a').addClass('form-group row');
				$('.a').append(`
        <label for= "jenjang" class= "col-sm-4 col-form-label" >Jenjang</label >
        <div class="col-sm-8">
        <select class="form-control jenjang" name="jenjang" id="jenjang">
        <option>S2</option>
        <option>S3</option>
        </select>
        </div>
        `);
				$('.b').addClass('form-group row');
				$('.b').append(`
                <label for= "prodi" class= "col-sm-4 col-form-label">Prodi</label>
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
        </div>
        `);
				$('.b').addClass('form-group row');
				$('.b').append(`
                <label for= "prodi" class= "col-sm-4 col-form-label">Prodi</label>
                    <div class="col-sm-8">
                        <select class="form-control listProdi" name="prodi" id="prodi" placeholder="prodi">
                        </select>
                        </div>`);
				d.forEach(myFunction);
			} else if ($('.privileges').val() === "Pimpinan") {
				clear();
				$('.a').addClass('form-group row');
				$('.a').append(`
        <label for= "jenjang" class= "col-sm-4 col-form-label" >Jenjang</label >
        <div class="col-sm-8">
        <select class="form-control jenjang" name="jenjang" id="jenjang">
        <option>S2</option>
        <option>S3</option>
        </select>
        </div>
        `);
				$('.b').addClass('form-group row');
				$('.b').append(`
                <label for= "prodi" class= "col-sm-4 col-form-label">Prodi</label>
                    <div class="col-sm-8">
                        <select class="form-control listProdi" name="prodi" id="prodi" placeholder="prodi">
                        </select>
                        </div>`);
				d.forEach(myFunction);
				$('.c').addClass('form-group row');
				$('.c').append(`
        <label for= "posisi" class= "col-sm-4 col-form-label" >Posisi</label >
        <div class="col-sm-8">
        <textarea class="form-control posisi" name="posisi" id="posisi"></textarea>
        </div>
        `);
			} else {
				clear();
			}
		}
	})
});

function clear() {
	$('.a').removeClass('form-group row');
	$('.b').removeClass('form-group row');
	$('.c').removeClass('form-group row');
	$('.a').html(``);
	$('.b').html(``);
	$('.c').html(``);
}

function myFunction(item) {
	document.getElementById("prodi").innerHTML += `<option value="` + item['kode'] + `">` + item['nama_prodi'] + `</option>`;
}
