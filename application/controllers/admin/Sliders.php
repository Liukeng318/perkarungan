<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sliders extends CI_Controller
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
        $data['pages']       = 'slider';
        $data['subtitles']   = 'Setting';
        $data['pagesTitle']  = 'Sliders';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['slider']      = $this->db->query('select * from slider order by id desc')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/slider', $data);
        $this->load->view('temp/footer', $data);
    }

    public function save()
    {
        $nama         = $this->input->post('nama');
        $ket          = $this->input->post('keterangan');
        $namalogo     = $_FILES['logo']['name'];

        if ($namalogo == TRUE) {
            $config = [
                'upload_path'   => './assets/images/sliders/',
                'allowed_types' => 'gif|jpg|png',
                'file_name'        => $namalogo,
            ];
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo')) {
                $foto = $this->upload->data('file_name');

                $data = array(
                    'nama'       => $nama,
                    'keterangan' => $ket,
                    'image'      => $this->upload->data('file_name'),
                );

                $this->db->insert('slider', $data);
                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..Slide berhasil diupload');
                redirect('admin/sliders', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/sliders', 'refresh');
            }
        } else {
            /* $error = array('error' => $this->upload->display_errors()); */
            $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena tidak menyertakan gambar');
            redirect('admin/sliders', 'refresh');
        }
    }

    public function updateslide()
    {
        $id           = $this->input->post('id');
        $logolama     = $this->input->post('slidelama');
        $nama         = $this->input->post('nama');
        $ket          = $this->input->post('keterangan');
        $namalogo     = $_FILES['logo']['name'];

        if ($namalogo == TRUE) {
            $config = [
                'upload_path'   => './assets/images/sliders/',
                'allowed_types' => 'gif|jpg|png',
                'file_name'        => $namalogo,
            ];
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo')) {
                if (file_exists('./assets/images/sliders/' . $logolama)) {
                    unlink('./assets/images/sliders/' . $logolama);
                }

                $foto = $this->upload->data('file_name');

                $data = array(
                    'nama'       => $nama,
                    'keterangan' => $ket,
                    'image'      => $this->upload->data('file_name'),
                );

                $where = array(
                    'id'         => $id,
                );

                $this->db->update('slider', $data, $where);
                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..Slide berhasil diupload');
                redirect('admin/sliders', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/sliders', 'refresh');
            }
        } else {
            $data = array(
                'nama'       => $nama,
                'keterangan' => $ket,
            );

            $where = array(
                'id'         => $id,
            );
            $this->db->update('slider', $data, $where);
            $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..Slide berhasil diupload');
            redirect('admin/sliders', 'refresh');
        }
    }

    public function delete($param = "")
    {
        $slide = $this->db->get_where("slider", array("id" => base64_decode($param)))->row()->image;
        $where = array(
            'id'    => base64_decode($param),
        );

        if (file_exists('./assets/images/sliders/' . $slide)) {
            unlink('./assets/images/sliders/' . $slide);
        }

        $this->db->delete('slider', $where);
        $this->myModel->set_notifikasi_swal('warning', 'Yuhuu...', 'Yuhuu..Slide berhasil dihapus');
        redirect('admin/sliders', 'refresh');
    }
}
