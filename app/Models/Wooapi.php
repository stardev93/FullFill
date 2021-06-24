<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wooapi extends Model
{
    use HasFactory;

    public $table = 'wooapis';

    protected $fillable = [
        'user_id',
        'store',
        'consumer_key',
        'consumer_secret'
    ];
}
