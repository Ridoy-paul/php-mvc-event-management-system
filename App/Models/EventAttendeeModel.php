<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

class EventAttendeeModel extends Model
{
    protected $table = 'event_attendees';
    public $timestamps = false;
    protected $fillable = ['event_code', 'user_id', 'full_name', 'email', 'phone_number', 'registration_date', 'created_at', 'updated_at'];

    // CONSTRAINT fk_event FOREIGN KEY (event_code) REFERENCES events(code) ON DELETE CASCADE ON UPDATE CASCADE,

}
