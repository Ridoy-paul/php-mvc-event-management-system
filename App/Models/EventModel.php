<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    protected $table = 'events';
    public $timestamps = false;
    protected $fillable = ['code', 'user_id', 'event_title', 'event_description', 'thumbnail', 'event_date_time', 'max_capacity', 'is_active', 'guest_registration_status', 'created_at', 'updated_at'];
}
