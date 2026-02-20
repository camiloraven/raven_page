<?php

namespace App\Models;

use CodeIgniter\Model;

class PostTranslation extends Model
{
    protected $table            = 'post_translations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    // Estos son los campos que corresponden a los textos y SEO
    protected $allowedFields = [
        'post_id', 
        'language_code', 
        'title', 
        'slug', 
        'content', 
        'meta_title', 
        'meta_description', 
        'keywords'
    ];
}