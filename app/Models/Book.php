<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'isbn', 'publisher', 'publish_year', 'pages', 
        'language', 'description', 'cover_url', 'total_copies', 
        'available_copies', 'status', 'category_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function authors() {
        return $this->belongsToMany(Author::class)->withPivot('role');
    }
}