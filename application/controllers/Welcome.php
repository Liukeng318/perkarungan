<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$ip    		= $this->input->ip_address(); // Mendapatkan IP user
		$date  		= date("Y-m-d"); // Mendapatkan tanggal sekarang
		$waktu 		= time(); //
		$timeinsert = date("Y-m-d H:i:s");

		$s 			= $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
		$ss 		= isset($s) ? ($s) : 0;

		if ($ss == 0) {
			$this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
		} else {
			$this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
		}

		$pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
		$dbpengunjung 		= $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();
		$totalpengunjung 	= isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung
		$bataswaktu 		= time() - 300;
		$pengunjungonline  	= $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online
		$slider				= $this->db->get("slider")->result_array();
		$data['links']      = $this->db->get('link')->result_array();
		$data['pengumuman'] = $this->db->query("select * from pengumuman order by tanggal desc limit 0, 5")->result_array();
		$data['agenda'] 	= $this->db->query("select * from agenda order by tanggal desc limit 0, 5")->result_array();
		$data['daerah'] 	= $this->db->query("select * from berita where kategori = '1' order by tanggal desc limit 0, 5")->result_array();
		$data['opd'] 		= $this->db->query("select * from berita where kategori = '2' order by tanggal desc limit 0, 5")->result_array();
		$data['berita']     = $this->db->query("select * from berita order by tanggal desc limit 0, 3")->result_array();

		$data['pengunjunghariini'] = $pengunjunghariini;
		$data['totalpengunjung']   = $totalpengunjung;
		$data['pengunjungonline']  = $pengunjungonline;
		$data['slider']			   = $slider;

		$this->load->view('welcome_message', $data);
	}

	public function pesan()
	{
		$name    = $_POST['name'];
		$email   = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		date_default_timezone_set("Asia/Jayapura");
		$tanggal = date('Y-m-d H:i:s a');

		$data = array(
			"nama"    => $name,
			"email"   => $email,
			"perihal" => $subject,
			"pesan"   => $message,
			"status"  => 0,
			"tanggal" => $tanggal,
			"trash"   => 0,
		);

		$this->db->insert("pesan", $data);
		echo "OK";
	}
}