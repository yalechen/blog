<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // 是否已读：是
    const READ_YES = 1;
    // 是否已读：否
    const READ_NO = 0;

    protected $table = 'news';

    /**
     * 所属用户
     */
    public function user()
    {
        $this->belongsTo('App\User');
    }
}
