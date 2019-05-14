<div class="col-12 pt-0 mt-0">
        <h2 class="text-muted text-center">
            {{__("Requirements to take this course")}}
        </h2>
        <hr>
    </div>
    @forelse ($requirements as $requirement)
    <div class="col-6">
        <div class="card p-3">
            <div class="mb-0">
                {{$requirement->requirement}}
            </div>
        </div>
    </div>
        
    @empty
    <div class="alert alert-primary" role="alert">
        <i class="fa fa-info-circle" aria-hidden="true"></i>
        {{__("There is no requirement to take this course")}}
    </div>
        
    @endforelse