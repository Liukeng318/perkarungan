<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Struktur extends CI_Controller
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
        $data['pages']       = 'struktur';
        $data['subtitles']   = 'Profile';
        $data['pagesTitle']  = 'Struktur Organisasi';
        $data['profiles']    = $this->db->get('profile')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/struktur', $data);
        $this->load->view('temp/footer', $data);
    }

    public function update()
    {
        $logolama     = $this->input->post('logolama');
        $namalogo     = $_FILES['logo']['name'];

        if ($namalogo == TRUE) {
            $config = [
                'upload_path'   => './assets/images/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name'        => $namalogo,
            ];
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo')) {
                if (file_exists('./assets/images/' . $logolama)) {
                    unlink('./assets/images/' . $logolama);
                }

                $foto = $this->upload->data('file_name');

                $data = array(
                    'struktur'      => $this->upload->data('file_name'),
                );

                $this->db->update('profile', $data);
                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..Gambar berhasil diupload');
                redirect('admin/struktur', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/struktur', 'refresh');
            }
        } else {
            $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..File Gambar belum dipilih');
            redirect('admin/struktur', 'refresh');
        }
    }
}
