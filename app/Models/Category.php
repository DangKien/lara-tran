<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Category extends Model
{
    use Translatable;
    protected $blog = 'categories';

    protected $translationModel = "App\Models\CategoryTranslation"; 

    protected $translatedAttributes = ['name', 'description', 'slug', 'meta_title', 'meta_description', 'meta_data'];

    public $translationForeignKey = 'category_id';
}
