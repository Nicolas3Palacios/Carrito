<template>
    <section>
        <div>
            <index-product :categories="categories"/>
        </div>
        <div>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Sale price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody >
                    <tr v-for="(product, index) in products" :key="index">
                        <td>{{product.name}}</td>
                        <td>{{product.description}}</td>
                        <td>{{product.price}}</td>
                        <td>{{product.sale_price}}</td>
                        <td class="btn-group btn-group-toggle" data-toggle="buttons">
                            <a :href="`/items/edit/${product.id}`" class="btn btn-secondary btn-m">Edit</a>

                            <a href="#"  class="btn btn-danger btn-m" @click="deleteProduct(product, index)">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>

<script>

export default {
    props:['categories','products'],
    data(){
        return{
            product:{

            }
        }
    },
    methods:{

        async deleteProduct(product, index){
                await axios.delete(`/items/delete/${product.id}`).then(res =>{
                    if(res.data.deleted){
                        alert('Product deleted')
                        window.location.href="/items"
                    }
                })
            }
    }
}

</script>
