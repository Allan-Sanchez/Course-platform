<div class="col-12 pt-0 mt-0">
    <h2 class="text-muted text-center">
        {{__("Course Goals")}}
    </h2>
    <hr>
</div>
@forelse ($goals as $goal)
<div class="col-6">
    <div class="card p-3">
        <div class="mb-0">
            {{$goal->goal}}
        </div>
    </div>
</div>
    
@empty
<div class="alert alert-primary" role="alert">
    <i class="fa fa-info-circle" aria-hidden="true"></i>
    {{__("No goals have been written for this course")}}
</div>
    
@endforelse