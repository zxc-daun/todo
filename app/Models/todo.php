<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
