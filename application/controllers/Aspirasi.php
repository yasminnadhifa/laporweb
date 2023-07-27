<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aspirasi extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('Konsumen_model', 'userrole');
        $this->load->model('Laporan_model','laporan');
        $this->load->model('Aspirasi_model');
    }

    function index()
    {
        $data['user'] = $this->userrole->getBy();
        
        $data = [

                'id_user' =>  $this->session->userdata('id'),
                'no_aspirasi' => $this->input->post('no_aspirasi'),
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'created_at'=> date('Y-m-d H:i:s'),

            ];
            $upload_image = $_FILES['dokumen']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5000';
                $config['upload_path'] = './assets/images/aspirasi/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('dokumen')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('dokumen', $new_image);
                    $upload_image = $_FILES['dokumen']['name'];
                    if ($upload_image) {
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = '5000';
                        $config['upload_path'] = './assets/images/aspirasi/';
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('dokumen')) {
                            $new_image = $this->upload->data('file_name');
                            $this->db->set('dokumen', $new_image);

                        } else {
                            echo $this->upload->display_errors();
                        }
                    }
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->Aspirasi_model->insert($data);
            $this->session->set_flashdata('message', '<script type="text/javascript">Swal.fire({
                position: `top-center`,
                icon: `success`,
                title: `Terima kasih telah mengirimkan aspirasi, kami akan terus berkembang.`,
                showConfirmButton: false,
                timer: 1500
              })</script>');
            redirect('Konsumen/indexUser');
        }
    }