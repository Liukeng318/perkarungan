<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['pages']       = 'user';
        $data['subtitles']   = 'Setting';
        $data['pagesTitle']  = 'User';
        $data['profiles']    = $this->db->get('profile')->result_array();
        $data['links']       = $this->db->query('select * from auth')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/contentHeader', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('temp/footer', $data);
    }

    public function save()
    {
        $nama     = $this->input->post('nama');
        $user     = $this->input->post('user');
        $password = base64_encode($this->input->post('password'));
        $foto     = $_FILES['logo']['name'];

        $query = $this->db->get_where('auth', array('user' => $user));
        $count = $query->num_rows();

        if ($count) {
            $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Simpan Data Gagal, User Pernah Digunakan!!!');
            redirect(base_url('admin/user'), 'refresh');
        } else {
            if ($foto == TRUE) {
                $config = [
                    'upload_path'   => './assets/images/users/',
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'file_name'     => $foto,
                ];

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('logo')) {
                    $foto = $this->upload->data('file_name');

                    $data = array(
                        'nama'     => $nama,
                        'user'     => $user,
                        'password' => $password,
                        'foto'     => $this->upload->data('file_name'),
                    );

                    $this->db->insert('auth', $data);
                    $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..user berhasil disimpan');
                    redirect('admin/user', 'refresh');
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                    redirect('admin/user', 'refresh');
                }
            } else {
                $data = array(
                    'nama'     => $nama,
                    'user'     => $user,
                    'password' => $password,
                    'foto'     => 'default.jpg',
                );
                $this->db->insert('auth', $data);
                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..user berhasil disimpan');
                redirect('admin/user', 'refresh');
            }
        }
    }

    public function update()
    {
        $userlama = $this->input->post('id');
        $fotolama = $this->input->post('logolama');
        $nama     = $this->input->post('nama');
        $user     = $this->input->post('user');
        $password = base64_encode($this->input->post('password'));
        $foto     = $_FILES['foto']['name'];

        if ($foto == TRUE) {
            $config = [
                'upload_path'   => './assets/images/users/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name'     => $foto,
            ];

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                if ($fotolama != 'default.jpg') {
                    if (file_exists('./assets/images/users/' . $fotolama)) {
                        unlink('./assets/images/users/' . $fotolama);
                    }
                }
                $foto = $this->upload->data('file_name');

                $data = array(
                    'nama'     => $nama,
                    'user'     => $user,
                    'password' => $password,
                    'foto'     => $this->upload->data('file_name'),
                );

                $where = array(
                    "user" => $userlama,
                );

                $this->db->update('auth', $data, $where);
                $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..user berhasil disimpan');
                redirect('admin/user', 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Oops..Gagal Simpan Karena ' . $error['error']);
                redirect('admin/user', 'refresh');
            }
        } else {
            $data = array(
                'nama'     => $nama,
                'user'     => $user,
                'password' => $password,
            );

            $where = array(
                "user" => $userlama,
            );

            $this->db->update('auth', $data, $where);
            $this->myModel->set_notifikasi_swal('success', 'Yuhuu...', 'Yuhuu..user berhasil disimpan');
            redirect('admin/user', 'refresh');
        }
    }

    public function delete($param = "")
    {
        $slide = $this->db->get_where("auth", array("user" => base64_decode($param)))->row()->foto;
        $where = array(
            'user'    => base64_decode($param),
        );

        if ($slide != 'default.jpg') {
            if (file_exists('./assets/images/users/' . $slide)) {
                unlink('./assets/images/users/' . $slide);
            }
        }

        $this->db->where('user', base64_decode($param));
        $this->db->delete('auth');
        $this->myModel->set_notifikasi_swal('warning', 'Yuhuu...', 'Data Berhasil Dihapus');
        redirect(base_url('admin/user'), 'refresh');
    }
}
