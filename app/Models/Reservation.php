<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    public function reservationUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservationActivities(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
