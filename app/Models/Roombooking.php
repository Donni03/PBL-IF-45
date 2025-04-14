<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roombooking extends Model
{
    use HasFactory;
 // Tambahkan ini agar pakai tabel `roomsbooking`
 protected $table = 'roomsbooking';
 
    protected $fillable = [
        'user_id',
        'room_id',
        'date',
        'start_time',
        'end_time',
        'reason',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }
}

