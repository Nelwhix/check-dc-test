<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
      'title',
      'description',
      'prologue',
      'tags',
      'categories',
      'edition'
    ];

    public function lendings() {
        return $this->hasOne(Lending::class);
    }

    public function plans() {
        return $this->belongsToMany(Plan::class)->using(BookPlan::class);
    }

    public function accesslevels() {
        return $this->belongsToMany(AccessLevel::class)->using(AccessLevelBook::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function status() {
        return $this->morphOne(Status::class, 'statusable');
    }

}
