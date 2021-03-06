<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ldcr_crianca extends Model
{
    protected $table = 'ldcr_crianca';
    public $timestamps = false;

    protected $fillable = [

    	'ID',
    	'CRIA_NOME',
    	'FK_CRIA_CIDADE',
    	'FK_CRIA_ESTD',
    	'CRIA_DTA_NASC',
        'CRIA_IDADE_EST',
    	'CRIA_CERT_NUM',
    	'CRIA_CERT_LIVR',
    	'CRIA_CERT_FOLH',
        'FK_RACA_ID',
    	'CRIA_SEXO',
    	'CRIA_SIT'
    ];
}
