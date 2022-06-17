<template>
    <div >
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn btn-warning btn-sm" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cart {{itemCount}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/checkout">Checkout</a>
                <a class="dropdown-item" href="/cerrar">Log out</a>
            </div>
        </li>
    </div>
</template>

<script>

    export default {
        data(){
            return {
                itemCount: '',
            }
        },
        mounted() {
            this.$root.$on('ChangeInCar', (item) => {
                this.itemCount = item;
            })
        },
        methods:{
            async getCarItemsOnPageLoad(){
                let response = await axios.post('/cart');
                this.itemCount = response.data.items
            }
        },
        created(){
            this.getCarItemsOnPageLoad();
        }
    }

</script>
