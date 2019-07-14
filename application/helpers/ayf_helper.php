<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('user_profile_kode');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'user_profil_kode' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    //and
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}


function link_dashboard($user_profil_kode)
{
    if ($user_profil_kode == 1) {
        return "admin";
    } else if ($user_profil_kode == 2) {
        return "operator";
    } else if ($user_profil_kode == 3) {
        return "pimpinan";
    } else if ($user_profil_kode == 4) {
        return "dosen";
    } else if ($user_profil_kode == 5) {
        return "mahasiswa";
    }
}
function link_profil($user_profil_kode)
{
    if ($user_profil_kode == 1) {
        return "admin/profil";
    } else if ($user_profil_kode == 2) {
        return "operator/profil";
    } else if ($user_profil_kode == 3) {
        return "pimpinan/profil";
    } else if ($user_profil_kode == 4) {
        return "dosen/profil";
    } else if ($user_profil_kode == 5) {
        return "mahasiswa/profil";
    }
}
