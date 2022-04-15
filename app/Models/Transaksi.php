<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaans::class, 'perusahaan_id');
    }

    public function broker()
    {
        return $this->belongsTo(Broker::class, 'broker_id');
    }
}
