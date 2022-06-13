<template>
    <div>
        <hr>
            <button class="btn btn-warning text-center"
                @click.prevent="addProductToCar()">
                Add To Car
            </button>
    </div>
</template>

<script>
    export default {
        data(){
            return{

            }
        },
        props:['productId', 'userId'],
        methods:{

            async addProductToCar(){

                // alert(this.productId);
                //Confirmar si el usuario ha iniciado secion

                if(this.userId == 0){
                    this.$toastr.e('You need to be logged, to add this product');
                    return;
                }
                //Si ha iniciado sesion agregar el producto

                let response = await axios.post('/cart',{
                    'product_id': this.productId
                });

                this.$root.$emit('ChangeInCar', response.data.items);


            }
        },
        mounted() {

        }
    }
</script>
