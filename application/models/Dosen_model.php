<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
    public function getDataDosen($nip)
    {
        $this->db->select('dosen.*,prodi.jurusankode');
        $this->db->from('dosen');
        $this->db->join('prodi', 'dosen.prodi_dosen=prodi.jurusankode', 'left');
        $this->db->where('dosen.nip', $nip);
        return $this->db->get()->row_array();
    }


    public function getListDosen($nip, $prodi = null, $jurusan = null)
    {

        $this->db->select('dosen.nama_dosen, dosen.nip, dosen.statusAktif, COUNT(pembimbing.Mahasiswanim) as jumlah_bimbingan,dosen.prodi_dosen');
        $this->db->from('dosen');
        $this->db->join('pembimbing', 'dosen.nip = pembimbing.Dosennip', 'left');
        $this->db->where('dosen.nip  !=', $nip);
        if ($prodi != null) {
            $this->db->where('dosen.prodi_dosen', $prodi);
        }
        if ($jurusan != null) {
            $this->db->join('prodi', 'prodi.kode=dosen.prodi_dosen', 'left');
            $this->db->where('prodi.jurusankode', $jurusan);
        }
        $this->db->group_by('dosen.nama_dosen');
        return $this->db->get()->result_array();
    }
    public function getListAllDosen()
    {
        $query = "SELECT dosen.nama_dosen, dosen.nip, dosen.statusAktif, COUNT(pembimbing.Mahasiswanim) as 'jumlah_bimbingan' FROM dosen left join pembimbing on dosen.nip = pembimbing.Dosennip GROUP BY dosen.nama_dosen";
        return $this->db->query($query)->result_array();
    }

    public function getRekapDosen($nip, $prodi = 0, $jurusan = null, $star_date = null, $end_date = null)
    {
        //list Dosen
        $dosen = $this->getListDosen($nip);

        if ($prodi != 0) {
            $dosen = $this->getListDosen($nip, $prodi);
        } elseif ($jurusan != null) {
            $dosen = $this->getListDosen($nip, null, $jurusan);
        }
        //get mahasiswa bimbingan + jumlah
        for ($i = 0; $i < count($dosen); $i++) {
            $jumlah_bimbingan_lulus = 0;
            $mahasiswa_bimbingan = $this->getMahasiswaBimbingan($dosen[$i]['nip'], $star_date, $end_date)->result_array();
            $dosen[$i]['mahasiswa_bimbingan'] = $mahasiswa_bimbingan;
            for ($j = 0; $j < count($mahasiswa_bimbingan); $j++) {
                if ($mahasiswa_bimbingan[$j]['statusKelulusan'] == 1) {
                    $jumlah_bimbingan_lulus++;
                }
            }
            $dosen[$i]['jumlah_mahasiswa_bimbingan'] = $this->getMahasiswaBimbingan($dosen[$i]['nip'], $star_date, $end_date)->num_rows();
            $dosen[$i]['jumlah_bimbingan_lulus'] = $jumlah_bimbingan_lulus;

            $jumlah_penguji_ketua = $this->getJumlahMenguji($dosen[$i]['nip'], 7, $star_date, $end_date);
            $jumlah_penguji_1 = $this->getJumlahMenguji($dosen[$i]['nip'], 8, $star_date, $end_date);
            $jumlah_penguji_2 = $this->getJumlahMenguji($dosen[$i]['nip'], 9, $star_date, $end_date);
            $jumlah_penguji_3 = $this->getJumlahMenguji($dosen[$i]['nip'], 10, $star_date, $end_date);
            $jumlah_penguji_tamu_1 = $this->getJumlahMenguji($dosen[$i]['nip'], 11, $star_date, $end_date);
            $jumlah_penguji_tamu_2 = $this->getJumlahMenguji($dosen[$i]['nip'], 12, $star_date, $end_date);

            $jumlah_penguji_total = $jumlah_penguji_ketua + $jumlah_penguji_1 + $jumlah_penguji_2 + $jumlah_penguji_3 + $jumlah_penguji_tamu_1 + $jumlah_penguji_tamu_2;
            $dosen[$i]['jumlah_menguji'] =  $jumlah_penguji_total;
        }
        return $dosen;
    }

    public function getJumlahMenguji($nip, $status_penguji, $star_date = null, $end_date = null)
    {
        $this->db->select('*');
        $this->db->from('penguji');
        $this->db->join('ujian', 'penguji.Ujianid=ujian.id', 'left');
        $this->db->where('penguji.statusPenguji', $status_penguji);
        $this->db->where('penguji.Dosennip', $nip);
        if ($star_date != null & $end_date != null) {
            $this->db->where('ujian.tgl_ujian >=', $star_date);
            $this->db->where('ujian.tgl_ujian <=', $end_date);
        }
        return $this->db->get()->num_rows();
    }

    public function getRekapAllDosen()
    {
        //list Dosen
        $dosen = $this->getListAllDosen();

        //get mahasiswa bimbingan + jumlah
        for ($i = 0; $i < count($dosen); $i++) {
            $jumlah_bimbingan_lulus = 0;
            $mahasiswa_bimbingan = $this->getMahasiswaBimbingan($dosen[$i]['nip'])->result_array();
            $dosen[$i]['mahasiswa_bimbingan'] = $mahasiswa_bimbingan;
            for ($j = 0; $j < count($mahasiswa_bimbingan); $j++) {
                if ($mahasiswa_bimbingan[$j]['statusKelulusan'] == 1) {
                    $jumlah_bimbingan_lulus++;
                }
            }
            $dosen[$i]['jumlah_mahasiswa_bimbingan'] = $this->getMahasiswaBimbingan($dosen[$i]['nip'])->num_rows();
            $dosen[$i]['jumlah_bimbingan_lulus'] = $jumlah_bimbingan_lulus;
            $dosen[$i]['jumlah_menguji'] = $this->db->get_where('penguji', ['Dosennip' => $dosen[$i]['nip']])->num_rows();
        }
        return $dosen;
    }
    public function getDetailRekapDosen($nip, $star_date = null, $end_date = null)
    {
        $dosen = $this->db->get_where('dosen', ['nip' => $nip])->row_array();

        //inisialisasi variabel
        $jumlah_pembimbing_ketua = 0;
        $jumlah_pembimbing_1 = 0;
        $jumlah_pembimbing_2 = 0;
        $jumlah_promotor = 0;
        $jumlah_co_promotor_1 = 0;
        $jumlah_co_promotor_2 = 0;
        // S2
        $jumlah_komisi = 0;
        $jumlah_proposal = 0;
        $jumlah_semhas = 0;
        $jumlah_tesis = 0;
        $jumlah_wisuda = 0;

        // S3
        $jumlah_makalah1 = 0;
        $jumlah_makalah2 = 0;
        $jumlah_seminarProposal = 0;
        $jumlah_proposal_s3 = 0;
        $jumlah_ujian_proposal_s3 = 0;
        $jumlah_pelaksanaan_penelitian = 0;
        $jumlah_persentasi3 = 0;
        $jumlah_seminarHasil = 0;
        $jumlah_ekternalReview = 0;
        $jumlah_ujianDisertasi = 0;
        $jumlah_wisuda_s3 = 0;

        $jumlah_belum_lulus = 0;
        $jumlah_lulus = 0;

        //Jumlah Sebagai Pembimbing
        $mahasiswa_bimbingan = $this->getMahasiswaBimbingan($nip, $star_date, $end_date)->result_array();
        for ($i = 0; $i < count($mahasiswa_bimbingan); $i++) {
            if ($mahasiswa_bimbingan[$i]['statusKelulusan'] == 1) {
                $jumlah_lulus++;
            } else if ($mahasiswa_bimbingan[$i]['statusKelulusan'] == 0) {
                $jumlah_belum_lulus++;
            };
            if ($mahasiswa_bimbingan[$i]['statusPembimbing'] == 2) {
                $jumlah_pembimbing_1++;
            } else if ($mahasiswa_bimbingan[$i]['statusPembimbing'] == 3) {
                $jumlah_pembimbing_2++;
            } else if ($mahasiswa_bimbingan[$i]['statusPembimbing'] == 4) {
                $jumlah_promotor++;
            } else if ($mahasiswa_bimbingan[$i]['statusPembimbing'] == 5) {
                $jumlah_co_promotor_1++;
            } else if ($mahasiswa_bimbingan[$i]['statusPembimbing'] == 6) {
                $jumlah_co_promotor_2++;
            } else if ($mahasiswa_bimbingan[$i]['statusPembimbing'] == 1) {
                $jumlah_pembimbing_ketua++;
            }

            if ($mahasiswa_bimbingan[$i]['statusWisuda'] == 1 && $mahasiswa_bimbingan[$i]['jenjang'] == 'S2') {
                $jumlah_wisuda++;
            } elseif ($mahasiswa_bimbingan[$i]['statusWisuda'] == 1 && $mahasiswa_bimbingan[$i]['jenjang'] == 'S3') {
                $jumlah_wisuda_s3++;
            }
            $ujian_mahasiswa = $this->db->get_where('ujian', ['MahasiswaNim' => $mahasiswa_bimbingan[$i]['Mahasiswanim']])->result_array();
            for ($j = 0; $j < count($ujian_mahasiswa); $j++) {
                if ($ujian_mahasiswa[$j]['kodeUjiankode'] == 1) {
                    $jumlah_komisi++;
                } else if ($ujian_mahasiswa[$j]['kodeUjiankode'] == 2) {
                    $jumlah_proposal++;
                } else if ($ujian_mahasiswa[$j]['kodeUjiankode'] == 3) {
                    $jumlah_semhas++;
                } else if ($ujian_mahasiswa[$j]['kodeUjiankode'] == 4) {
                    $jumlah_tesis++;
                } elseif ($ujian_mahasiswa[$j]['kodeUjiankode'] == 5) {
                    $jumlah_makalah1++;
                } elseif ($ujian_mahasiswa[$j]['kodeUjiankode'] == 6) {
                    $jumlah_makalah2++;
                } elseif ($ujian_mahasiswa[$j]['kodeUjiankode'] == 7) {
                    $jumlah_seminarProposal++;
                } elseif ($ujian_mahasiswa[$j]['kodeUjiankode'] == 8) {
                    $jumlah_proposal_s3++;
                } elseif ($ujian_mahasiswa[$j]['kodeUjiankode'] == 9) {
                    $jumlah_persentasi3++;
                } elseif ($ujian_mahasiswa[$j]['kodeUjiankode'] == 10 || $ujian_mahasiswa[$j]['kodeUjiankode'] == 15) {
                    $jumlah_seminarHasil++;
                } elseif ($ujian_mahasiswa[$j]['kodeUjiankode'] == 11) {
                    $jumlah_ekternalReview++;
                } elseif ($ujian_mahasiswa[$j]['kodeUjiankode'] == 12 || $ujian_mahasiswa[$j]['kodeUjiankode'] == 16) {
                    $jumlah_ujianDisertasi++;
                } elseif ($ujian_mahasiswa[$j]['kodeUjiankode'] == 13) {
                    $jumlah_ujian_proposal_s3++;
                } elseif ($ujian_mahasiswa[$j]['kodeUjiankode'] == 14) {
                    $jumlah_pelaksanaan_penelitian++;
                }
            };
        };

        //Jumlah sebagai pembimbing
        $jumlah_pembimbing_total = $jumlah_pembimbing_1 + $jumlah_pembimbing_2 + $jumlah_promotor + $jumlah_co_promotor_1 + $jumlah_co_promotor_2 + $jumlah_pembimbing_ketua;
        $dosen['jumlah_pembimbing'] = [
            'total' => $jumlah_pembimbing_total,
            1 => $jumlah_pembimbing_1,
            2 => $jumlah_pembimbing_2,
            'promotor' => $jumlah_promotor,
            'co_promotor_1' => $jumlah_co_promotor_1,
            'co_promotor_2' => $jumlah_co_promotor_2,
            'ketua' => $jumlah_pembimbing_ketua,
        ];

        //Jumlah sebagai penguji
        $jumlah_penguji_ketua = $this->getJumlahMenguji($nip, 7, $star_date, $end_date);
        $jumlah_penguji_1 = $this->getJumlahMenguji($nip, 8, $star_date, $end_date);
        $jumlah_penguji_2 = $this->getJumlahMenguji($nip, 9, $star_date, $end_date);
        $jumlah_penguji_3 = $this->getJumlahMenguji($nip, 10, $star_date, $end_date);
        $jumlah_penguji_tamu_1 = $this->getJumlahMenguji($nip, 11, $star_date, $end_date);
        $jumlah_penguji_tamu_2 = $this->getJumlahMenguji($nip, 12, $star_date, $end_date);

        $jumlah_penguji_total = $jumlah_penguji_ketua + $jumlah_penguji_1 + $jumlah_penguji_2 + $jumlah_penguji_3 + $jumlah_penguji_tamu_1 + $jumlah_penguji_tamu_2;
        $dosen['jumlah_penguji'] = [
            'total' => $jumlah_penguji_total,
            'ketua' => $jumlah_penguji_ketua,
            1 => $jumlah_penguji_1,
            2 => $jumlah_penguji_2,
            3 => $jumlah_penguji_3,
            'tamu_1' => $jumlah_penguji_tamu_1,
            'tamu_2' =>  $jumlah_penguji_tamu_2
        ];

        //Jumlah Wisuda
        $dosen['jumlah_wisuda'] = $jumlah_wisuda;
        $dosen['jumlah_wisuda_s3'] = $jumlah_wisuda_s3;

        //Jumlah detail ujian
        $jumlah_ujian_total = $jumlah_komisi + $jumlah_proposal + $jumlah_semhas + $jumlah_tesis + $jumlah_wisuda;
        $jumlah_ujian_total_s3 =  $jumlah_makalah1 + $jumlah_makalah2 + $jumlah_seminarProposal + $jumlah_proposal_s3 + $jumlah_ujian_proposal_s3 + $jumlah_pelaksanaan_penelitian + $jumlah_persentasi3 + $jumlah_seminarHasil + $jumlah_ekternalReview + $jumlah_ujianDisertasi;


        $dosen['jumlah_ujian'] = [
            'total' => $jumlah_ujian_total,
            'komisi' => $jumlah_komisi,
            'proposal' => $jumlah_proposal,
            'semhas' => $jumlah_semhas,
            'tesis' => $jumlah_tesis,
            'totals3' => $jumlah_ujian_total_s3,
            'makalah1' => $jumlah_makalah1,
            'makalah2' => $jumlah_makalah2,
            'seminarProposal' => $jumlah_seminarProposal,
            'proposal_s3' => $jumlah_proposal_s3,
            'ujian_proposal_s3' => $jumlah_ujian_proposal_s3,
            'pelaksanaan_penelitian' => $jumlah_pelaksanaan_penelitian,
            'persentasi3' => $jumlah_persentasi3,
            'seminarHasil' => $jumlah_seminarHasil,
            'eksternalReview' =>  $jumlah_ekternalReview,
            'ujianDisertasi' => $jumlah_ujianDisertasi
        ];

        //Jumlah lulus/belum
        $jumlah_kelulusan_total = $jumlah_lulus + $jumlah_belum_lulus;
        $dosen['jumlah_kelulusan'] = ['total' => $jumlah_kelulusan_total, 'lulus' => $jumlah_lulus, 'belum' => $jumlah_belum_lulus];

        $dosen['jumlah_mahasiswa_bimbingan'] = $this->getMahasiswaBimbingan($nip)->num_rows();
        $dosen['jumlah_menguji'] = $this->db->get_where('penguji', ['Dosennip' => $nip])->num_rows();
        echo json_encode($dosen);
    }

    public function getDetailDosen($nip)
    {
        return $this->db->get_where('dosen', ['nip' => $nip])->row_array();
    }

    public function getMahasiswaBimbingan($dosen_nip, $star_date = null, $end_date = null)
    {
        $this->db->where('pembimbing.Dosennip', $dosen_nip);
        if ($star_date != null & $end_date != null) {
            $this->db->where('mahasiswa.tglMulaiTA >=', $star_date);
            $this->db->where('mahasiswa.tglMulaiTA <=', $end_date);
        }
        $this->db->select('Mahasiswanim, Dosennip, id, statusPembimbing, nama, statusKelulusan, statusWisuda, statusTOEFL, statusTPA, mahasiswa.jenjang, nama_prodi, nama_jurusan,mahasiswa.tglMulaiTA');
        $this->db->from('pembimbing');
        $this->db->join('mahasiswa', 'mahasiswa.nim = pembimbing.Mahasiswanim', 'right');
        $this->db->join('prodi', 'prodi.kode = mahasiswa.prodikode');
        $this->db->join('jurusan', 'jurusan.kode = prodi.jurusankode');
        return $this->db->get();
    }

    public function getStatusBimbingan($nip, $star_date = null, $end_date = null)
    {
        $this->db->select('pmb.mahasiswanim ,MAX(kodeujian.kode) as K,pmb.tgl_tambah_pembimbing');
        $this->db->from('pembimbing as pmb');
        $this->db->join('ujian', 'ujian.mahasiswanim = pmb.mahasiswanim', 'left');
        $this->db->join('kodeujian', 'ujian.kodeujiankode = kodeujian.kode', 'left');
        $this->db->where('pmb.dosennip', $nip);
        if ($star_date != null && $end_date != null) {
            $this->db->where('pmb.tgl_tambah_pembimbing >=', $star_date);
            $this->db->where('pmb.tgl_tambah_pembimbing <=', $end_date);
        }
        $this->db->group_by('pmb.mahasiswanim');
        $from_clause = $this->db->get_compiled_select();
        $this->db->select('kodeujian.nama_ujian,kode.*,mahasiswa.nama,prodi.nama_prodi,mahasiswa.jenjang,statusUjian,statusKelulusan');
        $this->db->from('kodeujian');
        $this->db->join('(' . $from_clause . ') as kode', 'kode.K = kodeujian.kode', 'right');
        $this->db->join('mahasiswa', 'mahasiswa.nim = kode.mahasiswanim', 'left');
        $this->db->join('prodi', 'mahasiswa.prodikode = prodi.kode', 'left');
        $this->db->join('ujian', 'kode.mahasiswanim = ujian.mahasiswanim AND ujian.kodeujiankode = kode.K', 'left');
        $this->db->order_by('kode.tgl_tambah_pembimbing', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getUjian($nip)
    {
        $this->db->select('ujian.id,mahasiswa.nama,kodeujian.nama_ujian,ujian.tgl_ujian,ujian.nilai_akhir');
        $this->db->from('penguji');
        $this->db->where('penguji.dosennip', $nip);
        $this->db->join('ujian', 'ujian.id=penguji.ujianid');
        $this->db->join('kodeujian', 'ujian.kodeujiankode=kodeujian.kode');
        $this->db->join('mahasiswa', 'ujian.mahasiswanim=mahasiswa.nim');
        $this->db->order_by('penguji.dosennip');
        return $this->db->get()->result_array();
    }
    public function updateNilai($nilai, $id_penguji)
    {
        $this->db->set('nilai', $nilai);
        $this->db->where('id', $id_penguji);
        $this->db->update('penguji');
    }
    public function updateNilaiAkhir($updateNilaiAkhir, $id_ujian)
    {
        if ($updateNilaiAkhir > 80) {
            $this->db->set('nilai_huruf', 'A');
            $this->db->set('bobot', 4.0);
            $this->db->set('statusUjian', 1);
        } elseif ($updateNilaiAkhir > 75) {
            $this->db->set('nilai_huruf', 'B+');
            $this->db->set('bobot', 3.5);
            $this->db->set('statusUjian', 1);
        } elseif ($updateNilaiAkhir > 69) {
            $this->db->set('nilai_huruf', 'B');
            $this->db->set('bobot', 3.0);
            $this->db->set('statusUjian', 1);
        } elseif ($updateNilaiAkhir > 60) {
            $this->db->set('nilai_huruf', 'C+');
            $this->db->set('bobot', 2.5);
            $this->db->set('statusUjian', 3);
        } elseif ($updateNilaiAkhir > 55) {
            $this->db->set('nilai_huruf', 'C');
            $this->db->set('bobot', 2.0);
            $this->db->set('statusUjian', 3);
        } elseif ($updateNilaiAkhir > 50) {
            $this->db->set('nilai_huruf', 'D+');
            $this->db->set('bobot', 1.5);
            $this->db->set('statusUjian', 3);
        } elseif ($updateNilaiAkhir > 44) {
            $this->db->set('nilai_huruf', 'D');
            $this->db->set('bobot', 1.0);
            $this->db->set('statusUjian', 3);
        } elseif ($updateNilaiAkhir > 0) {
            $this->db->set('nilai_huruf', 'E');
            $this->db->set('bobot', 0.0);
            $this->db->set('statusUjian', 3);
        } else {
            $this->db->set('nilai_huruf', 'K');
            $this->db->set('bobot', 0.0);
            $this->db->set('statusUjian', 2);
        }
        $this->db->set('nilai_akhir', $updateNilaiAkhir);
        $this->db->where('id', $id_ujian);
        $this->db->update('ujian');
    }
    public function cekNilaiAkhir($id_ujian)
    {
        $this->db->select_avg('penguji.nilai');
        $this->db->from('penguji');
        $this->db->where('penguji.ujianid', $id_ujian);
        return $this->db->get()->row_array();
    }

    public function getPengujiHariIni()
    {
        // $this->db->select('*');
        $pengujiHariIni = 0;
        $dosen = $this->db->get('dosen')->result_array();
        for ($i = 0; $i < count($dosen); $i++) {
            $this->db->where('penguji.Dosennip', $dosen[$i]['nip']);
            $this->db->select('*');
            $this->db->from('penguji');
            $this->db->join('ujian', 'ujian.id = penguji.Ujianid');
            $jadwal_menguji = $this->db->get()->result_array();
            $dosen[$i]['jadwal_menguji'] = $jadwal_menguji;
            $ujianHariIni = 0;
            for ($j = 0; $j < count($jadwal_menguji); $j++) {
                if ($jadwal_menguji[$j]['tgl_ujian'] === date('Y-m-d')) {
                    $ujianHariIni++;
                }
            }
            if ($ujianHariIni > 0) {
                $pengujiHariIni++;
            }
            // $dosen[$i]['menguji_hari_ini']
        }
        // $result = $this->db->get()->result_array();
        return $pengujiHariIni;
    }

    public function getPembimbingTerbanyak()
    {
        $result = $this->getRekapAllDosen();
        $dosen['bimbingan_terbanyak'] = $result[0];
        for ($i = 0; $i < count($result) - 1; $i++) {
            if ($result[$i]['jumlah_mahasiswa_bimbingan'] < $result[$i + 1]['jumlah_mahasiswa_bimbingan']) {
                $dosen['bimbingan_terbanyak'] = $result[$i + 1];
            }
        }
        return $dosen['bimbingan_terbanyak'];
        // echo json_encode($result);
    }
    public function getPimpinanPlusProdi()
    {
        $this->db->where('jabatan_pimpinan != "" ');
        $this->db->select('prodi.*, dosen.*');
        $this->db->from('dosen');
        $this->db->join('prodi', 'dosen.prodi_dosen=prodi.kode');
        return $this->db->get()->result_array();
    }

    public function getUjianHariIni($nip)
    {
        $this->db->select('mhs.nama,kodeujian.nama_ujian');
        $this->db->from('penguji');
        $this->db->join('ujian', 'penguji.Ujianid = ujian.id', 'left');
        $this->db->join('kodeujian', 'kodeujian.kode=ujian.kodeUjiankode', 'left');
        $this->db->join('mahasiswa as mhs', 'mhs.nim = ujian.Mahasiswanim', 'left');
        $this->db->where('tgl_ujian', date('Y/m/d'));
        $this->db->where('penguji.Dosennip', $nip);
        return $this->db->get()->result_array();
    }
}
