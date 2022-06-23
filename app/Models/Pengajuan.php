<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'ktp',
        'sertifikat',
        'name',
        'foto',
        'marketlink',
        'user_id',
        'status'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}