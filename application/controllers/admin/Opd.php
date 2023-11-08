<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opd extends CI_Controller
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
        $data['pages']       = 'opd';
        $data['subtitles']   = 'Profile';
        $data['pagesTitle']  = 'OPD';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->get('link')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/opd', $data);
        $this->load->view('temp/footer', $data);
    }

    public function update()
    {
        $sejarah   = $this->input->post('keterangan');

        $data   = array(
            'sejarah'   => $sejarah,
        );

        $this->db->update('profile', $data);
        $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..Data Berhasil DiSimpan');
        redirect('admin/sejarah');
    }
}
