<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'summary',
        'genre_id',
        'author_id'
    ];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }
}
