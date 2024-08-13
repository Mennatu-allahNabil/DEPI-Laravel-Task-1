<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ["name","size","country","city"];


    public function productsOwner(){
        return $this->hasMany(Product::class);
    }
}
