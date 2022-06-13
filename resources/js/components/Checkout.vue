<template>

    <div>
        <div class="container checkotBox">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                    <div class="box">
                        <h3 class="box-title">Products In Your Car</h3>
                        <div class="plan-selection" v-for="item in items" :key="item.id">
                            <div class="plan-data" v-if="item.name">
                                    <input id="question1" name="question" type="radio" class="with-font" value="sel" />
                                    <label for="question1">{{item.name}}</label>
                                    <p class="plan-text">
                                    Quantity: {{item.quantity}}</p>
                                    <span class="plan-price">Price: ${{item.sale_price}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">

                    <div class="widget">
                        <h4 class="widget-title">Order Summary</h4>
                        <div class="summary-block" v-for="summaryItem in items" :key="summaryItem.id">
                            <div class="summary-content" v-if="summaryItem.name">
                                <div class="summary-head"><h5 class="summary-title">{{summaryItem.name}}</h5></div>
                                <div class="summary-price">
                                    <p class="summary-text">
                                     ${{summaryItem.total}}
                                    </p>
                                    <span class="summary-small-text pull-right">Q: {{summaryItem.quantity}} x
                                    P: ${{summaryItem.sale_price}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="summary-block">
                            <div class="summary-content">
                            <div class="summary-head"> <h5 class="summary-title">Total</h5></div>
                                <div class="summary-price">
                                    <p class="summary-text">${{items.totalAmount}}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</template>
<script>
export default {
    data(){
        return{
            items: [],
            firstName:'',
            lastName:'',
            address:'',
            city:'',
            state:'',
            zipCode:'',
            phone:'',
            email:'',
            county:'',
            cardType:'',
            expirationMonth:'',
            expirationYear:'',
            cvv:'',
            cardNumber:'',
        }
    },
    methods:{
        async getCarItems(){

             let response = await axios.get('/checkout/get/items');
             this.items = response.data;

            console.log(this.items);
        },
        async getUserAddress(){
            if(this.firstName != '' && this.address != '' && this.carNumber != '' && this.cvv != '')
            {
                //Proceso de pago
                let response = await axios.post('/process/user/payment',{
                    'firstName':this.firstName,
                    'lastName':this.lastName,
                    'address':this.address,
                    'city':this.city,
                    'state':this.state,
                    'zipCode':this.zipCode,
                    'phone':this.phone,
                    'email':this.email,
                    'county':this.county,
                    'cardType':this.cardType,
                    'expirationMonth':this.expirationMonth,
                    'expirationYear':this.expirationYear,
                    'cvv':this.cvv,
                    'cardNumber':this.cardNumber,
                });
                console.log(response.data);

            }else{
                    this.$toastr.e('User info incomplete');
            }
        }
    },
    created(){
        this.getCarItems();
    }


}

</script>
