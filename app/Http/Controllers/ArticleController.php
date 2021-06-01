<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        return view('articles.form', ['article' => $article]);
    }

    public function create(Request $request) {
        if (isset($request['btnAnnuler'])) {
            return redirect()->action([ArticleController::class, 'showList']);
        }

        //validation des données
        $rules = Article::getRules();
        $dataValidated = $request->validate($rules, [], Article::getTabLabels());

        //rque : s'il y a une erreur, l'app revient automatiquement sur la page de départ
        //et le code suivant n'est pas exécuté

        //création de image
        $nomImg = time() . '_' . bin2hex(random_bytes(10)) . '.' . $request->a_image->extension();
        $dossierImg = 'article';
        $request->a_image->move(public_path('img/' . $dossierImg), $nomImg);//enregistre l'image
        $dataValidated['a_image'] = $dossierImg . '/' . $nomImg;

        //sauvegarde de l'article
        Article::create($dataValidated);

        return redirect()->action([ArticleController::class, 'showList'])->with('success','L\'article a bien été crée.');
    }

    public function delete() {
        $id = $_POST['id'];
        
        $article = DB::table('article')
                ->select('a_image')
                ->where('a_id', '=', $id)
                ->get()
                ->first();

        $image = $article->a_image;

        DB::table('article')->where('a_id', '=', $id)->delete();

        //suppression de l'image de l'article stockée dans l'application
        unlink(public_path('img/' . $image));
    }
}
