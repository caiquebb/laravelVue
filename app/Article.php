<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'content',
        'publish_datetime'
    ];

    public function user()
    {
    }

    public static function listArticles($perPage)
    {
        return self::select(
            'articles.id',
            'articles.title',
            'articles.description',
            'users.name',
            'articles.publish_datetime'
        )->join(
            'users',
            'users.id',
            '=',
            'articles.user_id'
        )->paginate($perPage);
    }
}
