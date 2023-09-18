<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class book extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'title',  
        'author',
        'published_year',
        'category_id',
        'book_image',
        'pdf',
        'booktype',
    ];
    
    public function category(){
        return $this->belongsto(category::class);
    }
    
}
