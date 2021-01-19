<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory,HasTranslations,SearchableTrait;
    protected $fillable = ['title','body'];
    public $timestamps = true;
    public $translatable = ['title','body'];
    protected $searchable = [
        'columns'=>[
            'title'=>10
        ]
];
    //Must include this function for APIs request
    public function toArray()
    {
        $attributes = parent::toArray();
        foreach ($this->getTranslatableAttributes() as $field) {
            $attributes[$field] = $this->getTranslation($field, \App::getLocale());
        }
        return $attributes;
    }
}
