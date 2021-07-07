<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'name', 'address', 'city', 'birth_date', 'birth_country'
    ];

    public function user() {
        return $this->belongsTo("App\User");
    }
}
