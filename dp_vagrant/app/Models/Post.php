<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title','summary','text','slug','author'];

    public function user(){
        return $this->belongsTo(User::class,'author');
    }

    public function sluggable(): array{
        return ['slug' => ['source' => 'title']];
    }
}
