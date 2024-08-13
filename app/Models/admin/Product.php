<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=["details","exp_date","name","company_id"];
    public function haveOwner()
    {
      return $this->belongsTo(Company::class,"id");
    }
}
