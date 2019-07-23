<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
    public function getListDosen($nip, $prodi=0)
    {
        if ($prodi == 0) {
            $query = "SELECT dosen.nama_dosen, dosen.nip, dosen.statusAktif, COUNT(pembimbing.Mahasiswanim) as 'jumlah_bimbingan' FROM dosen left join pembimbing on dosen.nip = pembimbing.Dosennip WHERE dosen.nip != $nip GROUP BY dosen.nama_dosen";
            return $this->db->query($query)->result_array();
        } else {
            $prodi = intval($prodi);
            $query = "SELECT dosen.nama_dosen, dosen.nip, dosen.statusAktif, COUNT(pembimbing.Mahasiswanim) as 'jumlah_bimbingan' FROM dosen left join pembimbing on dosen.nip = pembimbing.Dosennip WHERE dosen.prodi_dosen = $prodi AND dosen.nip != $nip GROUP BY dosen.nama_dosen";
            return $this->db->query($query)->result_array();
        }
    }
    public function getListAllDosen()
    {
            $query = "SELECT dosen.nama_dosen, dosen.nip, dosen.statusAktif, COUNT(pembimbing.Mahasiswanim) as 'jumlah_bimbingan' FROM dosen left join pembimbing on dosen.nip = pembimbing.Dosennip GROUP BY dosen.nama_dosen";
            return $this->db->query($query)->result_array();
    }

    public function getRekapDosen($nip, $prodi = 0)
    {
        //list Dosen
        $dosen = $this->getListDosen($nip);

        if ($prodi != 0) {
            $dosen = $this->getListDosen($nip, $prodi);
        }

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
    public function getDetailRekapDosen($nip)
    {
        $dosen = $this->db->get_where('dosen', ['nip' => $nip])->row_array();

        //inisialisasi variabel
        $jumlah_pembimbing_1 = 0;
        $jumlah_pembimbing_2 = 0;
        $jumlah_komisi = 0;
        $jumlah_proposal = 0;
        $jumlah_semhas = 0;
        $jumlah_tesis = 0;
        $jumlah_wisuda = 0;
        $jumlah_belum_lulus = 0;
        $jumlah_lulus = 0;

        //Jumlah Sebagai Pembimbing
        $mahasiswa_bimbingan = $this->getMahasiswaBimbingan($nip)->result_array();
        $dosen['mahasiswa_bimbingan'] = $mahasiswa_bimbingan;
        for ($i = 0; $i < count($mahasiswa_bimbingan); $i++) {
            if ($mahasiswa_bimbingan[$i]['statusKelulusan'] == 1) {
                $jumlah_lulus++;
            } else if ($mahasiswa_bimbingan[$i]['statusKelulusan'] == 0) {
                $jumlah_belum_lulus++;
            };
            if ($mahasiswa_bimbingan[$i]['statusPembimbing'] == 1) {
                $jumlah_pembimbing_1++;
            } else if ($mahasiswa_bimbingan[$i]['statusPembimbing'] == 2) {
                $jumlah_pembimbing_2++;
            };
            if ($mahasiswa_bimbingan[$i]['statusWisuda'] == 1) {
                $jumlah_wisuda++;
            };
            $ujian_mahasiswa = $this->db->get_where('ujian', ['MahasiswaNim' => $mahasiswa_bimbingan[$i]['Mahasiswanim']])->result_array();
            $dosen['mahasiswa_bimbingan'][$i]['ujian'] = $ujian_mahasiswa;
            for ($j = 0; $j < count($ujian_mahasiswa); $j++) {
                if ($ujian_mahasiswa[$j]['kodeUjiankode'] == 1) {
                    $jumlah_komisi++;
                } else if ($ujian_mahasiswa[$j]['kodeUjiankode'] == 2) {
                    $jumlah_proposal++;
                } else if ($ujian_mahasiswa[$j]['kodeUjiankode'] == 3) {
                    $jumlah_semhas++;
                } else if ($ujian_mahasiswa[$j]['kodeUjiankode'] == 4) {
                    $jumlah_tesis++;
                }
            };
        };

        //Jumlah sebagai pembimbing
        $jumlah_pembimbing_total = $jumlah_pembimbing_1 + $jumlah_pembimbing_2;
        $dosen['jumlah_pembimbing'] = ['total' => $jumlah_pembimbing_total, 1 => $jumlah_pembimbing_1, 2 => $jumlah_pembimbing_2];

        //Jumlah sebagai penguji
        $jumlah_penguji_1 = $this->db->get_where('penguji', ['Dosennip' => $nip, 'statusPenguji' => 1])->num_rows();
        $jumlah_penguji_2 = $this->db->get_where('penguji', ['Dosennip' => $nip, 'statusPenguji' => 2])->num_rows();;
        $jumlah_penguji_3 = $this->db->get_where('penguji', ['Dosennip' => $nip, 'statusPenguji' => 3])->num_rows();;

        $jumlah_penguji_total = $jumlah_penguji_1 + $jumlah_penguji_2 + $jumlah_penguji_3;
        $dosen['jumlah_penguji'] = ['total' => $jumlah_penguji_total, 1 => $jumlah_penguji_1, 2 => $jumlah_penguji_2, 3 => $jumlah_penguji_3];

        //Jumlah Wisuda
        $dosen['jumlah_wisuda'] = $jumlah_wisuda;

        //Jumlah detail ujian
        $jumlah_ujian_total = $jumlah_komisi + $jumlah_proposal + $jumlah_semhas + $jumlah_tesis + $jumlah_wisuda;
        $dosen['jumlah_ujian'] = ['total' => $jumlah_ujian_total, 'komisi' => $jumlah_komisi, 'proposal' => $jumlah_proposal, 'semhas' => $jumlah_semhas, 'tesis' => $jumlah_tesis];

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

    public function getMahasiswaBimbingan($dosen_nip)
    {
        $this->db->where('pembimbing.Dosennip', $dosen_nip);
        $this->db->select('Mahasiswanim, Dosennip, id, statusPembimbing, nama, statusKelulusan, statusWisuda, statusTOEFL, statusTPA, mahasiswa.jenjang, nama_prodi, nama_jurusan, pembimbing.tahun');
        $this->db->from('pembimbing');
        // $this->db->join('pembimbing', 'pembimbing.Dosennip = ' . $dosen_nip);
        $this->db->join('mahasiswa', 'mahasiswa.nim = pembimbing.Mahasiswanim', 'right');

        // prodi -> nama -> kode
        // jurusan -> nama -> kode
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
        $this->db->where('jabatan_pimpinan != ""');
        $this->db->select('dosen.nip, dosen.nama_dosen, dosen.prodi_dosen, prodi.nama_prodi, dosen.jabatan_pimpinan');
        $this->db->from('dosen');
        $this->db->join('prodi', 'dosen.prodi_dosen = prodi.kode');
        return $this->db->get()->result_array();
    }
}
