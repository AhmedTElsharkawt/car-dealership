<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    protected $fillable = ['name', 'type_id'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function products($options = [])
    {
        $relation = $this->hasMany(Product::class);

        if (!empty($options['newest'])) {
            $relation = $relation->orderBy('id', 'desc');
        }
        if (!empty($options['limit'])) {
            $relation = $relation->take($options['limit']);
        }

        if (!empty($options['similar'])) {
            $relation = $relation->where('id', '<>', $options['similar']);
        }

        return $relation->get();
    }
}
