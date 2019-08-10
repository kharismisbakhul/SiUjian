var url = $(location).attr("href");
var segments = url.split("/");

$(window).on('load', function () {
	var username = $('#username-topbar').html();
	// var username = 20;
	// console.log(username);
	$.ajax({
		url: segments[0] + '/SiUjian/notif/getNotifications/' + username,
		dataType: 'json',
		type: 'get',
		success: function (data) {
			$('.counter').html(data.counter);
			// console.log(data);
			data['ujian'].forEach(notifUjian);
			data['publikasi'].forEach(notifPublikasi);

			// $('.notifications').html(``);
		}
	})
});

$('.icon-notif').on('click', function () {
	$('.counter').html('');
});

function notifUjian(data) {
	$('.notifications').append(`
	<a class="dropdown-item d-flex align-items-center" href=` + segments[0] + `/SiUjian/operator/validasi_cek/` + data['id'] + `">
		<div class="mr-3">
			<div class="icon-circle bg-primary">
				<i class="fas fa-file-alt text-white"></i>
			</div>
		</div>
		<div>
			<div class="small text-gray-500">` + data['tgl_ujian'] + `</div>
			<span class="font-weight-bold">` + data['MahasiswaNim'] + ` Menambahkan ujian</span>
		</div>
	</a>
	`);
}

function notifPublikasi(data) {
	$('.notifications').append(`
	<a class="dropdown-item d-flex align-items-center" href=` + segments[0] + `/SiUjian/operator/validasi_publikasi/` + data['idJurnal'] + `">
		<div class="mr-3">
			<div class="icon-circle bg-primary">
				<i class="fas fa-file-alt text-white"></i>
			</div>
		</div>
		<div>
			<div class="small text-gray-500">` + data['tanggal'] + `</div>
			<span class="font-weight-bold">` + data['Mahasiswanim'] + ` Menambahkan Publikasi</span>
		</div>
	</a>
	`);
}
