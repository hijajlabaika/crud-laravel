<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dashboard extends Model
{
    use HasFactory;


    protected $table = "tb_m_project";
    protected $dates = ['project_start', 'project_end'];
    public $mySelected = [];
    public $selectAll = false;
    public $firstId = NULL;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
