<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['id', 'name'];

    public $timestamps = false;
    
    public function jobs(){
        return $this->hasMany(Job::class);
    }
}
