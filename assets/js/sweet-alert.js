$('.logout').on('click', function () {
	Swal.fire({
		title: 'Are you sure?',
		text: "",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Logout'
	}).then(function (result) {
		if (result.value) {
			window.location = window.location.origin + "/SiUjian/auth/logout";
		}
	})
});

$('.delete-user').on('click', function () {
	var a = $('.delete-user').attr('value');
	Swal.fire({
		title: 'Anda yakin?',
		text: "",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus'
	}).then(function (result) {
		if (result.value) {
			window.location = window.location.origin + "/SiUjian/admin/deleteuser/" + a;
		}
	})
});

const flashData = $('.flash-data').data('flashdata');
const flashData2 = $('.flash-data2').data('flashdata2');
if (flashData) {
	Swal.fire({
		title: 'Data',
		text: flashData,
		type: 'success'
	})
} else if (flashData2) {
	Swal.fire({
		title: 'Data',
		text: flashData2,
		type: 'error'
	})
}

$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah anda yakin',
		text: "Data akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

})
