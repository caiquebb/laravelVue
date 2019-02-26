@extends('layouts.app')

@section('content')
<vue-page size="12">
    @if ($errors->all())
        <div class="alert alert-danger alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $error)
                <p><strong>{{ $error }}</strong></p>
            @endforeach
        </div>
    @endif

    <vue-panel title="Article List">
        <vue-breadcrumbs :links="{{$breadcrumbs}}"></vue-breadcrumbs>
        
        <vue-list-table
            :titles="[ '#', 'Title', 'Description', 'Publish' ]"
            :items="{{ $articles }}"
            :modal="true"
            sort="asc"
            sort-col="2"
            create-url="#create"
            show-url="/admin/articles/"
            edit-url="/admin/articles/"
            delete-url="/admin/articles/"
            csrf-toekn="{{ csrf_token() }}">
        </vue-list-table>
    </vue-panel>
</vue-page>

<vue-modal-content id="createModal" title="Create">
    <vue-form id="createForm" css="" action="{{ route('articles.store') }}" method="post" enctype="" csrf-token="{{ csrf_token() }}">
        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" name="title" type="text" class="form-control" placeholder="Title" value="{{ old('title') }}">
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <input id="description" name="description" type="text" class="form-control" placeholder="Description" value="{{ old('description') }}">
        </div>
        
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control">{{ old('content') }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="publish_datetime">Publish</label>
            <input id="publish_datetime" name="publish_datetime" type="datetime-local" class="form-control" value="{{ old('publish_datetime') }}">
        </div>
    </vue-form>

    <span slot="footer">
        <button form="createForm" class="btn btn-info">Add</button>
    </span>
</vue-modal-content>

<vue-modal-content id="showModal" :title="$store.state.item.title">
    <p>@{{$store.state.item.description}}</p>
    <p>@{{$store.state.item.content}}</p>
</vue-modal-content>

<vue-modal-content id="editModal" title="Edit">
    <vue-form id="editForm" css="" :action="`/admin/articles/${$store.state.item.id}`" method="put" enctype="" csrf-token="{{ csrf_token() }}">
        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" name="title" type="text" class="form-control" v-model="$store.state.item.title" placeholder="Title">
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <input id="description" name="description" type="text" class="form-control" v-model="$store.state.item.description" placeholder="Description">
        </div>
        
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control" v-model="$store.state.item.content"></textarea>
        </div>
        
        <div class="form-group">
            <label for="publish_datetime">Publish</label>
            <input id="publish_datetime" name="publish_datetime" type="datetime-local" class="form-control" v-model="$store.state.item.publish_datetime">
        </div>
    </vue-form>

    <span slot="footer">
        <button form="editForm" class="btn btn-info">Update</button>
    </span>
</vue-modal-content>
@endsection
