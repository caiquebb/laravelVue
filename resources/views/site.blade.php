@extends('layouts.app')

@section('content')
<vue-page size="12">
    <vue-panel title="Articles">
        <div class="row">
            @foreach ($list as $article)
                <vue-article-card
                    sm="6"
                    md="4"
                    link="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTf45cOeLA9Yq0x80-AVQCq8fh1PiBDC1CcXMrlESj2dXi94YCOmQ"
                    publish-date="{{ $article->publish_datetime }}"
                    author="{{ $article->author }}"
                    title="{{ $article->title}}"
                    description="{{ $article->description }}">
                </vue-article-card>
            @endforeach
        </div>
        <div align="center">
            {{ $list }}
        </div>
    </vue-panel>
</vue-page>
@endsection
