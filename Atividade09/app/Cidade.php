<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = [
        'nome',
        'estado_id'
    ];

    public $timestamps = false;


    public function aluno()
    {
        return $this->belongsTo('App\Aluno','alunos_ibfk_1');
    }
}
