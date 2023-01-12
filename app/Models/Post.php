<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'image_url', 'slug', 'published_at'];
    protected $appends = ['full_slug'];

    public function images()
    {
        return $this->hasMany(Imagem::class);
    }

    public function getFullSlugAttribute()
    {
        return "https://portais.univasf.edu.br/noticias/{$this->attributes['slug']}";
    }
}
