<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Operator_model extends CI_Model
{
    public function cekValidasi()
    {
        $this->db->select('mahasiswa.nama,mahasiswa.jenjang,ujian.*,kodeujian.nama_ujian,prodi.nama_prodi,mahasiswa.nim');
        $this->db->from('mahasiswa');
        $this->db->join('ujian', 'ujian.mahasiswanim=mahasiswa.nim');
        $this->db->join('kodeujian', 'ujian.kodeujiankode=kodeujian.kode');
        $this->db->join('prodi', 'prodi.kode=mahasiswa.prodikode');
        $this->db->order_by('ujian.statusUjian', 'DESC');
        return $this->db->get()->result_array();
    }
    public function cekValidasiHariIni()
    {
        $time = date('Y-m-d');
        $this->db->where('ujian.tgl_ujian', $time);
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
        kodeujian.nama_ujian,is.judulAkhir');
        $this->db->from('ujian');
        $this->db->where('ujian.id=' . $id_ujian);
        $this->db->join('kodeujian', 'kodeujian.kode=ujian.kodeujiankode');
        $this->db->join('mahasiswa', 'mahasiswa.nim=ujian.mahasiswanim');
        $this->db->join('isianmahasiswa as is', 'is.Mahasiswanim=mahasiswa.nim', 'left');

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
        if ($star_date != null && $end_date != null) {
            $this->db->where('pembimbing.tgl_tambah_pembimbing >=', $star_date);
            $this->db->where('pembimbing.tgl_tambah_pembimbing <=', $end_date);
        }
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
        if ($data['valid'] == 1 || $data['valid'] == 3) {
            $this->db->set('status_notif', 0);
        }
        $this->db->set('valid', $data['valid']);
        $this->db->where('id', $data['id']);
        $this->db->update('ujian');
    }
    public function getPembimbing($id_ujian)
    {
        $this->db->select('dosen.*,pembimbing.statusPembimbing, posisi.status_dosen');
        $this->db->from('pembimbing');
        $this->db->join('dosen', 'pembimbing.dosennip=dosen.nip');
        $this->db->join('posisi', 'pembimbing.statusPembimbing = posisi.id', 'left');
        $this->db->join('ujian', 'ujian.id=' . $id_ujian);
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
        $this->db->where('posisi.id <', 13);
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

    public function cekPimpinan()
    {
        $this->db->select('*');
        $this->db->from('dosen as d');
        $this->db->where('d.jabatan_pimpinan != ""');
        $from_clause = $this->db->get_compiled_select();
        $this->db->select('dosen.*');
        $this->db->from('dosen');
        $this->db->join('(' . $from_clause . ') as C', 'dosen.nip = C.nip ', 'left');
        $this->db->where('C.nip', null);
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
    // publikasi
    public function getDataPublikasi($star_date = null, $end_date = null)
    {
        $this->db->select('mhs.nama,publikasi.judulArtikel,publikasi.namaJurnal,p.nama_prodi,publikasi.valid,publikasi.tanggal,mhs.jenjang,publikasi.idJurnal,mhs.nim');
        $this->db->from('publikasi');
        $this->db->join('mahasiswa as mhs', 'publikasi.mahasiswanim=mhs.nim', 'left');
        $this->db->join('prodi as p', 'p.kode=mhs.prodikode', 'left');
        if ($star_date != null && $end_date != null) {
            $this->db->where('tanggal >=', $star_date);
            $this->db->where('tanggal <=', $end_date);
        }
        $this->db->order_by('publikasi.valid', 'DESC');
        return $this->db->get()->result_array();
    }

    //get daftar ujian mhs
    public function getDetailMahasiswa($nim)
    {
        $this->db->select('prodi.jurusankode,mahasiswa.jenjang');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'mahasiswa.prodikode=prodi.kode', 'left');
        $this->db->where('mahasiswa.nim', $nim);
        return $this->db->get()->row_array();
    }
    //get daftar nilai
    public function getDetailUjian($nim)
    {
        $this->db->select('ujian.id,ujian.nilai_akhir,ujian.kodeUjiankode,kodeujian.*');
        $this->db->from('ujian');
        $this->db->join('kodeujian', 'ujian.kodeUjianKode=kodeujian.kode', 'left');
        $this->db->where('ujian.MahasiswaNim', $nim);
        return $this->db->get()->result_array();
    }

    //update nilaiTA
    public function updateNilaiTA($nilaiTA, $nim)
    {
        if ($nilaiTA > 80) {
            $this->db->set('nilai_huruf', 'A');
            $this->db->set('statusKelulusan', 1);
        } elseif ($nilaiTA > 75) {
            $this->db->set('nilai_huruf', 'B+');
            $this->db->set('statusKelulusan', 1);
        } elseif ($nilaiTA > 69) {
            $this->db->set('nilai_huruf', 'B');
            $this->db->set('statusKelulusan', 1);
        } elseif ($nilaiTA > 60) {
            $this->db->set('nilai_huruf', 'C+');
            $this->db->set('statusKelulusan', 0);
        } elseif ($nilaiTA > 55) {
            $this->db->set('nilai_huruf', 'C');
            $this->db->set('statusKelulusan', 0);
        } elseif ($nilaiTA > 50) {
            $this->db->set('nilai_huruf', 'D+');
            $this->db->set('statusKelulusan', 0);
        } elseif ($nilaiTA > 44) {
            $this->db->set('nilai_huruf', 'D');
            $this->db->set('statusKelulusan', 0);
        } elseif ($nilaiTA > 0) {
            $this->db->set('nilai_huruf', 'E');
            $this->db->set('statusKelulusan', 0);
        } else {
            $this->db->set('nilai_huruf', 'K');
            $this->db->set('statusKelulusan', 0);
        }
        $this->db->set('nilaiTA', $nilaiTA);
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa');
    }
}
