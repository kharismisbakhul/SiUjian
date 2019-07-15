$('.modalRekap').on("click", function () {
    var nip = $(this).data('id');
    $.ajax({
        url: 'http://localhost/SiUjian/Pimpinan/detailRekapDosen/' + nip,
        dataType: 'json',
        type: 'get',
        success: function (data) {
            $(".modal-title .nama-dosennya").html(data.nama_dosen);
            $(".jPembimbing1").html(``);
            $(".jPembimbing2").html(``);
            $(".jTotalPembimbing").html(``);
            $(".jPenguji1").html(``);
            $(".jPenguji2").html(``);
            $(".jTotalPenguji").html(``);
            $(".jStatusKomisi").html(``);
            $(".jStatusProposal").html(``);
            $(".jStatusSemhas").html(``);
            $(".jStatusTesis").html(``);
            $(".jStatusWisuda").html(``);
            $(".jStatusLulus").html(``);
            $(".jStatusBelumLulus").html(``);
            $(".jStatusLulusTidak").html(``);
        }
    })
});