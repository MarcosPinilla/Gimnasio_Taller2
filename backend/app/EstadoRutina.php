<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoRutina extends Model
{
    protected $table = 'tgm_estado_rutina';

    protected $primarykey = 'id';

    protected $fillable = ['tgm_cliente_id', 'tgm_rutina_id', 'estado', 'created_at', 'updated_at'];

    public $timestamps = false;

    public function cliente() {
    	return $this->belongsTo('App\Cliente', 'tgm_cliente_id');
    }

    public function rutina() {
    	return $this->belongsTo('App\Rutina', 'tgm_rutina_id');
    }

    public function historiales() {
        return $this->hasMany('App\Historial', 'estado_rutina_id');
    }
}
