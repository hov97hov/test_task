<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mark extends Model
{
    use HasFactory;

    protected $table = 'marks';

    protected $fillable = [
        'title',
    ];

    /**
     * @return HasMany
     */
    public function carModels(): HasMany
    {
        return $this->hasMany(CarModel::class, 'mark_id');
    }
}
