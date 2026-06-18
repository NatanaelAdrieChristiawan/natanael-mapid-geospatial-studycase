<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Menyediakan data meta untuk SEO secara dinamis
        $seo = [
            'title' => 'Natanael Adrie Christiawan | Fullstack Developer & GIS Engineer',
            'description' => 'Portfolio Profesional Natanael Adrie Christiawan - Mahasiswa S1 Informatika Telkom University, Pengembang Perangkat Lunak Tersertifikasi BNSP.',
            'keywords' => 'Natanael Adrie, Web Developer, GIS Engineer, Telkom University, Laravel 11, Tailwind CSS',
            'url' => url('/')
        ];

        return view('home.index', compact('seo'));
    }
}
