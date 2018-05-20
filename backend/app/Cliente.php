<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'tgm_cliente';
    protected $primarykey = 'id';

    protected $fillable = [
        'nombre', 'apellido', 'peso', 'imc'
    ];

    public function usuario() {
        $this->belongsTo('App\User', 'tgm_cliente_id');
    }

    public function gimnasios() {
    	return $this->belongsToMany('App\Gimnasio', 'tgm_inscripcion', 'tgf_cliente_id', 'tgm_gimnasio_id');
    }

    public function historiales() {
    	return $this->hasMany('App\Historial', 'tgm_cliente_id');
    }
}
