@extends('layouts.app')

@section('content')
<vue-page size="10">
    <vue-panel title="Dashboard">
        <vue-breadcrumbs :links="{{$breadcrumbs}}"></vue-breadcrumbs>

        <div class="row">
            <div class="col-md-4">
                <vue-box amount="{{ $totals['articles'] }}" title="Articles" url="{{ route('articles.index') }}" color="orange" icon="ion ion-pie-graph"></vue-box>
            </div>
            
            <div class="col-md-4">
                <vue-box amount="{{ $totals['users'] }}" title="Users" url="{{ route('users.index') }}" color="blue" icon="ion ion-person-stalker"></vue-box>
            </div>
            
            <div class="col-md-4">
                <vue-box amount="{{ $totals['authors'] }}" title="Authors" url="{{ route('authors.index') }}" color="red" icon="ion ion-person"></vue-box>
            </div>
        </div>
    </vue-panel>
</vue-page>
@endsection