<?php

namespace App\Models;

use CodeIgniter\Model;

class Post extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    // campos en la tabla 'posts'
    protected $allowedFields = ['image', 'is_active'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
   
    /**
     * Obtiene todos los posts activos según el idioma solicitado
     */
    public function getPostsByLanguage($locale = 'es')
    {
        return $this->select('posts.*, t.title, t.slug, t.content, t.meta_title, t.meta_description, t.keywords')
                    ->join('post_translations t', 't.post_id = posts.id')
                    ->where('t.language_code', $locale)
                    ->where('posts.is_active', 1)
                    ->orderBy('posts.created_at', 'DESC')
                    ->findAll();
    }
    
    public function getPostBySlug($slug, $locale = 'es')
    {
        return $this->select('posts.*, t.title, t.slug, t.content, t.meta_title, t.meta_description, t.keywords')
                    ->join('post_translations t', 't.post_id = posts.id')
                    ->where('t.slug', $slug)
                    ->where('t.language_code', $locale)
                    ->where('posts.is_active', 1)
                    ->first();
    }
}