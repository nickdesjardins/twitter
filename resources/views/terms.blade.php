@extends('layout.layout')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.left-sidebar')
            </div>
            <div class="col-6">
                <h1>Terms</h1>
                <div>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic sint provident quam? Officiis eos vero, iste ullam libero temporibus soluta harum adipisci cum excepturi. Eos magni, provident ducimus facilis, numquam, recusandae laboriosam accusantium eum porro laudantium eveniet vel fugiat. Molestias sit quaerat est vel fuga voluptates facilis quibusdam, magnam commodi.
                </div>
            </div>
            <div class="col-3">
                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
        </div>
    </div>
@endsection
