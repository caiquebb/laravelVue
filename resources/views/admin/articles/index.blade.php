@extends('layouts.app')

@section('content')
<vue-page size="12">
    <vue-panel title="Article List">
        <vue-list-table
            :titles="[ '#', 'Title', 'Description' ]"
            :items="[ [ 1, 'PHP OO', 'PHP OO course' ],  [ 2, 'Vue JS', 'Vue JS Course' ] ]"
            sort="asc"
            sort-col="2"
            create-url="#create"
            show-url="#show"
            edit-url="#edit"
            delete-url="#delete"
            csrf-toekn="1234567890987654">
        </vue-list-table>
    </vue-panel>
</vue-page>
@endsection
