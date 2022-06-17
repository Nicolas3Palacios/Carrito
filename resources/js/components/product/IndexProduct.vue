<template>
<section>

        <div class="mt-35">
            <h3>Product</h3>
            <form @submit.prevent="save" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title" class="form-label">Name</label>
                        <input type="text"  class="form-control" v-model="product.name">
                    </div>
                    <div class="form-group">
                        <label for="age" class="form-label">Description</label>
                        <input type="text" class="form-control" v-model="product.description">
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Price</label>
                        <input type="number" class="form-control" v-model="product.price">
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Sale Price</label>
                        <input type="number" class="form-control" v-model="product.sale_price">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-select" v-model="product.categories_id" >
                        <option value=""></option>
                        <option v-for="(category, index) in categories" :key="index" :value="category.id">{{category.name}}</option>
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="phone_number" class="form-label">Image</label>
                            <input type="file"  class="form-control" v-on:change="select_file">
                        </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                    </div>

                </form>
        </div>
</section>

</template>

<script>

export default {
    name:'Form',
    props:['categories','productz'],
    data(){
        return{
            product:{
                name: null,
                description: null,
                image_name: null,
                price: null,
                sale_price: null,
                categories_id: null
            }
        }

    },
    // mounted(){
    //     this.productz ? this.product = this.product:''
    // },
    methods:{

        select_file(event){
            this.avatar = event.target.files[0]
            this.product.image_name = URL.createObjectURL(this.avatar)
        },

        save(){

            // pass image_name
            let product = new FormData();
            for (let key in product) {
                product.append(key, this.product[key])
            }

            let url='/items/store'
            if(!this.productz){
                url=`/items/update/${this.product.id}`
            }


            // if(!this.person.create){
            //     url=`/home/update/${this.person.id}`
            // }
            // await axios.post(url, this.products).then(res => {

            axios.post(url, this.product).then(res => {
                if(res.data.saved){
                    this.product = {
                        name: null,
                        description: null,
                        image_name: null,
                        price: null,
                        sale_price: null,
                        categories_id: null
                    }
                    alert('Product saved')
                    this.$parent.products.push(res.data.product)
                    window.location.href="/items"

                }else if(res.data.updated){
                    alert('Product updated')
                    window.location.href="/items"
                }
            })
        }
    }
}

</script>
