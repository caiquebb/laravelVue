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

    <vue-panel title="Admin List">
        <vue-breadcrumbs :links="{{$breadcrumbs}}"></vue-breadcrumbs>
        
        <vue-list-table
            :titles="[ '#', 'Name', 'e-mail' ]"
            :items="{{ json_encode($list) }}"
            :modal="true"
            sort="asc"
            sort-col="2"
            create-url="#create"
            show-url="/admin/admins/"
            edit-url="/admin/admins/" >
        </vue-list-table>

        <div align="center">
            {{ $list }}
        </div>
    </vue-panel>
</vue-page>

<vue-modal-content id="createModal" title="Create">
    <vue-form id="createForm" css="" action="{{ route('admins.store') }}" method="post" enctype="" csrf-token="{{ csrf_token() }}">
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Name" value="{{ old('name') }}">
        </div>
        
        <div class="form-group">
            <label for="email">e-mail</label>
            <input id="email" name="email" type="email" class="form-control" placeholder="e-mail" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="admin">Admin</label>
            <select name="admin" id="admin" class="form-control">
                <option {{ old('admin') && old('admin') == 'S' ? 'selected' : '' }} value="S">Sim</option>
                <option {{ old('admin') && old('admin') == 'N' ? 'selected' : '' }} value="N">Não</option>
            </select>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
        </div>
    </vue-form>

    <span slot="footer">
        <button form="createForm" class="btn btn-info">Add</button>
    </span>
</vue-modal-content>

<vue-modal-content id="showModal" :title="$store.state.item.name">
    <p>@{{$store.state.item.email}}</p>
</vue-modal-content>

<vue-modal-content id="editModal" title="Edit">
    <vue-form id="editForm" css="" :action="`/admin/admins/${$store.state.item.id}`" method="put" enctype="" csrf-token="{{ csrf_token() }}">
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" class="form-control" v-model="$store.state.item.name" placeholder="Name">
        </div>
        
        <div class="form-group">
            <label for="email">e-mail</label>
            <input id="email" name="email" type="email" class="form-control" v-model="$store.state.item.email" placeholder="e-mail">
        </div>

        <div class="form-group">
            <label for="admin">Admin</label>
            <select name="admin" id="admin" class="form-control" v-model="$store.state.item.admin">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="pasword">Password</label>
            <input id="pasword" name="pasword" type="password" class="form-control">
        </div>
    </vue-form>

    <span slot="footer">
        <button form="editForm" class="btn btn-info">Update</button>
    </span>
</vue-modal-content>
@endsection
