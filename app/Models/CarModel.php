<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'mark_id',
    ];

    /**
     * @return HasMany
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(Image::class, 'car_model_id');
    }
}
