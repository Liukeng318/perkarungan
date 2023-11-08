<?php
class Pesan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('user') == FALSE) {
            $this->myModel->set_notifikasi_swal('error', 'Oops', 'Anda Belum Login Bosku!!!');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['pages']       = 'pesan';
        $data['subtitles']   = 'Publikasi';
        $data['pagesTitle']  = 'Pesan';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->query('select * from pesan where trash != 1 order by tanggal desc')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/pesan', $data);
        $this->load->view('temp/footer', $data);
    }

    public function baca($param = '')
    {
        $data['pages']       = 'pesan';
        $data['subtitles']   = 'Publikasi';
        $data['pagesTitle']  = 'Pesan';
        $data['id']          = base64_decode($param);
        $data['links']       = $this->db->query("select * from pesan where id='" . base64_decode($param) . "'")->result_array();
        $this->db->update('pesan', array('status' => 1), array('id' => base64_decode($param)));

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/pesan_baca', $data);
        $this->load->view('temp/footer', $data);
    }

    public function trash($param)
    {
        $this->db->update('pesan', array('trash' => 1, 'status' => 1), array('id' => base64_decode($param)));
        redirect("admin/pesan");
    }

    public function delete($param)
    {
        $this->db->delete('pesan', array('id' => base64_decode($param)));
        redirect("admin/pesan/viewtrash");
    }

    public function recovery($param)
    {
        $this->db->update('pesan', array('trash' => 0,), array('id' => base64_decode($param)));
        redirect("admin/pesan");
    }

    public function viewtrash()
    {
        $data['pages']       = 'pesan';
        $data['subtitles']   = 'Publikasi';
        $data['pagesTitle']  = 'Pesan';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->query('select * from pesan where trash = 1 order by tanggal desc')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/trash', $data);
        $this->load->view('temp/footer', $data);
    }

    public function kirim()
    {
        $data['pages']       = 'pesan';
        $data['subtitles']   = 'Publikasi';
        $data['pagesTitle']  = 'Pesan';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->query('select * from pesan where trash != 1 order by tanggal desc')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/pesan_kirim', $data);
        $this->load->view('temp/footer', $data);
    }

    public function reply($param = "")
    {
        $data['pages']       = 'pesan';
        $data['subtitles']   = 'Publikasi';
        $data['pagesTitle']  = 'Pesan';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->query("select * from pesan where id='" . base64_decode($param) . "'")->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/pesan_balas', $data);
        $this->load->view('temp/footer', $data);
    }
}
