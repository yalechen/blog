<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFile extends Model
{

    protected $table = 'user_files';

    protected $visible = [
        'id',
        'user',
        'storage',
        'filename',
        'url',
        'size',
        'mime'
    ];

    protected $appends = [
        'url',
        'size',
        'mime'
    ];

    protected $with = [
        'storage'
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model)
        {
            // $model->filename = preg_replace('/\..*$/i', '', basename($model->filename));
        });
    }

    /**
     * 所属用户
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 文件
     */
    public function storage()
    {
        return $this->belongsTo('Storage', 'storage_hash');
    }

    /**
     * 缩略图列表
     */
    public function thumbnails()
    {
        return $this->belongsToMany('Storage', 'thumbnails', 'file_id', 'storage_hash');
    }

    /**
     * 文件CDN地址
     */
    public function getUrlAttribute()
    {
        return action('StorageController@getFile', [
            'id' => $this->id
        ]);
    }

    /**
     * 文件大小
     */
    public function getSizeAttribute()
    {
        return Storage::find($this->storage_hash)->size;
    }

    /**
     * 文件类型
     */
    public function getMimeAttribute()
    {
        return Storage::find($this->storage_hash)->mime;
    }
}
