<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mood extends Model
{

    // 配置软删除
    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $table = 'moods';

    /**
     * 所属用户
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
