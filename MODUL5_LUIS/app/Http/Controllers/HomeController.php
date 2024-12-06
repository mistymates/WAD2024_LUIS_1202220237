<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Pass data if needed, e.g., summary stats for dosen/mahasiswa
        $data = [
            'dosen_count' => \App\Models\Dosen::count(),
            'mahasiswa_count' => \App\Models\Mahasiswa::count(),
        ];

        return view('home', $data);
    }
}
