<div class="row mb-4">
    <div class="col-md-12">
        <div class="card" style="background-image: url('{{url('/img/jumbotron_courses.png')}}'); background-size: cover;">
            <div class="text-white text-center d-flex align-items-center py-5 px-4 my-5">
                <div class="col-5">
                    <img class="img-fluid" src="{{$course->pathAttachment()}}" alt="{{$course->name}}">
                </div>

                <div class="col-5 text-left">
                        <h1 style="font-size: 45px;">{{__("Courses")}} : {{$course->name}}</h1>
                        <h4 style="font-family: 'Muli', sans-serif;"> {{__("Teacher")}} : {{$course->teacher->user->name}}</h4>
                        <h4 style="font-family: 'Muli', sans-serif;"> {{__("Category")}} :<span class="badge badge-primary ml-3">{{$course->category->name}}</span></h4>
                        <h4 style="font-family: 'Muli', sans-serif;"> {{__("Creation date")}} : {{$course->created_at->format('d/m/Y')}}</h4>
                        <h4 style="font-family: 'Muli', sans-serif;"> {{__("Update date")}} : {{$course->updated_at->format('d/m/Y')}}</h4>
                        <h4 style="font-family: 'Muli', sans-serif;"> {{__("Registered students")}} : {{is_null($course->studentd_count)?'0': $course->studentd_count}}</h4>
                        <h4 style="font-family: 'Muli', sans-serif;"> {{__("Number of ratings")}} : {{is_null($course->reviews_count)?'0': $course->reviews_count }}</h4>
                        @include('partials.courses.rating')
                </div>
                @include('partials.courses.action_button')

            </div>
        </div>
    </div>

</div>