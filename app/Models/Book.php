<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'name',
        'description',
        'author_id',
        'category_id',
        'publisher_id',
        'book_type_id',
        'publish_date',
        'quantity',
        'book_cover_photo',
    ];
}
