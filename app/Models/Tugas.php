<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'is_completed',
        'completed_at'
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];


    public function user() // Fungsi ini menghubungkan task dengan pengguna
    {
        return $this->hasOne('App\Models\User','id','user_id');
        // Task ini punya satu pengguna, dihubungkan oleh 'user_id' dengan 'id' di tabel User
    }
}
