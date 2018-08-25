<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ["status_id", "type_id", "employee_id", "stock_tag_number"];

    public static function scopeQueued ($query) {
        return $query->where('status_id', 1);
    }
    public static function scopeInProgress ($query) {
        return $query->where('status_id', 2);
    }
    public static function scopeCompleted ($query) {
        return $query->where('status_id', 3);
    }
}