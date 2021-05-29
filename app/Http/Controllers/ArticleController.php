<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showList() {
        $articles = Article::all();

        return view('articles.list', ['articles' => $articles]);
    }

    public function showForm() {
        $article = new Article();
//        \App\Helpers\CVarDumper::dump('ok', 10, 1);exit;

        return view('articles.form', ['article' => $article]);
    }

    public function create(Request $request) {
        if (isset($request['btnAnnuler'])) {
            return redirect()->action([ArticleController::class, 'showList']);
        }

        $rules = Article::getRules();
        $this->validate($request, $rules, [], Article::getTabLabels());
    }
}
