<template>
        <stripe-checkout :form-id="form_id" button="SIGN UP" buttonClass="pricingTable-signup" 
        :stripe-key="stripe_key" :product="product">
        </stripe-checkout>
</template>

<script>
import { StripeCheckout } from 'vue-stripe'
export default {
    components: {
        'stripe-checkout': StripeCheckout
    },
    name:"stripe-form",
    props:{
        stripe_key:'',
        name:'',
        amount:'',
        description:'',
        form_id:''
    },
    computed: {
        product(){
            return {
                name:this.name,
                amount:parseFloat(this.amount),
                description:this.description,
            }
        },
        
    },
}
</script>