<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoris extends Model
{
    use HasFactory;
    protected $guarded = ['name'];

    public function items()
    {
        return $this->hasMany('App\Models\Items');
    }
}

