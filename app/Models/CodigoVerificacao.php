<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CodigoVerificacao extends Model
{

    protected $table = 'codigoVerificacao';
    protected $fillable = ['user_id', 'code'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



