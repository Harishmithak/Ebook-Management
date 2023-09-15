<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class premiumcategory extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function premiumbook(){
        return $this->hasmany(premiumbook::class);
    }
}
