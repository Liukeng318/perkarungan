<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
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
        $data['pages']       = 'pengumuman';
        $data['subtitles']   = 'Publikasi';
        $data['pagesTitle']  = 'Pengumuman';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->query('select * from pengumuman order by tanggal desc')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/pengumuman', $data);
        $this->load->view('temp/footer', $data);
    }

    public function save()
    {
        $judul         = $this->input->post('judul');
        $keterangan    = $this->input->post('keterangan');
        $namalogo      = $_FILES['lampiran']['name'];

        if ($namalogo == TRUE) {
            $config = [
                'upload_path'   => './assets/images/pengumuman/',
                'allowed_types' => 'gif|jpg|png|pdf',
                'file_name'     => $namalogo,
            ];

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('lampiran')) {
                $foto = $this->upload->data('file_name');

                date_default_timezone_set("Asia/Jayapura");

                $data = array(
                    'judul'      => $judul,
                    'keterangan' => $keterangan,
                    'image'      => $this->upload->data('file_name'),
                    'tanggal'    => date('Y-m-d H:i:s a'),
                );

                $this->db->insert('pengumuman', $data);
                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..pengumuman berhasil disimpan');
                redirect('admin/pengumuman', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/pengumuman', 'refresh');
            }
        } else {
            date_default_timezone_set("Asia/Jayapura");
            $data = array(
                'judul'      => $judul,
                'keterangan' => $keterangan,
                'tanggal'    => date('Y-m-d H:i:s a'),
            );

            $this->db->insert('pengumuman', $data);
            $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..pengumuman berhasil disimpan tanpa lampiran');
            redirect('admin/pengumuman', 'refresh');
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
                'upload_path'   => './assets/images/pengumuman/',
                'allowed_types' => 'gif|jpg|png|pdf',
                'file_name'     => $namalogo,
            ];

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('lampiran')) {
                if (file_exists('./assets/images/pengumuman/' . $logolama)) {
                    unlink('./assets/images/pengumuman/' . $logolama);
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
                $this->db->update('pengumuman', $data, $where);

                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..pengumuman berhasil diupdate');
                redirect('admin/pengumuman', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/pengumuman', 'refresh');
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
            $this->db->update('pengumuman', $data, $where);
            $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..Link berhasil diupload');
            redirect('admin/pengumuman', 'refresh');
        }
    }

    public function delete($param = "")
    {
        $slide = $this->db->get_where("pengumuman", array("id" => base64_decode($param)))->row()->image;
        $where = array(
            'id'    => base64_decode($param),
        );

        if (file_exists('./assets/images/pengumuman/' . $slide)) {
            unlink('./assets/images/pengumuman/' . $slide);
        }

        $this->db->delete('pengumuman', $where);
        $this->myModel->set_notifikasi_swal('warning', 'Yuhuu...', 'Yuhuu..pengumuman berhasil dihapus');
        redirect('admin/pengumuman', 'refresh');
    }
}
