<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $data["title"] = $this->db->get("profile")->row()->nama;
            $data["logo"]  = $this->db->get("profile")->row()->logo;
            $this->load->view('auth', $data);
        } else {
            $user     = $this->input->post('user');
            $pass     = base64_encode($this->input->post('password'));
            $check    = $this->myModel->cekLogin($user, $pass);

            if ($check == FALSE) {
                /* $this->myModel->set_notifikasi_swal('error', 'Oops...', 'Kombinasi Username dan Password tidak Sesuai bosku!!!'); */
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><small>Kombinasi Username dan Password tidak Sesuai bosku!!!</small></div>');
                redirect('auth');
            } else {
                $this->session->set_userdata('nama', $check->nama);
                $this->session->set_userdata('user', $check->user);
                redirect('admin/dashboard');
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('user', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
