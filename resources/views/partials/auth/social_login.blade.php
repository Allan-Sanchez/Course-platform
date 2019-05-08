<div class="col-4">
    <div class="card">
        <div class="card-header"> {{__("socialite")}} </div>
        {{-- <img class="card-img-top" src="holder.js/100x180/" alt=""> --}}
        <div class="card-body">
            {{-- <h4 class="card-title">title</h4> --}}
            {{-- <p class="card-text">Text</p> --}}
            <a name="authGithub" class="btn btn-primary btn-block bgGithub" href="{{route('social_auth',['driver' => 'github'])}}" >
                {{__("GitHub")}} <i class="fas fa-git"></i>
            </a>
            <a name="authFacebook" class="btn btn-primary btn-block bgFacebook" href="{{route('social_auth',['driver' => 'facebook'])}}" >
                {{__("Facebook")}} <i class="fas fa-facebook"></i>
            </a>
        </div>
    </div>
</div>