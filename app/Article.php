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
        return $this->belongsTo(User::class);
    }

    public static function listArticles($perPage)
    {
        if (auth()->user()->admin == 'S') {
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
            )->orderBy(
                'articles.id',
                'desc'
            )->paginate($perPage);
        } else {
            return auth()->user()->articles()->select(
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
            )->orderBy(
                'articles.id',
                'desc'
            )->paginate($perPage);
        }
    }

    public static function listArticlesSite($perPage, $search = '')
    {
        $query = self::select(
            'articles.id',
            'articles.title',
            'articles.description',
            'users.name as author',
            'articles.publish_datetime'
        )->join(
            'users',
            'users.id',
            '=',
            'articles.user_id'
        )->whereDate(
            'publish_datetime',
            '<=',
            date('Y-m-d')
        )->orderBy(
            'publish_datetime',
            'desc'
        );

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->orWhere(
                    'title',
                    'like',
                    "%{$search}%"
                )->orWhere(
                    'description',
                    'like',
                    "%{$search}%"
                );
            });
        }

        return $query->paginate($perPage);
    }
}
