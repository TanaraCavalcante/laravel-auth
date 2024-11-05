@extends("layouts.app")

@section("content")
<section class="row">
    <div class="card container p-5 my-5 col-6" >
        <div class="card-body">
        <h2 class="card-title">{{$project->title}}</h2>
        <p class="card-text">{{$project->description}}</p>
        </div>
    </div>
</section>
@endsection
