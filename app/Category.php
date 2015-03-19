<?php
namespace App;

use App\Commands\InfiniteHierarchy;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use InfiniteHierarchy;

    protected $table = 'categorys';

    protected $visible = [
        'id',
        'user_id',
        'name',
        'parent_id',
        'path',
        'sort',
        'have_child',
        'created_at'
    ];

    protected $appends = [
        'parent_id',
        'path',
        'have_child'
    ];

    /**
     * 旗下博文
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    /**
     * 所属用户
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 获取当前节点是否有下级节点
     */
    public function getHaveChildAttribute()
    {
        return $this->childNode()->count();
    }
}
