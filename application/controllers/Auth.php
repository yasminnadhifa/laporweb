<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{
    public function __construct()
    {
       parent::__construct();
       $this->load->library('form_validation');
       $this->load->helper('form');
       $this->load->model('Konsumen_model');
       $this->load->model('Token_model');
       $this->load->model('Lembaga_model');
       $this->load->model('Category_model');
    }
    
    public function index()
    {
        // if ($this->session->userdata('email')){
        //     redirect('indexUser');
        // }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Email harus Valid',
            'required' => 'Email wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/user_login_header.php' );
            $this->load->view('auth/vw_login_user' );
            $this->load->view('layout/user_login_header.php');
        } else {
            $this->cek_login_konsumen();
            
        }
    }
    public function registrasi()
    {
        
        $data['lembaga']= $this->Lembaga_model->getActive();
        $this->form_validation->set_rules('lembaga', 'Lembaga', 'required', [
            'required' => 'Lembaga wajib diisi'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama wajib diisi'
        ]);
        $this->form_validation->set_rules('nohp', 'Nomor HP', 'required|regex_match["^8[1-9][0-9]{6,9}$"]', [
            'required' => 'Nomor HP wajib diisi'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required', [
            'required' => 'Role wajib diisi'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[konsumen.email]', [
            'is_unique' => 'Email ini sudah terdaftar!',
            'valid_email' => 'Email harus Valid',
            'required' => 'Email wajib diisi'
        ]);
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[5]|matches[password2]',
            [
                'matches' => 'Password tidak Sama',
                'min_length' => 'Password terlalu pendek',
                'required' => 'Password wajib diisi'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'required' => 'Password wajib diisi']);
        if ($this->form_validation->run()==false){
            $this->load->view('layout/user_login_header.php' , $data);
            $this->load->view('auth/vw_regis_user' , $data);
            $this->load->view('layout/user_login_header.php', $data);
        }else{
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nohp'=>$this->input->post('nohp'),
                'lembaga'=>$this->input->post('lembaga'),
                'role'=>$this->input->post('role'),
                'image' => 'default.jpg',
                'is_active'=> 0,
                'date_created' => time(),
            ];
            $token = base64_encode(random_bytes(32));
            $user_token =[
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
            $this->Konsumen_model->insert($data);
            $this->Token_model->insert($user_token);
            $this->sendEmail($token,'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert">Akun sudah berhasil dibuat! Silahkan lakukan aktivasi email</div>');
            redirect('Auth');
        }

    }

    private function sendEmail($token,$type){
        $config =[
            'protocol'=>'smtp',
            'smtp_host'=>'ssl://smtp.googlemail.com',
            'smtp_user'=>'layananLX@gmail.com',
            'smtp_pass'=>'clejtbtfutenhywg',
            'smtp_port'=>465,
            'mailtype'=>'html',
            'charset'=>'utf-8',
            'newline'=>"\r\n"
        ];
        $data['email'] = $this->input->post('email', true);
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from('LayananLX@gmail.com','LearningX');
        $this->email->to($data['email']);


        if ($type == 'verify'){
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link ini untuk verifikasi akun kamu: 
                <a href="'. base_url() . 'Auth/verify?email=' . $this->input->post('email', true) . '&token=' . urlencode($token)  . '">Aktivasi</a> ');
        }else if($type == 'forgot'){
            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk reset password kamu: 
                <a href="'. base_url() . 'Auth/reset?email=' . $this->input->post('email', true) . '&token=' . urlencode($token)  . '">Reset Password</a> ');
        }

       if($this->email->send()) {
        return true;
       }else{
        echo $this->email->print_debugger();
        die;
       }

        
    }

    public function verify(){
        $email = $this->input->get('email');
        
        $token = $this->input->get('token'); 


        $user = $this->db->get_where('konsumen',['email'=>$email])->row_array();
        if ($user){
            $user_token = $this->db->get_where('user_token',['token'=>$token])->row_array();
            if($user_token){
                if(time()- $user_token['date_created']< (60*60*24)){
                    $this->db->set('is_active',1);
                    $this->db->update('konsumen');
                    $this->db->delete('user_token',['email'=>$email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" 
                    role="alert">'. $email .' telah diaktif, silahkan login!</div>');
                    redirect('Auth');
                }else{
                    $this->db->delete('konsumen',['email'=>$email]);
                    $this->db->delete('user_token',['email'=>$email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Token Expired</div>');
                    redirect('Auth');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Aktivasi akun gagal karena kesalahan token</div>');
                redirect('Auth');  
            }
        
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi akun gagal karena kesalahan email</div>');
            redirect('Auth');
        }
    }
    public function cek_login_konsumen()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('konsumen', ['email' => $email])->row_array();
        if ($user) {
            //Jika user aktif
           if($user['is_active']==1){
            // Cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'id' => $user['id'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('Konsumen/indexUser');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('Auth');
                }
            }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Diaktivasi! </div>');
            redirect('Auth');
           }
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Tedaftar! </div>');
            redirect('Auth');
        }
        }

        public function logout(){
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('id');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil logout!</div>');
            redirect('Konsumen');

        }

        public function forgot_pass()
        {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
                'valid_email' => 'Email harus Valid',
                'required' => 'Email wajib di isi'
            ]);
            if ($this->form_validation->run() == false) {
                $this->load->view('layout/user_login_header.php' );
                $this->load->view('auth/vw_forgot_user' );
                $this->load->view('layout/user_login_header.php');
            }else{
                $email = $this->input->post('email');
                $user = $this->db->get_where('konsumen',['email' => $email, 'is_active'=>1])->row_array();
                
                if($user){
                    $token = base64_encode(random_bytes(32));
                    $user_token =[
                        'email' => $email,
                        'token' => $token,
                        'date_created' => time()
                    ];

                    $this->db->insert('user_token',$user_token);
                    $this->sendEmail($token,'forgot');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Periksa email anda</div>');
                    redirect('Auth/forgot_pass');

                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar atau belum aktif</div>');
                    redirect('Auth');
                }
                }
            }

            public function reset()
            {
                $email = $this->input->get('email');
                $token = $this->input->get('token');

                $user = $this->db->get_where('konsumen',['email'=> $email])->row_array();

                if ($user){
                    $user_token = $this->db->get_where('user_token',['token'=>$token])->row_array();

                    if($user_token){
                        $this->session->set_userdata('reset_email',$email);
                        $this->changePassword();
                    }else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal, token salah</div>');
                        redirect('Auth');
                    }
                }else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal, email salah</div>');
                    redirect('Auth');
                }

            }

            public function changePassword()
            {
                if(!$this->session->userdata('reset_email')){
                    redirect('Auth');
                }

                $this->form_validation->set_rules(
                    'password',
                    'Password',
                    'required|trim|min_length[5]|matches[password2]',
                    [
                        'matches' => 'Password tidak Sama',
                        'min_length' => 'Password terlalu pendek',
                        'required' => 'Password wajib diisi'
                    ]
                );
                $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
                    'required' => 'Password wajib diisi']);
                if ($this->form_validation->run()==false){
                    $this->load->view('layout/user_login_header.php' );
                    $this->load->view('auth/vw_change_user' );
                    $this->load->view('layout/user_login_header.php');
                }else{
                    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                    $email = $this->session->userdata('reset_email');

                    $this->db->set('password',$password);
                    $this->db->where('email',$email);
                    $this->db->update('konsumen');
                
                
                
                    $this->session->unset_userdata('reset_email');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah</div>');
                    redirect('Auth');
                }

            }


            
        }
