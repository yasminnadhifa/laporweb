<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testi extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('Konsumen_model', 'userrole');
        $this->load->model('Testi_model','testimonial');
    }

    function index()
    {
        $data['user'] = $this->userrole->getBy();

            $data = [

                'id_user' =>  $this->session->userdata('id'),
                'pesan' => $this->input->post('pesan'),
                'star' => $this->input->post('star'),
                'created_at'=> date('Y-m-d H:i:s'),

            ];

            $this->testimonial->insert($data);
            $this->session->set_flashdata('message', '<script type="text/javascript">Swal.fire({
                position: `top-center`,
                icon: `success`,
                title: `Terima kasih telah mengirimkan penilaian, kami akan terus berkembang.`,
                showConfirmButton: false,
                timer: 1500
              })</script>');
            redirect('Konsumen/indexUser');
        }
    }
    


