<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $fillable = [
        'id',
        'name',
    ];

    public function makes($options = [])
    {
        $relation = $this->hasMany(Make::class);

        if (!empty($options['limit'])) {
            $relation = $relation->take($options['limit'])->get();
        }

        return $relation;
    }
}
