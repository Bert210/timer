<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ["status_id", "type_id", "employee_id", "stock_tag_number", "vip", "created_at_ms"];

    public static function scopeQueued ($query) {
        return $query->where('status_id', 1)->orderBy('vip', 'desc')->orderBy('created_at_timezone', 'asc');
    }
    public static function scopeInProgress ($query) {
        return $query->where('status_id', 2)->orderBy('vip', 'desc')->orderBy('queue', 'asc');
    }
    public static function scopeCompleted ($query) {
        return $query->where('status_id', 3)->orderBy('processing', 'desc');
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function type() {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}