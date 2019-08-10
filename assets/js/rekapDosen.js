var url = $(location).attr("href");
var segments = url.split("/");

$('.modalRekap').on("click", function () {
	var nip = $(this).data('id');
	$.ajax({
		url: segments[0] + '/SiUjian/Pimpinan/detailRekapDosen/' + nip,
		dataType: 'json',
		type: 'get',
		success: function (data) {
			$(".modal-title .nama-dosennya").html(data.nama_dosen);
			$(".jPembimbingKetua").html(data.jumlah_pembimbing['ketua']);
			$(".jPembimbing1").html(data.jumlah_pembimbing[1]);
			$(".jPembimbing2").html(data.jumlah_pembimbing[2]);
			$(".jPromotor").html(data.jumlah_pembimbing['promotor']);
			$(".jCoPromotor1").html(data.jumlah_pembimbing['co_promotor_1']);
			$(".jCoPromotor2").html(data.jumlah_pembimbing['co_promotor_2']);
			$(".jTotalPembimbing").html(data.jumlah_pembimbing['total']);
			$(".jPengujiKetua").html(data.jumlah_penguji['ketua']);
			$(".jPenguji1").html(data.jumlah_penguji[1]);
			$(".jPenguji2").html(data.jumlah_penguji[2]);
			$(".jPenguji3").html(data.jumlah_penguji[3]);
			$(".jPengujiTamu1").html(data.jumlah_penguji['tamu_1']);
			$(".jPengujiTamu2").html(data.jumlah_penguji['tamu_2']);
			$(".jTotalPenguji").html(data.jumlah_penguji['total']);
			$(".statusKomisi").html(data.jumlah_ujian['komisi']);
			$(".statusProposal").html(data.jumlah_ujian['proposal']);
			$(".statusSemhas").html(data.jumlah_ujian['semhas']);
			$(".statusTesis").html(data.jumlah_ujian['tesis']);
			$(".statusWisuda").html(data.jumlah_wisuda);
			$(".statusTotalUjian").html(data.jumlah_ujian['total']);
			$(".statusLulus").html(data.jumlah_kelulusan['lulus']);
			$(".statusBelumLulus").html(data.jumlah_kelulusan['belum']);
			$(".statusTotalLulusTidak").html(data.jumlah_kelulusan['total']);
		}
	})
});
