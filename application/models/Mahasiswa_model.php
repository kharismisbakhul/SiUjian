<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    public function getProfilJurusan($data)
    {
        $this->db->select('prodi.nama_prodi, jurusan.nama_jurusan');
        // prodi -> nama -> kode
        // jurusan -> nama -> kode
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'prodi.kode = ' . $data);
        $this->db->join('jurusan', 'jurusan.kode = prodi.jurusankode');

        return $this->db->get()->row_array();
    }

    public function getPosisiPembimbing($nim)
    {
        $this->db->select('dosennip,statusPembimbing');
        $this->db->from('pembimbing');
        $this->db->where('Mahasiswanim', $nim);
        $from_clause = $this->db->get_compiled_select();
        $this->db->select('*');
        $this->db->from('posisi');
        $this->db->join('(' . $from_clause . ') as kode', 'kode.statusPembimbing = posisi.id', 'left');
        $this->db->where('id <', 7);
        $this->db->where('kode.statusPembimbing', null);
        return $this->db->get()->result_array();
    }

    public function getPembimbing($nim)
    {
        $this->db->select('dosen.nama_dosen,pembimbing.statusPembimbing,pembimbing.id,posisi.status_dosen');
        $this->db->from('pembimbing');
        $this->db->join('dosen', 'pembimbing.dosennip=dosen.nip');
        $this->db->join('posisi', 'posisi.id=pembimbing.statusPembimbing');
        $this->db->where('pembimbing.mahasiswanim', $nim);
        return $this->db->get()->result_array();
    }
    public function updatePenguji($pembimbing, $ujian)
    {
        $data = [
            'Dosennip' => $pembimbing['Dosennip'],
            'Ujianid' => $ujian,
            'statusPenguji' => $pembimbing['statusPenguji'],
            'tgl_tambah_penguji' => date("Y/m/d")
        ];
        $this->db->insert('penguji', $data);
    }
    public function getNewIdUjian($nim, $kode)
    {
        $this->db->select('id');
        $this->db->from('ujian');
        $this->db->where('kodeUjiankode', $kode);
        $this->db->where('MahasiswaNim', $nim);
        return $this->db->get()->row_array();
    }
    public function getDaftarPembimbing($nim)
    {
        $this->db->select('pembimbing.*');
        $this->db->from('pembimbing');
        $this->db->where('pembimbing.mahasiswanim', $nim);
        $from_clause = $this->db->get_compiled_select();
        $this->db->select('dosen.*');
        $this->db->from('(' . $from_clause . ') as pmb');
        $this->db->join('dosen', 'pmb.dosennip = dosen.nip', 'right');
        $this->db->where('pmb.dosennip', null);
        return $this->db->get()->result_array();
    }
    public function getBelumUjian($data)
    {
        $this->db->select('kodeujian.*');
        $this->db->from('mahasiswa');
        $this->db->join('ujian', 'ujian.MahasiswaNim=' . $data);
        $this->db->join('kodeujian', 'ujian.kodeUjianKode = kodeujian.kode', 'right');
        $this->db->where('ujian.kodeUjianKode=', null);
        return $this->db->get()->result_array();
    }
    public function getUjian($data)
    {
        $this->db->select('ujian.*,kodeujian.nama_ujian');
        $this->db->from('mahasiswa');
        $this->db->join('ujian', 'ujian.MahasiswaNim=' . $data);
        $this->db->join('kodeujian', 'ujian.kodeUjianKode = kodeujian.kode');
        $this->db->group_by('kodeujian.kode');
        $this->db->order_by('kodeujian.kode', 'ASC');
        return $this->db->get()->result_array();
    }
    public function getUjian_Edit($data)
    {
        $this->db->select('kodeujian.*');
        $this->db->from('ujian');
        $this->db->where('id', $data);
        $this->db->join('kodeujian', 'ujian.kodeUjiankode = kodeujian.kode');
        return $this->db->get()->row_array();
    }
    public function editUjian($dataUjian, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('ujian', $dataUjian);
    }
    public function getDetailUjian($id_ujian)
    {
        $this->db->select('ujian.*,kodeujian.nama_ujian');
        $this->db->from('ujian');
        $this->db->join('kodeujian', 'kodeujian.kode=ujian.kodeujiankode');
        $this->db->where('ujian.id', $id_ujian);
        return $this->db->get()->row_array();
    }
    public function getPublikasi($data)
    {
        $this->db->select('publikasi.*');
        $this->db->from('mahasiswa');
        $this->db->join('publikasi', 'publikasi.Mahasiswanim=' . $data);
        $this->db->group_by('publikasi.idJurnal');
        return $this->db->get()->result_array();
    }
    public function editPublikasi($dataPublikasi, $id)
    {
        $this->db->where('idJurnal', $id);
        $this->db->update('publikasi', $dataPublikasi);
    }
    public function insertUjian($dataUjian)
    {
        $this->db->set($dataUjian);
        $this->db->insert('ujian');
    }
    public function getMahasiswaPlusProdi($prodi = 0)
    {
        if ($prodi == 0) {
            $this->db->select('mahasiswa.nim, mahasiswa.nama, mahasiswa.prodikode, prodi.kode, prodi.nama_prodi, mahasiswa.jenjang');
            $this->db->from('mahasiswa');
            $this->db->join('prodi', 'mahasiswa.prodikode= prodi.kode');
            return $this->db->get()->result_array();
        } else {
            // var_dump($prodi);
            // die;
            $this->db->where('mahasiswa.prodikode', intval($prodi));
            $this->db->select('mahasiswa.nim, mahasiswa.nama, mahasiswa.prodikode, prodi.kode, prodi.nama_prodi, mahasiswa.jenjang');
            $this->db->from('mahasiswa');
            $this->db->join('prodi', 'mahasiswa.prodikode = prodi.kode');
            return $this->db->get()->result_array();
        }
    }

    public function getUjianTerakhir($nim)
    {
        $this->db->where('Mahasiswanim', $nim);
        $this->db->select('max(kodeUjiankode) as ujian_terakhir');
        $this->db->from('ujian');
        $ujian_terakhir_kode = $this->db->get()->row_array();

        $ujian_terakhir = $this->getDetailUjianTerakhir($nim, $ujian_terakhir_kode['ujian_terakhir']);
        $ujian_terakhir['kode'] = $ujian_terakhir_kode['ujian_terakhir'];

        return $ujian_terakhir;
    }

    public function getDetailUjianTerakhir($nim, $kode)
    {
        $this->db->where('Mahasiswanim', $nim);
        $this->db->where('kodeUjiankode', $kode);
        $this->db->select('nama_ujian, nilai_akhir, statusUjian');
        $this->db->from('ujian');
        $this->db->join('kodeujian', 'kodeujian.kode = ujian.kodeUjiankode', 'left');
        $ujian_terakhir_detail = $this->db->get()->row_array();

        return $ujian_terakhir_detail;
    }

    public function getUjianSelanjutnya($nim)
    {
        $this->db->where('Mahasiswanim', $nim);
        $this->db->where('statusUjian', 2);
        $this->db->select('id, nama_ujian, tgl_ujian, nilai_akhir, statusUjian, max(kodeUjiankode) as ujian_terakhir');
        $this->db->from('ujian');
        $this->db->join('kodeujian', 'kodeujian.kode = ujian.kodeUjiankode', 'left');
        $result = $this->db->get()->row_array();

        $this->db->where('Ujianid', $result['id']);
        $this->db->select('nip, nama_dosen');
        $this->db->from('penguji');
        $this->db->join('dosen', 'dosen.nip = penguji.Dosennip');
        $result['dosen_penguji'] = $this->db->get()->result_array();
        return $result;
    }


    public function getDetailMahasiswa($nim)
    {
        return $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();
    }

    public function getAllDetailLaporanMahasiswa($prodi = 0)
    {
        if ($prodi == 0) {
            $mahasiswa = $this->getMahasiswaPlusProdi();
            for ($i = 0; $i < count($mahasiswa); $i++) {
                $mahasiswa[$i]['ujian_terakhir'] = $this->getUjianTerakhir($mahasiswa[$i]['nim']);
            }
            return $mahasiswa;
        } else {
            $mahasiswa = $this->getMahasiswaPlusProdi($prodi);
            for ($i = 0; $i < count($mahasiswa); $i++) {
                $mahasiswa[$i]['ujian_terakhir'] = $this->getUjianTerakhir($mahasiswa[$i]['nim']);
            }
            return $mahasiswa;
        }
    }

    public function getDetailLaporanMahasiswa($star_date = null, $end_date = null)
    {
        $this->db->select('mhs.nim,MAX(kodeujian.kode) as K');
        $this->db->from('mahasiswa as mhs');
        $this->db->join('ujian', 'ujian.mahasiswanim = mhs.nim', 'left');
        $this->db->join('kodeujian', 'ujian.kodeujiankode = kodeujian.kode', 'left');
        if ($star_date != null && $end_date != null) {
            $this->db->where('mhs.tglMulaiTA >=', $star_date);
            $this->db->where('mhs.tglMulaiTA <=', $end_date);
        }
        $this->db->group_by('mhs.nim');
        $this->db->order_by('mhs.nim');
        $from_clause = $this->db->get_compiled_select();
        $this->db->select('kode.*,kodeujian.nama_ujian,ujian.id,ujian.statusUjian,mahasiswa.nama,prodi.nama_prodi,mahasiswa.jenjang,mahasiswa.statusKelulusan,mahasiswa.tglMulaiTA');
        $this->db->from('kodeujian');
        $this->db->join('(' . $from_clause . ') as kode', 'kode.K = kodeujian.kode', 'right');
        $this->db->join('ujian', 'kode.nim = ujian.mahasiswanim and kode.K = ujian.kodeujiankode', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.nim=kode.nim', 'left');
        $this->db->join('prodi', 'mahasiswa.prodikode = prodi.kode', 'left');
        return $this->db->get()->result_array();
    }


    public function getDosenPembimbing($nim)
    {
        $this->db->select('Dosennip, dosen.nama_dosen, pembimbing.statusPembimbing');
        $this->db->from('pembimbing');
        $this->db->join('dosen', 'dosen.nip = pembimbing.Dosennip', 'left');
        $this->db->where('pembimbing.Mahasiswanim =' . $nim);
        return $this->db->get()->result_array();
    }
}
