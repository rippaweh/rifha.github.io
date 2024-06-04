<?php

namespace App\Http\Controllers;

//import Model Post
use App\Models\Post;

//return type view
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $posts = Post::latest()->paginate(5);

        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'perempuan')->count();

        //render view with posts
        return view('dashboard', compact('posts', 'maleCount', 'femaleCount'));

    }

    public function pegawai(): View
    {
        $posts = Post::latest()->paginate(5);
        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'perempuan')->count();
        return view('pegawai', compact('posts', 'maleCount', 'femaleCount'));
    }
}

