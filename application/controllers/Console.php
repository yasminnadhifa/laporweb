<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Console extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper('lapor');
        $this->load->model('User_model', 'userrole');
        $this->load->model('Laporan_model');
        $this->load->model('Konsumen_model');
        $this->load->model('Lembaga_model');
        $this->load->model('Testi_model');
        $this->load->model('Category_model');
        $this->load->model('Aspirasi_model');
    }

    function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/auth_header.php');
            $this->load->view('auth/vw_login_admin.php');
            $this->load->view('layout/auth_footer.php');
        } else {
            $this->cek_login();
        }
    }
    private function cek_login()
    {
        $email = $this->input->post('email');
        $password = SHA1($this->input->post('password'));

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'email' => $user['email'],
                    'id' => $user['id'],
                ];
                $this->session->set_userdata($data);
                redirect('Console/dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('Console');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Tedaftar! </div>');
            redirect('Console');
        }
    }
    public function dashboard()
    {
        $data['user'] = $this->userrole->getBy();
        $data['laporan'] = $this->Laporan_model->get_top_4();
        $data['testi'] = $this->Testi_model->ttesti();
        $data['report'] = $this->Laporan_model->tlaporan();
        $data['reports'] = $this->Laporan_model->tlaporans();
        $data['konsumen'] = $this->Konsumen_model->tkonsumen();
        $data['lembaga'] = $this->Lembaga_model->tlembaga();
        $data['aspirasi'] = $this->Aspirasi_model->taspirasi();
        $data['rating_count'] = $this->Testi_model->get_rating_count();
        $data['rating'] = $this->Testi_model->avg_rate();
        $this->load->view('layout/admin_header.php', $data);
        $this->load->view('console/dashboard.php', $data);
        $this->load->view('layout/admin_footer.php', $data);
    }
    public function school()
    {
        $data['user'] = $this->userrole->getBy();
        $data['lembaga'] = $this->Lembaga_model->get();
        $this->load->view('layout/admin_header.php', $data);
        $this->load->view('console/lembaga.php', $data);
        $this->load->view('layout/admin_footer.php', $data);
    }

    public function add()
    {
        $data['user'] = $this->userrole->getBy();
        $data['lembaga'] = $this->Lembaga_model->get();
        $this->form_validation->set_rules(
            'nama',
            'School name',
            'required',
        );
        $this->form_validation->set_rules(
            'alamat',
            'School address',
            'required',
        );
        $this->form_validation->set_rules(
            'provinsi',
            'School province',
            'required',
        );
        $this->form_validation->set_rules(
            'nohp',
            'School phone',
            'required',
        );
        $this->form_validation->set_rules(
            'status',
            'School status',
            'required',
        );


        if ($this->form_validation->run() == false) {
            $this->load->view("layout/admin_header", $data);
            $this->load->view("console/tambah_lembaga", $data);
            $this->load->view("layout/admin_footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('provinsi'),
                'nohp' => $this->input->post('nohp'),
                'status' => $this->input->post('status'),

            ];

            $this->Lembaga_model->insert($data);
            $this->session->set_flashdata('message', '<script type="text/javascript">swal("Good job!", "Success!", "success");</script>');
            redirect('Console/school');
        }
    }

    public function user()
    {
        $data['user'] = $this->userrole->getBy();
        $data['konsumen'] = $this->Konsumen_model->getAll();
        $this->load->view('layout/admin_header.php', $data);
        $this->load->view('console/user_Active.php', $data);
        $this->load->view('layout/admin_footer.php', $data);
    }
    public function testimonial()
    {
        $data['user'] = $this->userrole->getBy();
        $data['testi'] = $this->Testi_model->getAll();
        $this->load->view('layout/admin_header.php', $data);
        $this->load->view('console/testimonial.php', $data);
        $this->load->view('layout/admin_footer.php', $data);
    }
    function detail_testi($id)
    {
        $data = $this->Testi_model->get_user_data($id);
        echo json_encode($data);
    }
    public function delete_testi($id)
    {
        $this->Testi_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<script type="text/javascript">swal("Cannot delete the data!", "Error!", "error");</script>');
        } else {
            $this->session->set_flashdata('message', '<script type="text/javascript">swal("Data Deleted!", "Success!", "success");</script>');
        }
        redirect('Console/testimonial');
    }
    public function delete_school($id)
    {
        $this->Lembaga_model->delete($id);
        $error = $this->db->error();
        if ($this->db->error()) {
            echo '<script type="text/javascript">alert("Cannot delete the data! Error!");</script>';
        } else {
            $this->session->set_flashdata('message', '<script type="text/javascript">swal("Data Deleted!", "Success!", "success");</script>');
        }
        redirect('Console/school');
    }

    function edit_school($id)
    {
        $data['user'] = $this->userrole->getBy();
        $data['lembaga'] = $this->Lembaga_model->getById($id);
        $this->form_validation->set_rules(
            'nama',
            'School name',
            'required',
        );
        $this->form_validation->set_rules(
            'alamat',
            'School address',
            'required',
        );
        $this->form_validation->set_rules(
            'provinsi',
            'School province',
            'required',
        );
        $this->form_validation->set_rules(
            'nohp',
            'School phone',
            'required',
        );
        $this->form_validation->set_rules(
            'status',
            'School status',
            'required',
        );


        if ($this->form_validation->run() == false) {
            $this->load->view("layout/admin_header", $data);
            $this->load->view("console/edit_lembaga", $data);
            $this->load->view("layout/admin_footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('provinsi'),
                'nohp' => $this->input->post('nohp'),
                'status' => $this->input->post('status'),
            ];

            $id = $this->input->post('id');
            $this->Lembaga_model->update(['id' => $id], $data);
            // print_r($id);
            // die;
            $this->session->set_flashdata('message', '<script type="text/javascript">swal("Good job!", "Success!", "success");</script>');
            redirect('Console/school');
        }
    }
    public function reports()
    {
        $data['user'] = $this->userrole->getBy();
        $data['laporan'] = $this->Laporan_model->getAll();
        $this->load->view('layout/admin_header.php', $data);
        $this->load->view('console/laporan.php', $data);
        $this->load->view('layout/admin_footer.php', $data);
    }
    public function detail_report($id)
    {
        $data['user'] = $this->userrole->getBy();
        $data['laporan'] = $this->Laporan_model->getAllReport($id);
        $this->form_validation->set_rules(
            'pesan',
            'Message',
            'required',
        );
        $this->form_validation->set_rules(
            'status',
            'Status',
            'required',
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/admin_header.php', $data);
            $this->load->view('console/detail_laporan.php', $data);
            $this->load->view('layout/admin_footer.php', $data);
        } else {
            $data = [
                'pesan' => $this->input->post('pesan'),
                'status' => $this->input->post('status'),
            ];

            $id = $this->input->post('id');
            $this->Laporan_model->update(['id' => $id], $data);
            // print_r($id);
            // die;
            $this->session->set_flashdata('message', '<script type="text/javascript">swal("Good job!", "Success!", "success");</script>');
            redirect('Console/reports');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success logout!</div>');
        redirect('Console');
    }
    function profile()
    {
        $data['user'] = $this->userrole->getBy();

        $this->form_validation->set_rules('nama', 'Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/admin_header', $data);
            $this->load->view('console/profile.php', $data);
            $this->load->view('layout/admin_footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
            ];

            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5000';
                $config['upload_path'] = './assets/images/profil/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/profil/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'image' => $new_image,
                    ];
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->userrole->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<script type="text/javascript">Swal.fire("Profil berhasil diubah");</script>');

            redirect('Console/dashboard');
        }
    }
    function profilepass()
    {
        $data['user'] = $this->userrole->getBy();

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[5]|matches[password2]'
        );
        $this->form_validation->set_rules('password2', 'Confirm password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/admin_header', $data);
            $this->load->view('console/profile.php', $data);
            $this->load->view('layout/admin_footer', $data);
        } else {
            $data = [
                'password' => SHA1($this->input->post('password')),
            ];

            $id = $this->input->post('id');
            $this->userrole->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<script type="text/javascript">Swal.fire("Profil berhasil diubah");</script>');
            redirect('Console/dashboard');
        }
    }

    public function category()
    {
        $data['user'] = $this->userrole->getBy();
        $data['category'] = $this->Category_model->get();
        $this->load->view('layout/admin_header.php', $data);
        $this->load->view('console/category.php', $data);
        $this->load->view('layout/admin_footer.php', $data);
    }

    public function add_category()
    {
        $data['user'] = $this->userrole->getBy();
        $data['category'] = $this->Category_model->get();
        $this->form_validation->set_rules(
            'jenis',
            'Category',
            'required',
        );

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/admin_header", $data);
            $this->load->view("console/tambah_category", $data);
            $this->load->view("layout/admin_footer");
        } else {
            $data = [
                'jenis' => $this->input->post('jenis'),

            ];

            $this->Category_model->insert($data);
            $this->session->set_flashdata('message', '<script type="text/javascript">swal("Good job!", "Success!", "success");</script>');
            redirect('Console/category');
        }
    }
    function edit_category($id)
    {
        $data['user'] = $this->userrole->getBy();
        $data['category'] = $this->Category_model->getById($id);
        $this->form_validation->set_rules(
            'jenis',
            'Category',
            'required',
        );



        if ($this->form_validation->run() == false) {
            $this->load->view("layout/admin_header", $data);
            $this->load->view("console/edit_category", $data);
            $this->load->view("layout/admin_footer");
        } else {
            $data = [
                'jenis' => $this->input->post('jenis'),
            ];

            $id = $this->input->post('id');
            $this->Category_model->update(['id' => $id], $data);
            // print_r($id);
            // die;
            $this->session->set_flashdata('message', '<script type="text/javascript">swal("Good job!", "Success!", "success");</script>');
            redirect('Console/category');
        }
    }
    public function delete_category($id)
    {
        $this->Category_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<script type="text/javascript">swal("Cannot delete the data!", "Error!", "error");</script>');
        } else {
            $this->session->set_flashdata('message', '<script type="text/javascript">swal("Data Deleted!", "Success!", "success");</script>');
        }
        redirect('Console/category');
    }
    public function aspiration()
    {
        $data['user'] = $this->userrole->getBy();
        $data['aspirasi'] = $this->Aspirasi_model->getAll();
        $this->load->view('layout/admin_header.php', $data);
        $this->load->view('console/aspirasi.php', $data);
        $this->load->view('layout/admin_footer.php', $data);
    }
    public function detail_aspiration($id)
    {
        $data['user'] = $this->userrole->getBy();
        $data['aspirasi'] = $this->Aspirasi_model->getAllReport($id);
        $this->load->view('layout/admin_header.php', $data);
        $this->load->view('console/detail_aspirasi.php', $data);
        $this->load->view('layout/admin_footer.php', $data);
    }
    public function filtrasi_data() {
        $data['user'] = $this->userrole->getBy();
        $status = $this->input->get('status');

        $this->db->Select('k.*,l.nama as nama, l.lembaga ');
        $this->db->from('laporan k');
        $this->db->join('konsumen l', 'k.id_user=l.id');


        if (!empty($status)) {
            $this->db->where('k.status', $status);
        }

        $query = $this->db->get();
        $data['laporan'] = $query->result_array();
        $this->load->view('layout/admin_header.php', $data);
        $this->load->view('console/laporan', $data);
        $this->load->view('layout/admin_footer.php', $data);
    }

}
