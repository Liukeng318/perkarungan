<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin/tes');
    }

    public function getCountry()
    {
        $page = $_GET['page'];
        /* $this->load->model('welcome_model'); */
        $countries = $this->myModel->getCountry($page);
        foreach ($countries as $country) {
            echo "<tr><td>" . $country->id . "</td>
                  <td>" . $country->judul . "</td>
                  <td>" . $country->keterangan . "</td></tr>
                 ";
        }
        exit;
    }
}
