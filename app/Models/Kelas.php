<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Kelas extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = "kelas";
    protected $guarded = [];


    public function siswa()
    {
        return $this->hasMany(Siswa::class, "kelas_id", "id");
    }
}
