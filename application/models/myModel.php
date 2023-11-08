<?php
class MyModel extends CI_model
{
    public function getData($table)
    {
        return $this->db->get($table);
    }

    public function insertData($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function insertBatchData($data, $table)
    {
        $this->db->insert_batch($table, $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function deleteData($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function set_notifikasi_swal($icon, $title, $text)
    {
        $this->session->set_flashdata('icon', $icon);
        $this->session->set_flashdata('title', $title);
        $this->session->set_flashdata('text', $text);
    }

    public function cekLogin($user, $password)
    {
        $pegawai = $this->db->query("select * FROM auth WHERE user='$user' AND password='$password'");

        if ($pegawai->num_rows() > 0) {
            return $pegawai->row();
        } else {
            return FALSE;
        }
    }

    public function getActiveProductData()
    {
        $sql = "SELECT kdbahan, nmbahan FROM bahan ORDER BY kdbahan";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    public function getActiveProductSell()
    {
        $sql = "select a.*, b.nmbarang FROM harga a, barang b WHERE a.kdbarang=b.kdbarang order by a.kdbarang";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    public function getActiveProductDatas()
    {
        $sql = "select kdbahan, nmbahan from rekap_bahan_baku WHERE jmlSaldo > 0 order by kdbahan";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    public function getJumlahData($id = null)
    {
        if ($id) {
            $sql = "SELECT a.kdbahan, a.jmlSaldo, b.satbeli, c.nama FROM rekap_bahan_baku a, bahan b, satuan c WHERE a.kdbahan=b.kdbahan AND b.satbeli=c.kode AND a.kdbahan = ?";
            $query = $this->db->query($sql, array($id));
            return $query->row_array();
        }
    }

    public function getPrice($id = null)
    {
        if ($id) {
            $sql = "SELECT kdbarang, harga FROM harga WHERE kdbarang = ?";
            $query = $this->db->query($sql, array($id));
            return $query->row_array();
        }
    }

    public function getBulan($bulan)
    {
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
        }
        return $bulan;
    }

    public function getCountry($page)
    {
        $offset = 10 * $page;
        $limit  = 10;
        $sql    = "select * from pengumuman limit $offset ,$limit";
        $result = $this->db->query($sql)->result();
        return $result;
    }
}
