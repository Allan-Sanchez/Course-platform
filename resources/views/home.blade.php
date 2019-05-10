@extends('layouts.app')

@section('jumbotron')
@include('partials.jumbotron',[
    'title' => __("text Jumbotron"),
    'icon' =>"th"
])    
@endsection

@section('content')
    <div class="pl-5 pr-5">
        <div class="row justify-content-center">

            @forelse ($courses as $course)
            <div class="col-md-4 col-lg-3">
                @include('partials.courses.cards')
            </div>
            @empty
            <div class="alert alert-dark" role="alert">
                {{__("There are no courses available")}}
            </div>
                
            @endforelse

            
        </div>
                <div class=" row justify-content-center">
                    {{$courses->links()}}
                </div>
    </div>
@endsection
