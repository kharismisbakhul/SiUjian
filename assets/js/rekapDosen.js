var url = $(location).attr("href");
var segments = url.split("/");

var star_date = ''
var end_date = ''
if ($('.str').html() != null || $('.end').html() != null) {
	star_date = $('.str').html()
	end_date = $('.end').html();
}

$('.modalRekap').on("click", function () {
	var nip = $(this).data('id');

	$.ajax({
		url: segments[0] + '/SiUjian/Pimpinan/detailRekapDosen/' + nip + '?star_date=' + star_date + '&end_date=' + end_date,
		dataType: 'json',
		type: 'get',
		success: function (data) {
			console.log(data);
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
			// ujian s2
			$(".statusKomisi").html(data.jumlah_ujian['komisi']);
			$(".statusProposal").html(data.jumlah_ujian['proposal']);
			$(".statusSemhas").html(data.jumlah_ujian['semhas']);
			$(".statusTesis").html(data.jumlah_ujian['tesis']);
			$(".statusWisuda").html(data.jumlah_wisuda);
			$(".statusTotalUjian").html(data.jumlah_ujian['total']);
			// akhirujina

			// ujian s3
			$(".makalah1").html(data.jumlah_ujian['makalah1']);
			$(".makalah2").html(data.jumlah_ujian['makalah2']);
			$(".seminarProposal").html(data.jumlah_ujian['seminarProposal']);
			$(".proposal").html(data.jumlah_ujian['proposal_s3']);
			$(".ujianProposal").html(data.jumlah_ujian['ujian_proposal_s3']);
			$(".pelaksanaanPenelitian").html(data.jumlah_ujian['pelaksanaan_penelitian']);
			$(".persentasi3").html(data.jumlah_ujian['persentasi3']);
			$(".seminarHasil").html(data.jumlah_ujian['seminarHasil']);
			$(".ekternalReview").html(data.jumlah_ujian['eksternalReview']);
			$(".wisudas3").html(data.jumlah_wisuda_s3);
			$(".ujianDisertasi").html(data.jumlah_ujian['ujianDisertasi']);
			$(".totalUjian").html(data.jumlah_ujian['totals3']);

			// akhir ujian s3
			$(".statusLulus").html(data.jumlah_kelulusan['lulus']);
			$(".statusBelumLulus").html(data.jumlah_kelulusan['belum']);
			$(".statusTotalLulusTidak").html(data.jumlah_kelulusan['total']);
		}
	})
});
