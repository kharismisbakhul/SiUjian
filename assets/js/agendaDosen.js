// Inisialisasi Variabel Username dan URL AJAX
var url = $(location).attr("href");
var segments = url.split("/");
var username = $('#username-topbar').html();
if (segments[4] == "mahasiswa" || segments[4] == "operator" && segments[5] == "agendaDosen" && segments[6] != null || segments[4] == "agendaDosen") {
	username = $('#nip_dosen').val();
}
var urlAjax = segments[0] + '/SiUjian/agendaDosen/get_agenda/' + username;
var urlApiSiruas = segments[0] + '/siruas-api/api/jadwal_kuliah?id_dosen=' + username;

document.addEventListener('DOMContentLoaded', function () {
	var calendarEl = document.getElementById('calendar');

	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();

	if (day < 10) {
		day = '0' + day;
	}
	if (month < 10) {
		month = '0' + month;
	}

	var dateNow = year + '-' + month + '-' + day;

	var calendar = new FullCalendar.Calendar(calendarEl, {
		plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list', 'rrule'],
		themeSystem: 'bootstrap',
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
		},
		eventClick: function (info) {
			var eventObj = info.event;

			if (segments[4] == "dosen" || segments[4] == "operator" && eventObj.id != "null") {
				$("#nip_dosen_modal").val(username);
				$("#id_agenda_modal").val(eventObj.id);
				$("#ModalEventClicked").modal();
				$('.hapusAgenda').on('click', function () {
					// alert("CLICK");
					Swal.fire({
						title: 'Hapus Agenda? \n' + eventObj.title,
						text: "",
						type: 'warning',
						showCancelButton: true,
						confirmButtonColor: 'red',
						cancelButtonColor: 'blue',
						confirmButtonText: 'Hapus'
					}).then(function (result) {
						if (result.value) {
							window.location = window.location.origin + "/SiUjian/agendaDosen/hapusAgenda/" + eventObj.id + '/' + username;
						}
					})
				})
				$('.editAgenda').on('click', function () {
					$("#namaAgendaEdit").val(eventObj.title.replace("\n", ""));
					$("#nip_modal_edit").val(username);
					$("#id_agenda_edit").val(eventObj.id);
					$("#ModalEditAgendaDosenOperator").modal();
				})
			}
		},

		// eventRender: function (info) {
		// 	// console.log(info);
		// 	info.el.click(function () {
		// 		$("#startTime").html(moment(info.event.start).format('MMM Do h:mm A'));
		// 		$("#endTime").html(moment(info.event.end).format('MMM Do h:mm A'));
		// 		$("#eventContent").dialog({
		// 			modal: true,
		// 			title: event.title,
		// 			width: 350
		// 		});
		// 	});
		// },

		defaultDate: dateNow,
		locale: 'en',
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		backgroundColor: 'gray',
	});

	// Ubah Ukuran view list
	$('body').on('DOMSubtreeModified', ".fc-button-active", function () {
		var button = $('.fc-button-active').html();
		// console.log(button);
		if (button == "list") {
			// console.log(true);
		}
	});

	// Event sendiri di siujian
	$.ajax({
		url: urlAjax,
		dataType: 'json',
		type: 'get',
		success: function (data) {
			// console.log(data);
			data.forEach(function (dataA) {
				var room = dataA.ruangan;
				if (room != null) {
					room = '\tRoom ' + room + '\n';
				} else {
					room = '';
				}
				var title = dataA.nama_agenda;
				if (dataA.kategoriAgenda == 3 || dataA.kategoriAgenda == 4) {
					calendar.addEvent({
						id: dataA.id_agenda,
						title: room + dataA.nama_agenda,
						rrule: {
							dtstart: dataA.tanggalMulai + 'T' + dataA.waktuMulai,
							until: dataA.tanggalSelesai,
							byweekday: rrule.RRule[dataA.hariAgenda],
							freq: 'weekly'
						},
						color: 'red',
						duration: dataA.durasi
					});
				} else if (dataA.kategoriAgenda == 2) {
					calendar.addEvent({
						id: dataA.id_agenda,
						title: room + dataA.nama_agenda,
						start: dataA.tanggalMulai + 'T' + dataA.waktuMulai,
						end: dataA.tanggalSelesai + 'T' + dataA.waktuSelesai,
						color: 'blue'
					});
				} else {
					calendar.addEvent({
						id: dataA.id_agenda,
						title: room + dataA.nama_agenda,
						start: dataA.tanggalMulai + 'T' + dataA.waktuMulai,
						end: dataA.tanggalMulai + 'T' + dataA.waktuSelesai,
						color: 'green',
					});
				}

			})
			var fc = $('.fc-center h2').html();
			var monthYear = fc.split(" ");
			$('.monthYear').html(fc);
			// console.log(fc);
		}
	});

	// Import api siruas jadwal ujian
	$.ajax({
		url: urlApiSiruas,
		dataType: 'json',
		type: 'get',
		success: function (dataApi) {
			console.log(dataApi)
			var semester_mulai = dataApi.semester.tanggal_mulai;
			var semester_selesai = dataApi.semester.tanggal_selesai;
			dataApi.data.forEach(function (dataJadwalSiruas) {
				calendar.addEvent({
					id: null,
					title: '\tRoom ' + dataJadwalSiruas.ruangan + '\n' + dataJadwalSiruas.nama_matkul + ' Course',
					rrule: {
						dtstart: semester_mulai + 'T' + dataJadwalSiruas.jamMulaiSelesai[0],
						until: semester_selesai,
						byweekday: rrule.RRule[dataJadwalSiruas.hari_singkat],
						freq: 'weekly'
					},
					description: 'Repetitive',
					color: 'orange',
					duration: '02:30'
				});
			});
		}
	});

	// render calendar
	calendar.render();

	$('#tanggalSpesifik').on('change', function () {
		var seleksiTanggal = $('#tanggalSpesifik').val();
		calendar.gotoDate(seleksiTanggal);
	})

	// Edit Tag Title Content
	// console.log($(".fc-title").html());
	// $("<p>HAHAHHAA</p>").insertBefore(".fc-title");
	// $("<p>HAHAHHAA</p>").insertAfter("#tanggalSpesifik");
});

