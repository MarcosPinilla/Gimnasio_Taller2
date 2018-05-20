<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gimnasio extends Model
{
    protected $table = 'tgm_gimnasio';
    protected $primarykey = 'id';

    protected $fillable = [
        'nombre'
    ];

    public function clientes() {
    	return $this->belongsToMany('App\Cliente', 'tgm_inscripcion', 'tgm_gimnasio_id', 'tgf_cliente_id');
    }
}
