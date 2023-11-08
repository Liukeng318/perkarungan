<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Link extends CI_Controller
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
        $data['pages']       = 'link';
        $data['subtitles']   = 'Setting';
        $data['pagesTitle']  = 'Link Terkait';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->get('link')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/link', $data);
        $this->load->view('temp/footer', $data);
    }

    public function save()
    {
        $keterangan    = $this->input->post('keterangan');
        $link          = $this->input->post('alamat');
        $namalogo     = $_FILES['logo']['name'];

        if ($namalogo == TRUE) {
            $config = [
                'upload_path'   => './assets/images/link/',
                'allowed_types' => 'gif|jpg|png',
                'file_name'     => $namalogo,
            ];

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo')) {
                $foto = $this->upload->data('file_name');

                $data = array(
                    'keterangan' => $keterangan,
                    'link'       => $link,
                    'image'      => $this->upload->data('file_name'),
                );

                $this->db->insert('link', $data);
                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..link berhasil disimpan');
                redirect('admin/link', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/link', 'refresh');
            }
        } else {
            $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena tidak menyertakan gambar');
            redirect('admin/link', 'refresh');
        }
    }

    public function update()
    {
        $id            = $this->input->post('id');
        $logolama      = $this->input->post('logo');
        $keterangan    = $this->input->post('keterangan');
        $link          = $this->input->post('alamat');
        $namalogo      = $_FILES['logo']['name'];

        if ($namalogo == TRUE) {
            $config = [
                'upload_path'   => './assets/images/link/',
                'allowed_types' => 'gif|jpg|png',
                'file_name'     => $namalogo,
            ];

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo')) {
                if (file_exists('./assets/images/link/' . $logolama)) {
                    unlink('./assets/images/link/' . $logolama);
                }
                $foto = $this->upload->data('file_name');

                $data = array(
                    'keterangan' => $keterangan,
                    'link'       => $link,
                    'image'      => $this->upload->data('file_name'),
                );

                $where = array(
                    'id'         => $id,
                );
                $this->db->update('link', $data, $where);

                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..link berhasil disimpan');
                redirect('admin/link', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/link', 'refresh');
            }
        } else {
            $data = array(
                'keterangan'    => $keterangan,
                'link'          => $link,
            );

            $where = array(
                'id'         => $id,
            );
            $this->db->update('link', $data, $where);
            $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..Link berhasil diupload');
            redirect('admin/link', 'refresh');
        }
    }

    public function delete($param = "")
    {
        $slide = $this->db->get_where("link", array("id" => base64_decode($param)))->row()->image;
        $where = array(
            'id'    => base64_decode($param),
        );

        if (file_exists('./assets/images/link/' . $slide)) {
            unlink('./assets/images/link/' . $slide);
        }

        $this->db->delete('link', $where);
        $this->myModel->set_notifikasi_swal('warning', 'Yuhuu...', 'Yuhuu..Slide berhasil dihapus');
        redirect('admin/link', 'refresh');
    }
}
