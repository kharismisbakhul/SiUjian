<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    public function getUjianTerakhir($nim)
    {
        $this->db->where('Mahasiswanim', $nim);
        $this->db->select('nama_ujian, nilai_akhir, statusUjian, max(kodeUjiankode) as ujian_terakhir');
        $this->db->from('ujian');
        $this->db->join('kodeujian', 'kodeujian.kode = ujian.kodeUjiankode', 'left');
        return $this->db->get()->row_array();
    }

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
    public function getPosisiPembimbing()
    {
        $this->db->select('*');
        $this->db->from('posisi');
        $this->db->where('id <', 7);
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
            'statusPenguji' => $pembimbing['statusPenguji']

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

    public function getMahasiswaPlusProdi()
    {
        $this->db->select('mahasiswa.nama, mahasiswa.prodikode, prodi.kode, prodi.nama_prodi, mahasiswa.jenjang,mahasiswa.nim');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'mahasiswa.prodikode= prodi.kode');
        return $this->db->get()->result_array();
    }

    public function getDetailLaporanMahasiswa()
    {
        $mahasiswa = $this->getMahasiswaPlusProdi();
        for ($i = 0; $i < count($mahasiswa); $i++) {
            $mahasiswa[$i]['ujian_terakhir'] = $this->getUjianTerakhir($mahasiswa[$i]['nim']);
        }
        return $mahasiswa;
    }
}
