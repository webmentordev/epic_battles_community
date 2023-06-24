<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logo extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'user_id',
        'is_active'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
