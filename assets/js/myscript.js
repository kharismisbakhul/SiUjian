// Animasi Transisi
$(window).on('load', function () {
	$('.tombol').addClass('pMuncul');
	$('.box').addClass('bMuncul');
	$('.box2').addClass('bMuncul');

	$('.dftr').each(function (i) {
		setTimeout(function () {
			$('.dftr').eq(i).addClass('muncul');
		}, 300 * (i + 1));
	});
})

// Label Image
$('.custom-file-input').on('change', function () {
	let fileName = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass("selected").html(fileName);
});

// dataTable Ujian-operator
$(document).ready(function () {
	$('#test').DataTable({
		initComplete: function () {
			this.api().columns([3, 4, 5, 6]).every(function () {
				var column = this;
				var select = $('<select class="form-control-sm" ><option value=""></option></select>')
					.appendTo($(column.footer()).empty())
					.on('change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search(val ? '^' + val + '$' : '', true, false)
							.draw();
					});
				console.log(select);

				column.data().unique().sort().each(function (d, j) {
					select.append('<option value="' + d + '">' + d + '</option>')
				});
			});
		}
	});
});
// akhir dataTable Ujian-operator

// dataTable Dosen-operator
$(document).ready(function () {
	$('#dataTableDosen').DataTable({
		initComplete: function () {
			this.api().columns([1, 3, 4]).every(function () {
				var column = this;
				var select = $('<select class="form-control-sm" ><option value=""></option></select>')
					.appendTo($(column.footer()).empty())
					.on('change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search(val ? '^' + val + '$' : '', true, false)
							.draw();
					});
				console.log(select);

				column.data().unique().sort().each(function (d, j) {
					select.append('<option value="' + d + '">' + d + '</option>')
				});
			});
		}
	});
});
// akhir dataTable Dosen-operator

// dataTable Dosen
$(document).ready(function () {
	$('#dataTableBimbingan').DataTable({
		initComplete: function () {
			this.api().columns([3, 4, 5, 6]).every(function () {
				var column = this;
				var select = $('<select class="form-control-sm" ><option value=""></option></select>')
					.appendTo($(column.footer()).empty())
					.on('change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search(val ? '^' + val + '$' : '', true, false)
							.draw();
					});
				console.log(select);

				column.data().unique().sort().each(function (d, j) {
					select.append('<option value="' + d + '">' + d + '</option>')
				});
			});
		}
	});
});
// akhir dataTable Dosen