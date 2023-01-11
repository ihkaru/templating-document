<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenunjukJalan extends Model
{
    use HasFactory;

    public function sls(){
        return $this->belongsTo(SLS::class,"sls_id","id");
    }


}
