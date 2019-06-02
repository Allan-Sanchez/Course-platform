@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron',['title'=>__("My subscriptions"),'icon'=>'list-ol'])
@endsection

@section('content')
    <div class="pl-5 pr-5">
        <div class="row justify-content-around">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__("Name")}}</th>
                        <th scope="col">{{__("Plan")}}</th>
                        <th scope="col">{{__("ID subscription")}}</th>
                        <th scope="col">{{__("Cantidad")}}</th>
                        <th scope="col">{{__("Alta")}}</th>
                        <th scope="col">{{__("Finalizada en")}}</th>
                        <th scope="col">{{__("Cancelar / Reanudar")}}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subscriptions as $subscription)
                        <tr>
                            <td>{{$subscription->id}}</td>
                            <td>{{$subscription->name}}</td>
                            <td>{{$subscription->stripe_plan}}</td>
                            <td>{{$subscription->stripe_id}}</td>
                            <td>{{$subscription->quantity}}</td>
                            <td>{{$subscription->created_at->format('d/m/Y')}}</td>
                            <td>{{$subscription->ends_at ? $subscription->ends_at->format('d/m/Y')
                                                         : __("Suscription active")}}</td>
                            <td>
                                @if ($subscription->ends_at)
                                <form action="{{route('subscription_resume')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="{{$subscription->name}}">
                                    <button type="button" class="btn btn-succes"> {{__("reanudar")}}<i class="fa fa-check ml-2"></i></button>
                                </form>
                                @else
                                <form action="{{route('subscription_cancel')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="{{$subscription->name}}">
                                    <button type="button" class="btn btn-danger"> {{__("cancelar")}}<i class="fa fa-times ml-2"></i></button>                                    
                                </form>
                                
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th class="text-center" colspan="8">{{__("No hay ninguna suscripcion disponible")}}</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection