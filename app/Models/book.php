<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',  
        'author',
        'published_year',
        'category_id',
        'book_image',
        'pdf',
    ];
    
    public function category(){
        return $this->belongsto(category::class);
    }
    
}
