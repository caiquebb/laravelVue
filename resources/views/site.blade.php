@extends('layouts.app')

@section('content')
<vue-page size="12">
    <vue-panel title="Articles">
        <div class="row">
            <vue-article-card
                sm="6"
                md="4"
                link="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTf45cOeLA9Yq0x80-AVQCq8fh1PiBDC1CcXMrlESj2dXi94YCOmQ"
                publish-date="26/02/2019"
                author="Caique Bertolozzi"
                title="Article Title"
                description="Article Description">
            </vue-article-card>
        </div>
    </vue-panel>
</vue-page>
@endsection
