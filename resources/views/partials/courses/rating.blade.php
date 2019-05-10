<div>
    <ul class="list-inline">
        <li class="list-inline-item"> <i class="fa fa-star{{$course->rating >= 1 ? ' yellow' : ''}}" aria-hidden="true"></i></li>
        <li class="list-inline-item"> <i class="fa fa-star{{$course->rating >= 2 ? ' yellow' : ''}}" aria-hidden="true"></i></li>
        <li class="list-inline-item"> <i class="fa fa-star{{$course->rating >= 3 ? ' yellow' : ''}}" aria-hidden="true"></i></li>
        <li class="list-inline-item"> <i class="fa fa-star{{$course->rating >= 4 ? ' yellow' : ''}}" aria-hidden="true"></i></li>
        <li class="list-inline-item"> <i class="fa fa-star{{$course->rating >= 5 ? ' yellow' : ''}}" aria-hidden="true"></i></li>
    </ul>
</div>