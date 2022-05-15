<?php

namespace Wave\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function link()
    {
        return url('p/' . $this->slug);
    }

    public function image()
    {
        return \Voyager::image($this->image);
    }
}
