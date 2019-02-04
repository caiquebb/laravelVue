@extends('layouts.app')

@section('content')
<vue-page size="12">
    <vue-panel title="Article List">
        <vue-breadcrumbs :links="{{$breadcrumbs}}"></vue-breadcrumbs>

        <vue-modal-button type="button" title="My Modal" target="MyModal"></vue-modal-button>
        
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

<vue-modal-content id="MyModal">
    <vue-panel title="My Form">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div>
            <div class="checkbox">
                <label>
                <input type="checkbox"> Check me out
                </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </vue-panel>
</vue-modal-content>
@endsection
