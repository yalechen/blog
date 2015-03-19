<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{

    protected $table = 'article_tags';

    public static function boot()
    {
        parent::boot();

        static::created(function ($model)
        {
            // TODO:此表为中间表，当用save和attach的写法的时候，此事件调用不到，此段代码执行不到。添加标签前，如果该标签存在，则权重自动+1
            $tag = Tag::whereUserId($model->article->user_id)->whereName($model->tag->name)->first();
            if (! is_null($tag)) {
                $tag->increment('weight');
            }
        });
    }

    /**
     * 所属文章
     */
    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    /**
     * 所属文章
     */
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
}
