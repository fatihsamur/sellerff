<?php

namespace Wave\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function link()
    {
        return url('/blog/' . $this->category->slug . '/' . $this->slug);
    }

    public function user()
    {
        return $this->belongsTo('\Wave\Model\User', 'author_id');
    }

    public function image()
    {
        return \Voyager::image($this->image);
    }

    public function category()
    {
        return $this->belongsTo('Wave\Model\Category');
    }
}
