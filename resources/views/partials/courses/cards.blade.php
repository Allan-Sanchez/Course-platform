<div class="card card-01">
    <img class="card-img-top" src="{{$course->pathAttachment()}}" alt="{{$course->name}}">
    
    <div class="card-body">
        <span class="badge-box"> <i class="fa fa-check" aria-hidden="true"></i></span>
        <h4 class="card-title">{{$course->name}}</h4>
        <hr>

        <div class="row justify-content-center">
        {{--partials rating  --}}
        @include('partials.courses.rating')
        </div>
        <hr>
        <span class="badge badge-primary badge-cat ">{{$course->category->name}}</span>
        <p class="card-text">
            {{str_limit($course->description,100)}}
        </p>

    </div>
</div>