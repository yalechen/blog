<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    protected $table = 'comments';

    /**
     * 所属博文
     */
    public function article()
    {
        $this->belongsTo('Article');
    }
}
