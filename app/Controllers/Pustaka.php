<?php

namespace App\Controllers;

class Pustaka extends BaseController
{

    public function index()
    {
        return view('pustaka/daftar');
    }

    public function level_kkni()
    {
        return view('pustaka/kkni');
    }

    public function daftar()
    {
        return view('pustaka/daftar');
    }

    public function paud($submenu=null, $opsi=null)
    {
        $data['tingkat'] = "pustaka";
        $data['opsi'] = $opsi;
        if ($submenu==null || $submenu=="definisi")
            return view('pustaka/def_paud', $data);
        else if ($submenu=="klasifikasi")
            return view('pustaka/klas_paud', $data);
    }

    public function dikdas($submenu=null, $opsi=null)
    {
        $data['tingkat'] = "pustaka";
        $data['opsi'] = $opsi;
        if ($submenu==null || $submenu=="definisi")
            return view('pustaka/def_dikdas', $data);
        else if ($submenu=="klasifikasi")
            return view('pustaka/klas_dikdas', $data);
    }

    public function dikmen($submenu=null, $opsi=null)
    {
        $data['tingkat'] = "pustaka";
        $data['opsi'] = $opsi;
        if ($submenu==null || $submenu=="definisi")
            return view('pustaka/def_dikmen', $data);
        else if ($submenu=="klasifikasi")
            return view('pustaka/klas_dikmen', $data);
    }

    public function dikti($submenu=null, $opsi=null)
    {
        $data['tingkat'] = "pustaka";
        $data['opsi'] = $opsi;
        if ($submenu==null || $submenu=="definisi")
            return view('pustaka/def_dikti', $data);
        else if ($submenu=="klasifikasi")
            return view('pustaka/klas_dikti', $data);
    }

    public function dikmas($submenu=null, $opsi=null)
    {
        $data['tingkat'] = "pustaka";
        $data['opsi'] = $opsi;
        if ($submenu==null || $submenu=="definisi")
            return view('pustaka/def_dikmas', $data);
        else if ($submenu=="klasifikasi")
            return view('pustaka/klas_dikmas', $data);
    }

    public function residu_ud($submenu=null, $opsi=null)
    {
        $data['tingkat'] = "pustaka";
        $data['opsi'] = $opsi;
        if ($submenu==null || $submenu=="definisi")
            return view('pustaka/def_residu_ud', $data);
        else if ($submenu=="klasifikasi")
            return view('pustaka/klas_residu_ud', $data);
    }

    public function residu_sp($submenu=null, $opsi=null)
    {
        $data['tingkat'] = "pustaka";
        $data['opsi'] = $opsi;
        if ($submenu==null || $submenu=="definisi")
            return view('pustaka/def_residu_sp', $data);
        else if ($submenu=="klasifikasi")
            return view('pustaka/klas_residu_sp', $data);
    }

    public function satuan_pendidikan($submenu=null, $opsi=null)
    {
        $data['tingkat'] = "pustaka";
        $data['opsi'] = $opsi;
        if ($submenu==null || $submenu=="definisi")
            return view('pustaka/def_satuan_pendidikan', $data);
        else if ($submenu=="klasifikasi")
            return view('pustaka/klas_satuan_pendidikan', $data);

    }

    public function yayasan($submenu=null, $opsi=null)
    {
        $data['tingkat'] = "pustaka";
        $data['opsi'] = $opsi;
        if ($submenu==null || $submenu=="definisi")
            return view('pustaka/def_yayasan', $data);

    }

    public function layanan($submenu=null, $opsi=null)
    {
        $data['tingkat'] = "pustaka";
        $data['opsi'] = $opsi;
        if ($submenu==null || $submenu=="definisi")
            return view('pustaka/def_layanan', $data);
        else if ($submenu=="klasifikasi")
            return view('pustaka/klas_layanan', $data);
    }

    public function paud_program($submenu=null, $opsi=null)
    {
        $data['tingkat'] = "pustaka";
        $data['opsi'] = $opsi;
        if ($submenu==null || $submenu=="definisi")
            return view('pustaka/def_paud_program', $data);
        else if ($submenu=="klasifikasi")
            return view('pustaka/klas_paud_program', $data);
    }

    public function kesetaraan($submenu=null, $opsi=null)
    {
        $data['tingkat'] = "pustaka";
        $data['opsi'] = $opsi;
        if ($submenu==null || $submenu=="definisi")
            return view('pustaka/def_kesetaraan', $data);
        else if ($submenu=="klasifikasi")
            return view('pustaka/klas_kesetaraan', $data);
    }

    public function keterampilankerja($submenu=null, $opsi=null)
    {
        $data['tingkat'] = "pustaka";
        $data['opsi'] = $opsi;
        if ($submenu==null || $submenu=="definisi")
            return view('pustaka/keterampilankerja', $data);
        else if ($submenu=="penyetaraan")
            return view('pustaka/penyetaraan', $data);
    }

}