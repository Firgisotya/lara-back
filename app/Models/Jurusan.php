<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = "jurusans";
    protected $guarded = [];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    
}
