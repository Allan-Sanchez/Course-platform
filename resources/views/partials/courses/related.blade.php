<div class="col-12 pt-0 mt-0">
    <h2 class="text-muted text-center">
        {{__("Course Related")}}
    </h2>
    <hr>
</div>
<div class="container-fluid">
    <div class="row">
        @forelse ($related as $relatedCourse)
        <div class="col-md-6 listing-block">
            <div class="media">
                <div class="fav-box">
                    <i class="fas fa-heart"></i>
                </div>
                <a href="{{route('cursos_detail',$relatedCourse->slug)}}" > 
                    <img class="d-flex align-self-start" src="/storage/courses/{{$relatedCourse->picture}}" alt="{{$relatedCourse->name}}">
                </a>
                <div class="media-body pl-3 pr-5">
                    <div class="price">
                        <small>{{$relatedCourse->name}}</small>
                    </div>
                    <div class="stats">
                        @include('partials.courses.rating',['course'=>$relatedCourse])
                    </div>
                </div>
            </div>
        </div>
            
        @empty
            
        @endforelse
    </div>
</div>