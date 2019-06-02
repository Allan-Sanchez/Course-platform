<li> <a href="#" class="nav-link"> {{__("My Profile")}}</a></li>
<li> <a href="{{route('subscription_admin')}}" class="nav-link"> {{__("My Subscriptions")}} </a></li>
<li> <a href="{{route('invoice-admin')}}" class="nav-link"> {{__("My Bills")}} </a></li>
<li> <a href="#" class="nav-link"> {{__("My Courses")}}</a></li>
<li> <a href="#" class="nav-link"> {{__("Courses Developed by Me")}} </a></li>
<li> <a href="#" class="nav-link"> {{__("Create Course")}} </a></li>

@include('partials.navigations.logged')