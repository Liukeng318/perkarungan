<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apps extends CI_Controller
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
        $data['pages']       = 'settingapps';
        $data['subtitles']   = 'Setting';
        $data['pagesTitle']  = 'Apps';
        $data['profiles']    = $this->db->get('profile')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/apps', $data);
        $this->load->view('temp/footer', $data);
    }

    public function update()
    {
        $nama   = $this->input->post('nama');
        $kota   = $this->input->post('kota');
        $email  = $this->input->post('email');
        $telp   = $this->input->post('telp');
        $twiter = $this->input->post('twitter');
        $fb     = $this->input->post('facebook');
        $ig     = $this->input->post('instagram');
        $peta   = $this->input->post('peta');

        $data   = array(
            'nama'      => $nama,
            'kota'      => $kota,
            'email'     => $email,
            'telp'      => $telp,
            'twitter'   => $twiter,
            'facebook'  => $fb,
            'instagram' => $ig,
            'peta'      => $peta,
        );

        $this->db->update('profile', $data);
        $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..Data Berhasil DiSimpan');
        redirect('admin/apps');
    }

    public function updateLogo()
    {
        $logolama     = $this->input->post('logolama');
        $namalogo     = $_FILES['logo']['name'];

        if ($namalogo == TRUE) {
            $config = [
                'upload_path'   => './assets/images/',
                'allowed_types' => 'gif|jpg|png',
                'file_name'        => $namalogo,
            ];
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo')) {
                if (file_exists('./assets/images/' . $logolama)) {
                    unlink('./assets/images/' . $logolama);
                }

                $foto = $this->upload->data('file_name');

                $data = array(
                    'logo'      => $this->upload->data('file_name'),
                );

                $this->db->update('profile', $data);
                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..Logo berhasil diupload');
                redirect('admin/apps', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/apps', 'refresh');
            }
        } else {
            $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..File logo belum dipilih');
            redirect('admin/apps', 'refresh');
        }
    }
}
