@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <vue-panel title="Dashboard">
                Content Test

                <div class="row">
                    <div class="col-md-4">
                        <vue-box title="Content 1" color="blue">
                            Child Panel Test
                        </vue-box>
                    </div>

                    <div class="col-md-4">
                        <vue-panel title="Content 2" color="orange">
                            Child Panel Test 2
                        </vue-panel>
                    </div>

                    <div class="col-md-4">
                        <vue-panel title="Content 3" color="panel-info">
                            Child Panel Test 3
                        </vue-panel>
                    </div>
                </div>
            </vue-panel>
        </div>
    </div>
</div>
@endsection
