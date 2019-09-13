<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Person extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'mail' => 'email',
        'age'  => 'integer'
    ];

    public function newCollection(array $models = [])
    {
        return new MyCollection($models);
    }

    public function getNameAndAgeAttribute()
    {
        return $this->name . '(' . $this->age . ')';
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function getAllDataAttribute($value)
    {
        return $this->name . '(' . $this->age . ')' . ' [' . $this->mail . ']';
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function setAllDataAttribute(Array $value)
    {
        $this->attributes['name'] = $value[0];
        $this->attributes['mail'] = $value[1];
        $this->attributes['age']  = $value[2];
    }


}

class MyCollection extends Collection
{
    public function fields()
    {
        $item = $this->first();
        return array_keys($item->toArray());
    }
}
