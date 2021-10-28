<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "image",
        "company",
        "name",
        "year",
        "price",
        "type",
        "shape",
        "user_id",


    ];

    public function writer() {
        return $this->belongsTo(User::class, "user_id");
    }

}
