<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $table = 'tags';

    /**
     * 旗下博文
     */
    public function articles()
    {
        $this->belongsToMany('App\Article', 'article_tags');
    }

    /**
     * 所属用户
     */
    public function user()
    {
        $this->belongsTo('App\User')->withTimestamps();
        //$this->belongsTo('App\User');
    }
}
