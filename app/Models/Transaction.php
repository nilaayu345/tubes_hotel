<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'total_room',
        'total_price',
        'check_in',
        'check_out',
    ];

    /**
     * One to Many to table user
     *
     * @return void
     */
    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    /**
     * One to Many to table rooms
     *
     * @return void
     */
    public function rooms() {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
