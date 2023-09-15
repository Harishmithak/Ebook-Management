<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class premiumbook extends Model
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
    
    public function premiumcategory()
{
    return $this->belongsTo(premiumcategory::class, 'category_id');
}
}
