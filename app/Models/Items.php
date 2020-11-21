<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    protected $guarded = ['mana'];

    public function kategoris()
    {
        return $this->belongsTo('App\Models\Kategoris');
    }
}