<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function perusahaan()
    {
        return $this->hasMany(Perusahaans::class, 'broker_id', 'id');
    }
}
