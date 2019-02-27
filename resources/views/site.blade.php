@extends('layouts.app')

@section('content')
<vue-page size="12">
    <vue-panel title="Articles">
        <div class="row">
            @foreach ($list as $article)
                <vue-article-card
                    sm="6"
                    md="4"
                    link="{{ route('article', [ $article->id, str_slug($article->title) ]) }}"
                    publish-date="{{ $article->publish_datetime }}"
                    author="{{ $article->author }}"
                    title="{{ str_limit($article->title, 25, '...') }}"
                    description="{{ str_limit($article->description, 40, '...') }}">
                </vue-article-card>
            @endforeach
        </div>
        <div align="center">
            {{ $list }}
        </div>
    </vue-panel>
</vue-page>
@endsection
