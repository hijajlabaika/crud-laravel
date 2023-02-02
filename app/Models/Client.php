<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = "tb_m_client";

    public function project()
    {
        return $this->hasMany(dashboard::class);
    }
}
