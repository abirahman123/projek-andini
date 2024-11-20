@extends('layouts.app')
@section('content')
<div class="row row-cols-md-3 row-cols-2 gx-5 p-5">
   @foreach ($news as $news)
    <div class="col mb-5">
        <div class="card" style="width: 18rem;">
            <img src="{{ $news->image_url }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $news->title }}</h5>
                <p class="card-text">{{ $news->description }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
