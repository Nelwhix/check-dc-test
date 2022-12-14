<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        "name",
        "duration",
        "price"
    ];

    public function planable() {
        return $this->morphTo();
    }

    public function status() {
        return $this->morphOne(Status::class, 'statusable');
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
