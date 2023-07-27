<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends CI_Controller{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('konsumen_model', 'userrole');
        $this->load->model('Lembaga_model');
        $this->load->model('Laporan_model');
        $this->load->model('Category_model');
               
    }

    public function index()
    {
        
        $this->load->view('layout/home_header');
        $this->load->view('konsumen/vw_home.php');
        $this->load->view('layout/konsumen_footer');
    }
    public function indexUser()
    {
        $data['category']= $this->Category_model->get();
        $data['user'] = $this->userrole->getBy();
        $this->load->view('layout/home_session_header',$data);
        $this->load->view('konsumen/vw_home_session.php',$data);
        $this->load->view('layout/konsumen_footer',$data);
    }
    public function tentang()
    {
        $data['user'] = $this->userrole->getBy();
        $this->load->view('layout/home_session_header',$data);
        $this->load->view('konsumen/vw_tentang.php',$data);
        $this->load->view('layout/konsumen_footer',$data);
    }
    public function tentanglx()
    {
        $this->load->view('layout/home_header');
        $this->load->view('konsumen/vw_tentang.php');
        $this->load->view('layout/konsumen_footer');
    }

    public function pengaduan()
    {
        $data['laporan'] = $this->Laporan_model->getByUser();
        $data['user'] = $this->userrole->getBy();
        $this->load->view('layout/home_session_header',$data);
        $this->load->view('konsumen/vw_pengaduan_card.php',$data);
        $this->load->view('layout/konsumen_footer',$data);
    }

    public function pengaduannew()
    {
        $data['laporan'] = $this->Laporan_model->getByUser();
        $data['user'] = $this->userrole->getBy();
        $this->load->view('layout/home_session_header',$data);
        $this->load->view('konsumen/vw_pengaduan_card.php',$data);
        $this->load->view('layout/konsumen_footer',$data);
    }
    public function profile($id)
    {
        $data['user'] = $this->userrole->getBy();
        $data['konsumen'] = $this->userrole->getById($id);
        $data['lembaga']= $this->Lembaga_model->get();
        $this->load->view('layout/home_session_header',$data);
        $this->load->view('konsumen/vw_edit_profile.php',$data);
        $this->load->view('layout/konsumen_footer',$data);
    }

    public function edit()
    {
        $data['user'] = $this->userrole->getBy();
        $data['lembaga']= $this->Lembaga_model->get();
        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'nama wajib diisi'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required', [
            'required' => 'email wajib diisi'
        ]);

        $this->form_validation->set_rules('nohp', 'lembaga', 'required', [
            'required' => 'nohp wajib diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/home_session_header',$data);
            $this->load->view('konsumen/vw_edit_profile.php',$data);
            $this->load->view('layout/konsumen_footer',$data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'nohp' => $this->input->post('nohp'),
            ];
            
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5000';
                $config['upload_path'] = './assets/images/profil/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata['email']])->row_array();
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/profil/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'email' => $this->input->post('email'),
                        'nohp' => $this->input->post('nohp'),
                        'image' => $new_image,
                    ];
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->userrole->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<script type="text/javascript">Swal.fire("Profil berhasil diubah");</script>');
            
            redirect('Konsumen/indexUser');
        }
    }
    public function edit_password()
{
    $data['user'] = $this->userrole->getBy();
    $this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required');
    $this->form_validation->set_rules('new_password', 'Password Baru', 'required');
    $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password Baru', 'required|matches[new_password]');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('layout/home_session_header',$data);
        $this->load->view('konsumen/vw_edit_profile.php',$data);
        $this->load->view('layout/konsumen_footer',$data);
    } else {
        $current_password = $this->input->post('current_password');
        $user_id = $this->input->post('id'); 
        $user = $this->db->get_where('konsumen', ['id' => $user_id])->row_array();
       

        if (password_verify($current_password, $user['password'])) {

            $data = [
                'password' => password_hash($this->input->post('new_password'), PASSWORD_DEFAULT),
            ];

            $id = $this->input->post('id');
            $this->userrole->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<script type="text/javascript">Swal.fire("Password berhasil diubah");</script>');
            redirect('Konsumen/indexUser');
        } else {

            $this->session->set_flashdata('message', '<script type="text/javascript">Swal.fire("Password salah");</script>');
            redirect('Konsumen/indexUser');
        }
    }
}
public function delete_data() {
    $id = $this->input->post('id');


    // Hapus data berdasarkan ID menggunakan model
    if ($this->Laporan_model->deleteData($id)) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
    }

    echo json_encode($response);
}


}