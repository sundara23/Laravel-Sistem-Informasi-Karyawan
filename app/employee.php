<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $guarded = ['id'];

    public $table = 'employees';

    public function jabatan()
    {
        return $this->belongsTo('App\Position', 'id_jabatan');
    }
    public function status()
    {
        return $this->belongsTo('App\Status', 'id_status');
    }


}
