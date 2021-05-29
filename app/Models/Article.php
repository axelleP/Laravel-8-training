<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
//    protected $primaryKey = 'a_id';

    public static function getRules() {
        return [
            'a_date_creation' => 'required',
            'a_nom' => 'required',
            'a_description' => 'required',
            'a_prix' => 'required',
            'a_quantite' => 'required',
            'a_image' => 'required'
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
