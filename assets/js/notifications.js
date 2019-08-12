var url = $(location).attr("href");
var segments = url.split("/");
var username = $('#username-topbar').html();
var user_kode = $('.username-topbar').attr('value');
$(window).on('load', function () {
	// var username = 20;
	// console.log(username);
	// console.log(user_kode);
	$.ajax({
		url: segments[0] + '/SiUjian/notif/getNotifications/' + username,
		dataType: 'json',
		type: 'get',
		success: function (data) {
			// $('.counter').html(data.counter);
			if (user_kode == 1 || user_kode == 2) {
				data['all_notifikasi'].forEach(notifikasi);
			} else if (user_kode == 5) {
				data['all_notifikasi'].forEach(userNotifikasi);
			}
			// $('.notifications').html(``);
		}
	})
});

$('.icon-notif').on('click', function () {
	$('.counter').html('');
	$.ajax({
		url: segments[0] + '/SiUjian/notif/setNotifications/' + username,
		dataType: 'json',
		type: 'get',
		success: function (data) {}
	})
});

function notifikasi(data) {
	if (data['keterangan'] == "ujian") {
		$('.notifications').append(`
	<a class="dropdown-item d-flex align-items-center" href="` + segments[0] + `/SiUjian/operator/validasi_cek/` + data['id'] + `">
		<div class="mr-3">
			<div class="icon-circle bg-primary">
				<i class="fas fa-book-open text-white"></i>
			</div>
		</div>
		<div>
			<div class="small text-gray-500">` + data['tanggal'] + `</div>
			<span class="font-weight-bold">` + data['nama'] + ` (Mahasiswa) Menambahkan ujian (` + data['nama_ujian'] + `)</span>
		</div>
	</a>
	`);
	} else {
		$('.notifications').append(`
		<a class="dropdown-item d-flex align-items-center" href="` + segments[0] + `/SiUjian/operator/validasi_publikasi/` + data['id'] + `">
			<div class="mr-3">
				<div class="icon-circle bg-primary">
					<i class="fas fa-file-alt text-white"></i>
				</div>
			</div>
			<div>
				<div class="small text-gray-500">` + data['tanggal'] + `</div>
				<span class="font-weight-bold">` + data['nama'] + ` (Mahasiswa) Menambahkan Publikasi</span>
			</div>
		</a>
		`);
	}
}

function userNotifikasi(data) {
	if (data['keterangan'] == "ujian") {
		$('.notifications').append(`
		<a class="dropdown-item d-flex align-items-center" href=` + segments[0] + `/SiUjian/mahasiswa/ujian">
			<div class="mr-3">
				<div class="icon-circle bg-primary">
					<i class="fas fa-book-open text-white"></i>
				</div>
			</div>
			<div>
				<div class="small text-gray-500">` + data['tanggal'] + `</div>
				<span class="font-weight-bold"> Ujian anda (` + data['nama_ujian'] + `) telah divalidasi </span>
			</div>
		</a>
		`);
	} else {
		$('.notifications').append(`
		<a class="dropdown-item d-flex align-items-center" href="` + segments[0] + `/SiUjian/mahasiswa/publikasi">
			<div class="mr-3">
				<div class="icon-circle bg-primary">
					<i class="fas fa-file-alt text-white"></i>
				</div>
			</div>
			<div>
				<div class="small text-gray-500">` + data['tanggal'] + `</div>
				<span class="font-weight-bold"> Publikasi anda telah divalidasi </span>
			</div>
		</a>
		`);
	}
}
