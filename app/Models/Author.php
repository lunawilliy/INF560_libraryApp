<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['first_name', 'last_name', 'nationality', 'birth_date', 'biography'];

    public function books() {
        return $this->belongsToMany(Book::class)->withPivot('role');
    }
}