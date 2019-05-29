@extends('layouts.app')

@section('jumbotron')
@include('partials.jumbotron',[
'icon' => 'globe',
'title' => __("Subscribe now to one of our plans.")
])
@endsection

@section('content')
<div class="container">
    <div class="row flex justify-content-center">

        <div class="col-md-3 col-sm-6">
            <div class="pricingTable9" style="border: 1px solid #78a6ce;">
                <div class="pricingTable-header">
                    <span class="price-value">{{__(":preci",['preci'=>'9.99'])}}<span class="currency">$</span></span>
                    <h3 class="title">{{__("Monthly")}}</h3>
                </div>
                <ul class="pricing-content">
                    <li>{{__("Access to all courses.")}}</li>
                    <li>{{__("Access to all records.")}}</li>
                    <li>{{__("Access to free content.")}}</li>
                    <li>{{__("Bug support")}}</li>
                </ul>
                @include('partials.stripe.form',[
                    'product'=>[
                        'name'=>'Subscription',
                        'description'=>'Monthly',
                        'type'=>'monthly',
                        'amount'=> 999,99
                    ]
                ])
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="pricingTable9 green" style="border: 1px solid #18a288;">
                <div class="pricingTable-header">
                    <span class="price-value">{{__(":preci",['preci'=>'20'])}}<span class="currency">$</span></span>
                    <h3 class="title">{{__("Quarterly")}}</h3>
                </div>
                <ul class="pricing-content">
                    <li>{{__("Access to all courses.")}}</li>
                    <li>{{__("Access to all records.")}}</li>
                    <li>{{__("Access to free content.")}}</li>
                    <li>{{__("Bug support")}}</li>
                </ul>
                @include('partials.stripe.form',[
                    'product'=>[
                        'name'=>'Suscripcion Trimestral',
                        'description'=>'quarterly',
                        'type'=>'quarterly',
                        // 'type'=>'monthly',
                        'amount'=> 1999
                    ],
                ])
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="pricingTable9 purple" style="border: 1px solid #b14468;">
                <div class="pricingTable-header">
                    <span class="price-value">{{__(":preci",['preci'=>'90'])}}<span class="currency">$</span></span>
                    <h3 class="title">{{__("Yearly")}}</h3>
                </div>
                <ul class="pricing-content">
                    <li>{{__("Access to all courses.")}}</li>
                    <li>{{__("Access to all records.")}}</li>
                    <li>{{__("Access to free content.")}}</li>
                    <li>{{__("Bug support")}}</li>
                </ul>
                @include('partials.stripe.form',[
                    'product'=>[
                        'name'=>'Suscripcion Anual',
                        'description'=>'yearly',
                        'type'=>'yearly',
                        'amount'=> 8999
                    ],
                ])
            </div>
        </div>
    </div>
</div>

@endsection