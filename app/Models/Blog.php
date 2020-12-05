<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $table = 'blogs';

    public $fillable = [
        'title',
        'description',
        'publication_date',
        'user_id'
    ];

    public $dates=[
        'publication_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
