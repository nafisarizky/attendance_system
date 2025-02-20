<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'check_in_time',
    ];

    public function user() // Fungsi ini menghubungkan task dengan pengguna
    {
        return $this->hasOne('App\Models\User','id','user_id');
        // Task ini punya satu pengguna, dihubungkan oleh 'user_id' dengan 'id' di tabel User
    }

}

