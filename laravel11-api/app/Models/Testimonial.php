<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi melalui mass assignment
    protected $fillable = [
        'name',
        'content',
    ];

    // Jika Anda ingin menambahkan mutators atau accessor, bisa ditambahkan di sini
    // Contoh: public function getCreatedAtAttribute($value) { return Carbon::parse($value)->diffForHumans(); }
}
