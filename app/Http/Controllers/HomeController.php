<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title="Data Mahasiswa";
        $data['mahasiswa']=array(
            'nim'=>'1905021004',
            'nama'=>' Najah ghina nur hanifah ',
            'alamat'=>'Banyuning',
            'nohp'=>'08983248030',
            'email'=>'najah@undiksha.ac.id'
        );
        return view('admin.beranda', compact('title','data'));
    }
    public function dashboard(){
        $title="Data Dashboard";

        return view('admin.dashboard', compact('title'));
    }
}