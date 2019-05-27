<div class="card card-01">
    <img class="card-img-top" src="{{$course->pathAttachment()}}" alt="{{$course->name}}">
    
    <div class="card-body">
        <span class="badge-box"> <i class="fa fa-check" aria-hidden="true"></i></span>
        <h4 class="card-title">{{str_limit($course->name,40)}}</h4>
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
        <a href="{{route('cursos_detail',$course->slug  )}}" class="btn btn-block new-btn">
          <i class="fas fa-info-circle fa-lg"></i>  {{__("More Information ")}}
        </a>

    </div>
</div>