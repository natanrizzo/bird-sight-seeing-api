<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seeing extends Model
{
    /** @use HasFactory<\Database\Factories\SeeingFactory> */
    use HasFactory;

    protected $fillable = ["title", "description", "image_url", "status", "sight_date", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