// Ubah Judul Bulan Tahun
$('body').on('DOMSubtreeModified', ".fc-center", function () {
	var fc = $('.fc-center h2').html();
	var monthYear = fc.split(" ");
	$('.monthYear').html(fc);
});

//Input Agenda
$('#kategoriAgenda').on('change', function () {
	var kategori = $('#kategoriAgenda').val();
	if (kategori == 2) {
		clearOption();
		$('.modal-body').append(`
		<div class="form-group expand1">
            <label for="ruangan" class="col-form-label">Ruangan (Opsional)</label>
            <select class="form-control" id="ruangan" name="ruangan" placeholder="Ruangan">
				<option value="0" disabled selected hidden>Pilih Ruangan</option>
				<option value="00">Luar UB</option>			
			</select>
		</div>
		<div class="row expand1">
            <div class="form-group col-lg-6">
                <label for="tanggalMulai" class="col-form-label col-form-label-sm">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggalMulai" name="tanggalMulai" placeholder="Tanggal Mulai">
            </div>
            <div class="form-group col-lg-6">
                <label for="waktuMulai" class="col-form-label col-form-label-sm">Waktu Mulai</label>
                <input type="time" class="form-control" id="waktuMulai" name="waktuMulai">
            </div>
		</div>
        <div class="row expand1">
            <div class="form-group col-lg-6">
                <label for="tanggalSelesai" class="col-form-label col-form-label-sm">Tanggal Selesai</label>
                <input type="date" class="form-control" id="tanggalSelesai" name="tanggalSelesai" placeholder="Tanggal Selesai">
            </div>
            <div class="form-group col-lg-6">
                <label for="waktuSelesai" class="col-form-label col-form-label-sm">Waktu Selesai</label>
                <input type="time" class="form-control" id="waktuSelesai" name="waktuSelesai">
            </div>
        </div>
		`)
	} else if (kategori == 1) {
		clearOption();
		$('.modal-body').append(`
		<div class="form-group expand2">
            <label for="ruangan" class="col-form-label">Ruangan (Opsional)</label>
            <select class="form-control" id="ruangan" name="ruangan" placeholder="Ruangan">
                <option value="0" disabled selected hidden>Pilih Ruangan</option>
                <option value="00">Luar UB</option>
			</select>
		</div>
		<div class="row expand2">
            <div class="form-group col-lg-12">
                <label for="tanggalAgenda" class="col-form-label col-form-label-sm">Tanggal</label>
                <input type="date" class="form-control" id="tanggalAgenda" name="tanggalAgenda" placeholder="Tanggal">
            </div>
		</div>
		<div class="row expand2">
			<div class="form-group col-lg-6">
				<label for="waktuMulai" class="col-form-label col-form-label-sm">Waktu Mulai</label>
				<input type="time" class="form-control" id="waktuMulai" name="waktuMulai">
			</div>
            <div class="form-group col-lg-6">
                <label for="waktuSelesai" class="col-form-label col-form-label-sm">Waktu Selesai</label>
                <input type="time" class="form-control" id="waktuSelesai" name="waktuSelesai">
            </div>
        </div>
		`)
	} else if (kategori == 3) {
		clearOption();
		$('.modal-body').append(`
		<div class="form-group expand3">
            <label for="hariAgenda" class="col-form-label">Hari</label>
            <select class="form-control" id="hariAgenda" name="hariAgenda" placeholder="Hari">
                <option value="0" disabled selected hidden>Pilih Hari Agenda</option>
                <option value="MO">Senin</option>
                <option value="TU">Selasa</option>
                <option value="WE">Rabu</option>
                <option value="TH">Kamis</option>
                <option value="FR">Jumat</option>
                <option value="SA">Sabtu</option>
                <option value="SU">Minggu</option>
			</select>
		</div>
		<div class="form-group expand3">
            <label for="ruangan" class="col-form-label">Ruangan (Opsional)</label>
            <select class="form-control" id="ruangan" name="ruangan" placeholder="Ruangan">
				<option value="0" disabled selected hidden>Pilih Ruangan</option>
				<option value="00">Luar UB</option>
                
			</select>
		</div>
		<div class="row expand3">
            <div class="form-group col-lg-6">
                <label for="tanggalMulai" class="col-form-label col-form-label-sm">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggalMulai" name="tanggalMulai" placeholder="Tanggal Mulai">
            </div>
            <div class="form-group col-lg-6">
                <label for="tanggalSelesai" class="col-form-label col-form-label-sm">Tanggal Selesai</label>
                <input type="date" class="form-control" id="tanggalSelesai" name="tanggalSelesai" placeholder="Tanggal Selesai">
            </div>
        </div>
		<div class="row expand3">
			<div class="form-group col-lg-6">
				<label for="waktuMulai" class="col-form-label col-form-label-sm">Waktu Mulai</label>
				<input type="time" class="form-control" id="waktuMulai" name="waktuMulai">
			</div>
            <div class="form-group col-lg-6">
                <label for="waktuSelesai" class="col-form-label col-form-label-sm">Waktu Selesai</label>
                <input type="time" class="form-control" id="waktuSelesai" name="waktuSelesai">
            </div>
        </div>
		`)
	} else if (kategori == 4) {
		clearOption();
		$('.modal-body').append(`
		<div class="form-group expand4">
            <label for="hariAgenda" class="col-form-label">Hari</label>
            <select class="form-control" id="hariAgenda" name="hariAgenda" placeholder="Hari">
                <option value="0" disabled selected hidden>Pilih Hari Agenda</option>
                <option value="MO">Senin</option>
                <option value="TU">Selasa</option>
                <option value="WE">Rabu</option>
                <option value="TH">Kamis</option>
                <option value="FR">Jumat</option>
                <option value="SA">Sabtu</option>
                <option value="SU">Minggu</option>
			</select>
		</div>
		<div class="form-group expand4">
            <label for="ruangan" class="col-form-label">Ruangan (Opsional)</label>
            <select class="form-control" id="ruangan" name="ruangan" placeholder="Ruangan">
				<option value="0" disabled selected hidden>Pilih Ruangan</option>
				<option value="00">Luar UB</option>
			</select>
		</div>
		<div class="row expand4">
        	<input type="hidden" class="form-control" id="semesterMulai" name="semesterMulai" placeholder="Semester Mulai">
			<input type="hidden" class="form-control" id="semesterSelesai" name="semesterSelesai" placeholder="Semester Selesai">
		</div>
		<div class="row expand4">
			<div class="form-group col-lg-6">
				<label for="waktuMulai" class="col-form-label col-form-label-sm">Waktu Mulai</label>
				<input type="time" class="form-control" id="waktuMulai" name="waktuMulai">
			</div>
            <div class="form-group col-lg-6">
                <label for="waktuSelesai" class="col-form-label col-form-label-sm">Waktu Selesai</label>
                <input type="time" class="form-control" id="waktuSelesai" name="waktuSelesai">
            </div>
        </div>
		`);
		$.ajax({
			url: urlApiSiruas,
			dataType: 'json',
			type: 'get',
			success: function (dataApi) {
				console.log(dataApi);
				var semester_mulai = dataApi.semester.tanggal_mulai;
				var semester_selesai = dataApi.semester.tanggal_selesai;
				$('#semesterMulai').val(semester_mulai);
				$('#semesterSelesai').val(semester_selesai);
			}
		});
	} else {
		clearOption();
	};

	// Ruangan Siruas
	if (kategori == 1 || kategori == 2) {
		// Ruangan Siruas
		$.ajax({
			url: segments[0] + '/siruas-api/api/ruangan',
			dataType: 'json',
			type: 'get',
			success: function (dataRuangan) {
				// console.log(dataRuangan);
				dataRuangan.data.forEach(function (ruangan) {
					$('#ruangan').append(`<option value="` + ruangan.ruangan + `">` + ruangan.ruangan + `</option>`)
				})
			}
		});
	}

	// Ruangan FEB Per Lantai
	$.ajax({
		url: segments[0] + '/SiUjian/agendaDosen/getRuangan',
		dataType: 'json',
		type: 'get',
		success: function (dataRuangan) {
			// console.log(dataRuangan);
			dataRuangan.forEach(function (ruangan) {
				$('#ruangan').append(`<option value="` + ruangan + `">` + ruangan + `</option>`)
			})
		}
	});
});

// Reset Modal
function clearOption() {
	$('.expand1').remove();
	$('.expand2').remove();
	$('.expand3').remove();
	$('.expand4').remove();
}

$('.templateBimbingan').on('click', function () {
	$('#namaAgenda').val("Supervisory Schedule");
});
