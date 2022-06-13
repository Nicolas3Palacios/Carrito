<template>
<div class="mt-35">
    <h3>Product</h3>
    <form @submit.prevent="save">
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
                <select class="form-select" v-model="product.category_name" >
                <option value=""></option>
                <option v-for="(category, index) in categories" :key="index" :value="category.name">{{category.name}}</option>
                </select>
            </div>
                <div class="form-group">
                    <label for="phone_number" class="form-label">Image</label>
                    <input type="file" class="form-control" @change="select_file">
                </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary mt-2">Save</button>
            </div>

        </form>
</div>

</template>
<script>

export default {
    name:'Form',
    props:['products','categories'],
    data(){
        return{
            product:{
                name: null,
                description: null,
                image_name: null,
                price: null,
                sale_price: null,
                category_name: null
            }
        }

    },
    methods:{
        select_file(event){
            this.product.image_name = event.target.files[0];
        },
        async save(){
            let url='/items/store';
            // pass image_name
            let product = new FormData();
            for (let key in this.product) {
                product.append(key, this.product[key])

            }

            // if(!this.person.create){
            //     url=`/home/update/${this.person.id}`
            // }
            // await axios.post(url, this.products).then(res => {

            await axios.post(url, product).then(res => {
                if(res.data.saved){
                    this.product = {
                        name: null,
                        description: null,
                        image_name: null,
                        price: null,
                        sale_price: null,
                        category_name: null
                    }
                    alert('Product saved')
                }
            })
        }
    }
}

</script>
