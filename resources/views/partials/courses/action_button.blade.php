<div class="col-2">
    @auth
        @can('opt_for_course',$course)
            @can('subscribe', \App\Course::class)
                <a href="{{route('subscription_plans')}}" class="btn btn-primary btn-block btn-lg">
                   <i class="fa fa-bolt" aria-hidden="true"></i> {{__("subscribe")}}
                </a>
            @else
               @can('inscribe',$course)
                <a href="" class="btn btn-primary btn-block btn-lg">
                   <i class="fa fa-bolt" aria-hidden="true"></i> {{__("register")}}
                </a>
               @else
                <a href="" class="btn btn-primary btn-block btn-lg">
                   <i class="fa fa-bolt" aria-hidden="true"></i> {{__("signed up")}}
                </a>
               @endcan
            @endcan
        @else
            <a href="" class="btn btn-primary btn-block btn-lg">
                <i class="fa fa-bolt" aria-hidden="true"></i> {{__("I am an author")}}
             </a>
        @endcan
    @else 
    {{-- <div class="alert alert-primary" role="alert">
        
        <p>
             <strong></strong>
        </p>
    </div>  --}}
    <a href="{{route('login')}}" class="btn btn-primary btn-block btn-lg">
        <i class="fa fa-user"></i>
        <strong>Log in</strong>
    </a>
    @endauth
</div>