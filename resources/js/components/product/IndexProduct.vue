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
                            <input type="file"  class="form-control" @change="select_file">
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
    props:['categories','produc'],
    data(){
        return{
            product:{
                name: '',
                description: '',
                image_name: '',
                price: '',
                sale_price: '',
                categories_id: ''
            }
        }

    },
    mounted(){
        this.produc ? this.product = this.produc:''
    },
    methods:{

        select_file(event){
            this.avatar = event.target.files[0]
            this.product.image_name = URL.createObjectURL(this.avatar)
        },

        save(){

            // pass image_name
            let product = new FormData();

            // for (let key in product) {
            //     product.append(key, this.product[key]);
            // }
            product.append('name', this.product.name)
            product.append('description', this.product.description)
            product.append('price', this.product.price)
            product.append('sale_price', this.product.sale_price)
            product.append('categories_id', this.product.categories_id)

            if(this.avatar){
                product.append('image', this.avatar, this.avatar.name);
            }


            let url='/items/store'
            if(this.produc){
                url=`/items/update/${this.product.id}`
            }


             axios.post(url, product).then(res => {
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
