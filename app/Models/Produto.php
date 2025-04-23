<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'preco', 'imagem', 'user_id'];

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
