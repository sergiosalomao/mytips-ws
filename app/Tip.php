<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
//    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['id','titulo','categoria_id','descricao'];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
