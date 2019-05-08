<div class="col-4">
    <div class="card">
        <div class="card-header"> {{__("socialite")}} </div>
        {{-- <img class="card-img-top" src="holder.js/100x180/" alt=""> --}}
        <div class="card-body">
            {{-- <h4 class="card-title">title</h4> --}}
            {{-- <p class="card-text">Text</p> --}}
            <a name="authGithub" class="btn btn-dark  btn-lg btn-block" href="{{route('social_auth',['driver' => 'github'])}}" >
                {{__("GitHub ")}} <i class="fab fa-github fa-lg"></i>
            </a>
            <a name="authFacebook" class="btn btn-primary btn-lg btn-block" href="{{route('social_auth',['driver' => 'facebook'])}}" >
                {{__("Facebook ")}} <i class="fab fa-facebook fa-lg"></i>
            </a>
        </div>
    </div>
</div>