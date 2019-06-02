@extends('layouts.app')


@section('jumbotron')
    @include('partials.jumbotron',['title'=>__("My bills"),'icon'=>'archive'])
@endsection

@section('content')
    <div class="pl-5 pr-5">
        <div class="row justify-content-center">
            <table class="table table-striped table-dark">
                <thead >
                    <tr>
                        <th scope="col">{{__("Registration date")}}</th>
                        <th scope="col">{{__("Registration cost")}}</th>
                        <th scope="col">{{__("Cupon")}}</th>
                        <th scope="col">{{__("Download invoice")}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($invoices as $invoice)
                            <tr>
                                <td>{{$invoice->date()->format('d/m/Y')}}</td>
                                <td>{{$invoice->total()}}</td>
                                @if ($invoice->hasDiscount)
                                    <td>{{__("Coupon")}} : ({{$invoice->coupon()}}/ {{$invoice->discount()}})</td>
                                @else
                                    <td>{{__("No se a ocupado ningun cupon")}}</td>
                                @endif
                                <td>
                                    <a href="{{route('invoice-download',['id'=> $invoice->id])}}" class="btn btn-info">{{__("Download")}} <i class="fa fa-download" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="4" class="text-center">{{__("There is no invoice available")}}</th>
                            </tr>
                        @endforelse
                    </tbody>
            </table>
        </div>
    </div>
@endsection