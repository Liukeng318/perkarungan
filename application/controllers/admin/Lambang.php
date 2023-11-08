<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lambang extends CI_Controller
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
        $data['pages']       = 'lambang';
        $data['subtitles']   = 'Profile';
        $data['pagesTitle']  = 'Lambang Daerah';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->get('link')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/lambang', $data);
        $this->load->view('temp/footer', $data);
    }

    public function update()
    {
        $lambang   = $this->input->post('keterangan');

        $data   = array(
            'lambang'   => $lambang,
        );

        $this->db->update('profile', $data);
        $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..Data Berhasil DiSimpan');
        redirect('admin/lambang');
    }
}
