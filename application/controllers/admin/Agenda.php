<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
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
        $data['pages']       = 'agenda';
        $data['subtitles']   = 'Publikasi';
        $data['pagesTitle']  = 'Agenda';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->query('select * from agenda order by tanggal desc')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/agenda', $data);
        $this->load->view('temp/footer', $data);
    }

    public function save()
    {
        $judul         = $this->input->post('judul');
        $keterangan    = $this->input->post('keterangan');
        $namalogo      = $_FILES['lampiran']['name'];

        if ($namalogo == TRUE) {
            $config = [
                'upload_path'   => './assets/images/agenda/',
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

                $this->db->insert('agenda', $data);
                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..agenda berhasil disimpan');
                redirect('admin/agenda', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/agenda', 'refresh');
            }
        } else {
            date_default_timezone_set("Asia/Jayapura");
            $data = array(
                'judul'      => $judul,
                'keterangan' => $keterangan,
                'tanggal'    => date('Y-m-d H:i:s a'),
            );

            $this->db->insert('agenda', $data);
            $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..agenda berhasil disimpan tanpa lampiran');
            redirect('admin/agenda', 'refresh');
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
        $slide = $this->db->get_where("agenda", array("id" => base64_decode($param)))->row()->image;
        $where = array(
            'id'    => base64_decode($param),
        );

        if (file_exists('./assets/images/agenda/' . $slide)) {
            unlink('./assets/images/agenda/' . $slide);
        }

        $this->db->delete('agenda', $where);
        $this->myModel->set_notifikasi_swal('warning', 'Yuhuu...', 'Yuhuu..agenda berhasil dihapus');
        redirect('admin/agenda', 'refresh');
    }
}
