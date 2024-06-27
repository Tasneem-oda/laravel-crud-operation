<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id'
        // Add other fields that you want to be mass assignable
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
