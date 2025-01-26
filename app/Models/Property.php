<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'surface',
        'price',
        'description',
        'room',
        'floor',
        'adress',
        'postal_code',
        'city',
        'piece',
        'sold',
    ];

    public function options(){
        return $this->belongsToMany(Option::class);
    }

    public function getSlug():string {
        return \Str::slug($this->title);
    }

    public function scopeAvailable(Builder $builder):Builder{
        return $builder->where('sold',false);
    }
}
