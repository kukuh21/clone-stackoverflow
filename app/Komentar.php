<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';

    public function pertanyaan()
    {
        return $this->belongsTo('App\pertanyaan');
    }
    public function jawaban()
    {
        return $this->belongsTo('App\jawaban');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
