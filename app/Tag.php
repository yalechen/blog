<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{

    protected $table = 'tags';

    /**
     * 旗下博文
     */
    public function articles()
    {
        $this->belongsToMany('Article', 'article_tags');
    }
}
