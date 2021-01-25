<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @method static first()
 */
class Bucket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getPathAttribute(): string
    {
        return '/buckets/'.$this->id .'-'.Str::slug($this->title);
    }
}
