<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
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
        $data['pages']       = 'galeri';
        $data['subtitles']   = 'Publikasi';
        $data['pagesTitle']  = 'Gallery';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->query('select * from gallery')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/galeri', $data);
        $this->load->view('temp/footer', $data);
    }

    public function save()
    {
        $namalogo      = $_FILES['lampiran']['name'];
        $judul         = $this->input->post('judul');
        $jenis         = $this->input->post('kategori');

        if ($namalogo == TRUE) {
            $config = [
                'upload_path'   => './assets/images/gallery/',
                'allowed_types' => 'gif|jpg|png|jpeg|webp',
                'file_name'     => $namalogo,
            ];

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('lampiran')) {
                $foto = $this->upload->data('file_name');

                date_default_timezone_set("Asia/Jayapura");

                $data = array(
                    'judul'      => $judul,
                    'jenis'      => $jenis,
                    'desc'       => $this->upload->data('file_name'),
                    /* 'tanggal'    => date('Y-m-d H:i:s a'), */
                );

                $this->db->insert('gallery', $data);
                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..agenda berhasil disimpan');
                redirect('admin/galeri', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/galeri', 'refresh');
            }
        } else {
            $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena Anda Tidak Memilih Foto');
            redirect('admin/galeri', 'refresh');
        }
    }

    public function update()
    {
        $id            = $this->input->post('id');
        $logolama      = $this->input->post('logo');
        $keterangan    = $this->input->post('keterangan');
        $judul         = $this->input->post('judul');
        $namalogo      = $_FILES['lampiran']['name'];

        if ($namalogo == TRUE) {
            $config = [
                'upload_path'   => './assets/images/agenda/',
                'allowed_types' => 'gif|jpg|png|pdf',
                'file_name'     => $namalogo,
            ];

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('lampiran')) {
                if (file_exists('./assets/images/agenda/' . $logolama)) {
                    unlink('./assets/images/agenda/' . $logolama);
                }
                $foto = $this->upload->data('file_name');
                date_default_timezone_set("Asia/Jayapura");

                $data = array(
                    'keterangan' => $keterangan,
                    'judul'      => $judul,
                    'image'      => $this->upload->data('file_name'),
                    'tanggal'    => date('Y-m-d H:i:s a'),
                );

                $where = array(
                    'id'         => $id,
                );
                $this->db->update('agenda', $data, $where);

                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..agenda berhasil diupdate');
                redirect('admin/agenda', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/agenda', 'refresh');
            }
        } else {
            date_default_timezone_set("Asia/Jayapura");

            $data = array(
                'keterangan'    => $keterangan,
                'judul'         => $judul,
                'tanggal'       => date('Y-m-d H:i:s a'),
            );

            $where = array(
                'id'         => $id,
            );
            $this->db->update('agenda', $data, $where);
            $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..agenda berhasil diupload');
            redirect('admin/agenda', 'refresh');
        }
    }

    public function delete($param = "")
    {
        $slide = $this->db->get_where("gallery", array("no" => base64_decode($param)))->row()->desc;
        $where = array(
            'no'    => base64_decode($param),
        );

        if (file_exists('./assets/images/gallery/' . $slide)) {
            unlink('./assets/images/gallery/' . $slide);
        }

        $this->db->delete('gallery', $where);
        $this->myModel->set_notifikasi_swal('warning', 'Yuhuu...', 'Yuhuu..gallery berhasil dihapus');
        redirect('admin/galeri', 'refresh');
    }
}
