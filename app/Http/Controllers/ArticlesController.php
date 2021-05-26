<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use App\Models\Articles;

class ArticlesController extends Controller
{
    public function showList() {
        return view('articles.list', []);
    }
}
