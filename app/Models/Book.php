<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'isbn', 'publisher', 'publish_year', 'pages', 
        'language', 'description', 'cover_url', 'total_copies', 
        'available_copies', 'status', 'category_id',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}