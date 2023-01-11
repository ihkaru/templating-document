<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Petugas extends Model
{
    use HasFactory;
    protected $table = "petugas";
    protected $guarded = [];

    protected $appends = ['pml','koseka'];
    protected $casts = [
        'id' => 'string',
    ];

    public function penunjukJalan(){
        return $this->hasMany(PenunjukJalan::class,"petugas_id");
    }

    protected function pml(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Petugas::find(substr($this->id,0,4)."0")?->nama ?? "",
        );
    }
    protected function koseka(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Petugas::find(substr($this->id,0,2)."000")?->nama ?? "",
        );
    }

}
