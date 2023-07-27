<?php
function is_logged_in() //membatasi akses ke halaman admin
{
    $CI =& get_instance();

    // Periksa apakah ada sesi login yang aktif
    if (!$CI->session->userdata('logged_in')) {
        // Pengguna belum login, redirect ke halaman login atau halaman lain sesuai kebutuhan
        redirect('Console'); // Gantilah dengan URL halaman login atau halaman lainnya
    }
} 

function is_logged_in2() //membatasi akses ke halaman user
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
    redirect('auth');
} else {
    $role = $ci->session->userdata('role');
    if ($role != "User") {
    redirect('Admin');
}
}
}