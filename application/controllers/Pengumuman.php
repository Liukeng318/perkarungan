<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    public function index()
    {
        $ip            = $this->input->ip_address(); // Mendapatkan IP user
        $date          = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu         = time(); //
        $timeinsert = date("Y-m-d H:i:s");

        $s             = $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
        $ss         = isset($s) ? ($s) : 0;

        if ($ss == 0) {
            $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
        } else {
            $this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        }

        $pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
        $dbpengunjung       = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();
        $totalpengunjung    = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung
        $bataswaktu         = time() - 300;
        $pengunjungonline   = $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online

        $slider             = $this->db->get("slider")->result_array();
        $data['links']      = $this->db->get('pengumuman')->result_array();
        $data['linkberita'] = $this->db->query("select * from berita order by tanggal desc limit 0, 5")->result_array();

        $data['pengunjunghariini'] = $pengunjunghariini;
        $data['totalpengunjung']   = $totalpengunjung;
        $data['pengunjungonline']  = $pengunjungonline;
        $data['slider']            = $slider;
        $data['profiles']          = $this->db->get('profile')->result_array();

        $this->load->view('pengumuman', $data);
    }

    public function detail($param = "")
    {
        $id            = base64_decode($param);
        $ip            = $this->input->ip_address();
        $date          = date("Y-m-d");
        $waktu         = time();
        $timeinsert    = date("Y-m-d H:i:s");
        $s             = $this->db->query("select * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
        $ss            = isset($s) ? ($s) : 0;

        if ($ss == 0) {
            $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
        } else {
            $this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        }

        $pengunjunghariini  = $this->db->query("select * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows();
        $dbpengunjung       = $this->db->query("select COUNT(hits) as hits FROM visitor")->row();
        $totalpengunjung    = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0;
        $bataswaktu         = time() - 300;
        $pengunjungonline   = $this->db->query("select * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows();

        $data['links']             = $this->db->query("select * from pengumuman where id=$id")->result_array();
        $data['linkberita']        = $this->db->query("select * from berita order by tanggal desc limit 0, 5")->result_array();
        $data['profiles']          = $this->db->get('profile')->result_array();
        $data['pengunjunghariini'] = $pengunjunghariini;
        $data['totalpengunjung']   = $totalpengunjung;
        $data['pengunjungonline']  = $pengunjungonline;

        $this->load->view('pengumuman_detail', $data);
    }
}
