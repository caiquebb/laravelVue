@extends('layouts.app')

@section('content')
<vue-page size="12">
    <vue-panel>
        <h2 align="center">{{ $article->title }}</h2>

        <h4 align="center">{{ $article->description }}</h4>

        <p>
            {!! $article->content !!}
        </p>

        <p align="center">
            <small>Author: {{ $article->user->name }} - {{ date('d/m/Y', strtotime($article->publish_datetime)) }}</small>
        </p>
    </vue-panel>
</vue-page>
@endsection
