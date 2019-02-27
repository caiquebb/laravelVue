@extends('layouts.app')

@section('content')
<vue-page size="12">
    <vue-panel title="Article">
        <h2>{{ $article->title }}</h2>
    </vue-panel>
</vue-page>
@endsection
