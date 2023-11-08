<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
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
        $data['pages']       = 'berita';
        $data['subtitles']   = 'Publikasi';
        $data['pagesTitle']  = 'Berita';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->query('select * from berita order by tanggal desc')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/berita', $data);
        $this->load->view('temp/footer', $data);
    }

    public function add()
    {
        $data['pages']       = 'berita';
        $data['subtitles']   = 'Publikasi';
        $data['pagesTitle']  = 'Berita';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->query('select * from berita order by tanggal desc')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/beritaAdd', $data);
        $this->load->view('temp/footer', $data);
    }

    public function save()
    {
        $judul         = $this->input->post('judul');
        $kategori      = $this->input->post('kategori');
        $keterangan    = $this->input->post('keterangan');
        $namalogo      = $_FILES['logo']['name'];

        if ($namalogo == TRUE) {
            $config = [
                'upload_path'   => './assets/images/berita/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name'     => $namalogo,
            ];

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo')) {
                $foto = $this->upload->data('file_name');

                date_default_timezone_set("Asia/Jayapura");

                $data = array(
                    'judul'      => $judul,
                    'kategori'   => $kategori,
                    'keterangan' => $keterangan,
                    'image'      => $this->upload->data('file_name'),
                    'tanggal'    => date('Y-m-d H:i:s a'),
                );

                $this->db->insert('berita', $data);
                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..berita berhasil disimpan');
                redirect('admin/berita', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/berita', 'refresh');
            }
        } else {
            date_default_timezone_set("Asia/Jayapura");
            $data = array(
                'judul'      => $judul,
                'kategori'   => $kategori,
                'keterangan' => $keterangan,
                'image'      => 'default_news.webp',
                'tanggal'    => date('Y-m-d H:i:s a'),
            );

            $this->db->insert('berita', $data);
            $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..berita berhasil disimpan tanpa Gambar');
            redirect('admin/berita', 'refresh');
        }
    }

    public function edit($param = "")
    {
        $data['pages']       = 'berita';
        $data['subtitles']   = 'Publikasi';
        $data['pagesTitle']  = 'Berita';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->query("select * from berita where id='" . base64_decode($param) . "'order by tanggal desc")->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/beritaEdit', $data);
        $this->load->view('temp/footer', $data);
    }

    public function update()
    {
        $id            = $this->input->post('id');
        $logolama      = $this->input->post('logolama');
        $judul         = $this->input->post('judul');
        $kategori      = $this->input->post('kategori');
        $keterangan    = $this->input->post('keterangan');
        $namalogo      = $_FILES['logo']['name'];

        if ($namalogo == TRUE) {
            $config = [
                'upload_path'   => './assets/images/berita/',
                'allowed_types' => 'gif|jpg|png|pdf',
                'file_name'     => $namalogo,
            ];

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo')) {

                if ($logolama != 'default_news.webp') {
                    if (file_exists('./assets/images/berita/' . $logolama)) {
                        unlink('./assets/images/berita/' . $logolama);
                    }
                }

                $foto = $this->upload->data('file_name');
                date_default_timezone_set("Asia/Jayapura");

                $data = array(
                    'judul'      => $judul,
                    'kategori'   => $kategori,
                    'keterangan' => $keterangan,
                    'image'      => $this->upload->data('file_name'),
                    'tanggal'    => date('Y-m-d H:i:s a'),
                );

                $where = array(
                    'id'         => $id,
                );

                $this->db->update('berita', $data, $where);
                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..berita berhasil diupdate');
                redirect('admin/berita', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/berita', 'refresh');
            }
        } else {
            date_default_timezone_set("Asia/Jayapura");

            $data = array(
                'judul'      => $judul,
                'kategori'   => $kategori,
                'keterangan' => $keterangan,
                'tanggal'    => date('Y-m-d H:i:s a'),
            );

            $where = array(
                'id'         => $id,
            );
            $this->db->update('berita', $data, $where);
            $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..berita berhasil diupload');
            redirect('admin/berita', 'refresh');
        }
    }

    public function delete($param = "")
    {
        $slide = $this->db->get_where("berita", array("id" => base64_decode($param)))->row()->image;
        $where = array(
            'id'    => base64_decode($param),
        );

        if ($slide != 'default_news.webp') {
            if (file_exists('./assets/images/berita/' . $slide)) {
                unlink('./assets/images/berita/' . $slide);
            }
        }

        $this->db->delete('berita', $where);
        $this->myModel->set_notifikasi_swal('warning', 'Yuhuu...', 'Yuhuu..berita berhasil dihapus');
        redirect('admin/berita', 'refresh');
    }
}
