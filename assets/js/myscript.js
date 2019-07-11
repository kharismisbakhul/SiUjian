$('.custom-file-input').on('change', function () {
	let fileName = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass("selected").html(fileName);
});

$('.detail').on('click', function () {
	let id = $(this).data('id');

	$.ajax({

		url: 'http://localhost/SiUjian/mahasiswa/getDetailPublikasi/' + id,
		data: {
			idJurnal: id
		},
		method: 'post',
		dataType: 'json',
		beforeSend: function () {
			$('.loader').attr('src', 'http://localhost/SiUjian/assets/img/loader2.gif')
		},
		success: function (data) {
			$('.loader').hide()
			$('#judulArtikel').html(data.judulArtikel);
			$('#namaJurnal').html(data.namaJurnal);
			$('#kategoriJurnal').html(data.kategoriJurnal);
			$('#statusJurnal').html(data.statusJurnal);
			$('#tanggal').html(data.tanggal);
			$('#volumeDanNoTerbitan').html(data.volumeDanNoTerbitan);
			$('#valid').html(data.valid);
			$('#bukti').html(data.bukti);
			$('#bukti').attr('href', 'http://localhost/SiUjian/assets/publikasi/' + data.bukti);

		}
	});
})

$('.cls').on('click', function () {
	$('.loader').show();
	$('#judulArtikel').html('');
	$('#namaJurnal').html('');
	$('#kategoriJurnal').html('');
	$('#statusJurnal').html('');
	$('#tanggal').html('');
	$('#volumeDanNoTerbitan').html('');
	$('#valid').html('');
	$('#bukti').html('');
	$('#bukti').attr('')
})