<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_user_nofication',
        'id_sent_user_notification',
        'content',
        'type',
        'email_notifycation',
    ];
}
