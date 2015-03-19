<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categorys';

    /**
     * 旗下博文
     */
    public function articles()
    {
        $this->hasMany('Article');
    }
}
