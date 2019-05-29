<form action="{{ route('subscription_processSuscription')}}" method="POST" >
    @csrf 
    <input type="text" class="form-control m-4" style="width:80%;" name="coupon" 
    placeholder="{{__("Do you have a coupon?")}}">

    <input type="hidden" name="type" value="{{$product['type']}}">

    {{-- <hr> --}}

    <stripe-form
        form_id={{$product['type']}}
        stripe_key="{{ env('STRIPE_KEY') }}"
        name="{{ $product['name'] }}"
        amount="{{ $product['amount'] }}"
        description="{{ $product['description'] }}"
    ></stripe-form>

</form>