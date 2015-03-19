<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{

    // 是否置顶：是
    const HOT_YES = 1;
    // 是否置顶：否
    const HOT_NO = 0;

    // 是否公开：是
    const PUBLIC_YES = 1;
    // 是否公开：否
    const PUBLIC_NO = 0;

    // 配置软删除
    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $table = 'articles';

    /**
     * 所属分类
     */
    public function category()
    {
        $this->belongsTo('Category');
    }

    /**
     * 旗下标签
     */
    public function tags()
    {
        $this->belongsToMany('Tag', 'article_tags');
    }
}
