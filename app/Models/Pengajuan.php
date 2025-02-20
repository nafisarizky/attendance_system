<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'start_date',
        'end_date',
        'reason',
        'status',
        'proof',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
