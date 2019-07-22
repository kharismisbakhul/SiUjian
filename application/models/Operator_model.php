<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator_model extends CI_Model
{

    public function cekValidasi()
    {

        $this->db->select('mahasiswa.nama,mahasiswa.jenjang,ujian.*,kodeujian.nama_ujian,prodi.nama_prodi');
        $this->db->from('mahasiswa');
        $this->db->join('ujian', 'ujian.mahasiswanim=mahasiswa.nim');
        $this->db->join('kodeujian', 'ujian.kodeujiankode=kodeujian.kode');
        $this->db->join('prodi', 'prodi.kode=mahasiswa.prodikode');
        $this->db->order_by('ujian.tgl_tambah_ujian', 'DSC');
        return $this->db->get()->result_array();
    }

    public function getUjian($id_ujian)
    {
        $this->db->select('mahasiswa.nama,
        mahasiswa.nim,
        mahasiswa.judulTugasAkhir,
        ujian.*,
        kodeujian.nama_ujian');
        $this->db->from('ujian');
        $this->db->where('ujian.id=' . $id_ujian);
        $this->db->join('kodeujian', 'kodeujian.kode=ujian.kodeujiankode');
        $this->db->join('mahasiswa', 'mahasiswa.nim=ujian.mahasiswanim');

        return $this->db->get()->row_array();
    }

    // ujian
    public function getDataPeriode($star_date = null, $end_date = null)
    {
        $this->db->select('mahasiswa.nama,mahasiswa.jenjang,ujian.*,kodeujian.nama_ujian,prodi.nama_prodi');
        $this->db->from('mahasiswa');
        $this->db->join('ujian', 'ujian.mahasiswanim=mahasiswa.nim');
        $this->db->join('kodeujian', 'ujian.kodeujiankode=kodeujian.kode');
        $this->db->join('prodi', 'prodi.kode=mahasiswa.prodikode');
        $this->db->order_by('ujian.tgl_tambah_ujian', 'DSC');
        $this->db->where('ujian.tgl_tambah_ujian >=', $star_date);
        $this->db->where('ujian.tgl_tambah_ujian <=', $end_date);
        return $this->db->get()->result_array();
    }
    // Dosen
    public function getDataPeriodeDosen($star_date = null, $end_date = null)
    {
        $this->db->select('COUNT(pembimbing.mahasiswanim) as jumlah_bimbingan,pembimbing.dosennip');
        $this->db->from('pembimbing');
        $this->db->where('pembimbing.tgl_tambah_pembimbing >=', $star_date);
        $this->db->where('pembimbing.tgl_tambah_pembimbing <=', $end_date);
        $this->db->order_by('pembimbing.tgl_tambah_pembimbing', 'ASC');
        $this->db->group_by('pembimbing.dosennip');
        $from_cluse = $this->db->get_compiled_select();

        $this->db->select('dosen.nama_dosen,dosen.nip,dosen.statusAktif,kode.jumlah_bimbingan');
        $this->db->from('dosen');
        $this->db->join('(' . $from_cluse . ') as kode', 'kode.dosennip = dosen.nip', 'left');
        return $this->db->get()->result_array();
    }

    public function validasiUjian($data)
    {
        $this->db->set('komentar', $data['komentar']);
        $this->db->set('tgl_ujian', $data['tanggal']);
        $this->db->set('valid', $data['valid']);
        $this->db->where('id', $data['id']);
        $this->db->update('ujian');
    }

    public function getPembimbing($id_ujian)
    {
        $this->db->select('dosen.*,posisi.status_dosen');
        $this->db->from('pembimbing');
        $this->db->join('dosen', 'pembimbing.dosennip=dosen.nip');
        $this->db->join('ujian', 'ujian.id=' . $id_ujian);
        $this->db->join('posisi', 'posisi.id=pembimbing.statusPembimbing', 'left');
        $this->db->where('pembimbing.mahasiswanim=ujian.mahasiswanim');
        return $this->db->get()->result_array();
    }

    public function getPosisiPenguji($ujianid)
    {
        $this->db->select('statusPenguji');
        $this->db->from('penguji');
        $this->db->where('Ujianid', $ujianid);
        $from_clause = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('posisi');
        $this->db->join('(' . $from_clause . ') as kode', 'kode.statusPenguji=posisi.id', 'left');
        $this->db->where('kode.statusPenguji', null);
        return $this->db->get()->result_array();
    }

    public function getPenguji($id_ujian)
    {
        $this->db->select('dosen.*,penguji.*,posisi.status_dosen');
        $this->db->from('penguji');
        $this->db->join('dosen', 'penguji.dosennip=dosen.nip');
        $this->db->join('ujian', 'ujian.id=' . $id_ujian);
        $this->db->join('posisi', 'posisi.id=penguji.statusPenguji', 'left');
        $this->db->where('penguji.ujianid=ujian.id');
        $this->db->order_by('posisi.id');
        return $this->db->get()->result_array();
    }

    public function cekPenguji($id_ujian)
    {
        $this->db->select('*');
        $this->db->from('penguji as B');
        $this->db->where('B.ujianid =', $id_ujian);
        $from_clause = $this->db->get_compiled_select();

        $this->db->select('dosen.*');
        $this->db->from('dosen');
        $this->db->join('(' . $from_clause . ') as C', 'dosen.nip = C.dosennip ', 'left');
        $this->db->where('C.dosennip', null);
        return $this->db->get()->result_array();
    }


    public function getDetailInfoPenguji($id_penguji)
    {
        $this->db->select('ujian.tgl_ujian,penguji.statusPenguji,kodeujian.nama_ujian');
        $this->db->from('penguji');
        $this->db->where('penguji.dosennip=' . $id_penguji);
        $this->db->join('ujian', 'ujian.id=penguji.ujianid');
        $this->db->join('kodeujian', 'kodeujian.kode=ujian.kodeujiankode');
        return $this->db->get()->result_array();
    }

    public function updateNilaiUjian($id, $nilai)
    {
        $data = ['nilai' => $nilai];
        $this->db->where('id', $id);
        $this->db->update('penguji', $data);
    }
}
