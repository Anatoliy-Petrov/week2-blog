<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;

class Post extends Model
{
    //
    protected $fillable = ['title', 'body', 'user_id', 'image'];
    protected $with = ['user', 'likes'];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'liked');
    }

    public function like()
    {
        $attributes = ['user_id' => auth()->id()];

        if(! $this->likes()->where($attributes)->exists()){

            return $this->likes()->create($attributes);
        }
    }
    public function unLike()
    {
        $attributes = ['user_id' => auth()->id()];

        if($this->likes()->where($attributes)->exists()){

            return $this->likes()->delete($attributes);
        }
    }
    public function isLiked()
    {
        return !! $this->likes->where('user_id', auth()->id())->count();
    }
    public function getLikesCountAttribute()
    {
        return $this->likes->count();
    }

    public function canEdit()
    {
        return $this->likes->first()->user_id;
    }

}
