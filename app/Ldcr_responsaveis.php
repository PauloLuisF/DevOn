<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ldcr_responsaveis extends Model
{
    protected $table = 'ldcr_responsaveis';
    public $timestamps = false;

    protected $fillable = [

    	'RESP_ID',
        'FK_CRIA_ID',
    	'RESP_NOME',
    	'RESP_NOME_MAE',
    	'RESP_NOME_PAI',
    	'FK_RESP_CIDADE',
    	'FK_RESP_ESTD',
    	'RESP_END_CSA',
    	'RESP_RG',
    	'RESP_CPF',
        'RESP_END_CSA',
    	'RESP_BAIRRO',
    	'RESP_CIDADE',
    	'RESP_TEL',
    	'RESP_PONT_REF',
    	'FK_PROF_ID',
    	'RESP_END_TRAB',
    	'FK_GRPA_ID'

    ];
}
