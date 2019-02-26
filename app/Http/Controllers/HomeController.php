<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = json_encode([
            [
                'title' => 'Home',
                'url' => ''
            ]
        ]);

        $totals = [
            'articles' => Article::count(),
            'users' => User::count(),
            'authors' => User::where('author', 'S')->count()
        ];

        return view('home', compact('breadcrumbs', 'totals'));
    }
}
