<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
