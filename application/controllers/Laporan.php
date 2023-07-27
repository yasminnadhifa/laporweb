<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('Konsumen_model', 'userrole');
        $this->load->model('Laporan_model','laporan');
        $this->load->model('Category_model');
    }

    function index()
    {
        $data['user'] = $this->userrole->getBy();
        $data['category']= $this->Category_model->get();
        $data = [

                'id_user' =>  $this->session->userdata('id'),
                'no_laporan' => $this->input->post('no_laporan'),
                'judul' => $this->input->post('judul'),
                'tanggal' => $this->input->post('tanggal'),
                'kategori' => $this->input->post('kategori'),
                'isi' => $this->input->post('isi'),
                'created_at'=> date('Y-m-d H:i:s'),

            ];
            $upload_image = $_FILES['dokumen']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5000';
                $config['upload_path'] = './assets/images/laporan/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('dokumen')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('dokumen', $new_image);
                    $upload_image = $_FILES['dokumen']['name'];
                    if ($upload_image) {
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = '5000';
                        $config['upload_path'] = './assets/images/laporan/';
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

            $this->laporan->insert($data);
            $this->session->set_flashdata('message', '<script type="text/javascript">Swal.fire({
                position: `top-center`,
                icon: `success`,
                title: `Laporan diterima!`,
                showConfirmButton: false,
                timer: 1500
              })</script>');
            redirect('Konsumen/pengaduan');
        }

        function detail($id)
        {
            $data = $this->laporan->get_user_data($id);
            echo json_encode($data);
        }
    }