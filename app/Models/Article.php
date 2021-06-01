<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;//pour gérer les dates

class Article extends Model
{
    protected $table = 'article';
    public $timestamps = false;//désactive la gestion auto. des champs updated_at et created_at
    protected $guarded = ['a_article'];//ne permet pas aux champs déclarés d'être assignés en masse

    public function __construct(array $data = null) {
        $dateTime = Carbon::now();
        $data['a_date_creation'] = $dateTime->toDateString();

        parent::__construct($data);
    }

    public static function getRules() {
        return [
            'a_date_creation' => 'required|date',
            'a_nom' => 'required',
            'a_description' => 'required',
            'a_prix' => 'required|numeric',
            'a_quantite' => 'required|numeric',
            'a_image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public static function getTabLabels() {
        return [
            'a_date_creation' => 'Date création',
            'a_nom' => 'Nom',
            'a_description' => 'Description',
            'a_prix' => 'Prix',
            'a_quantite' => 'Quantité',
            'a_image' => 'Image'
        ];
    }

    public function getLabel($attribute) {
        return Article::getTabLabels()[$attribute];
    }
}
