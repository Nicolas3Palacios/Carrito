<template>
    <section>
        <index-category> </index-category>
        <div>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody >

                    <tr v-for="(category, index) in categories" :key="index">
                        <td>{{category.name}}</td>
                        <td class="btn-group btn-group-toggle" data-toggle="buttons">
                            <a :href="`/category/edit/${category.name}`" class="btn btn-secondary btn-m">Edit</a>

                            <a href="#"  class="btn btn-danger btn-m" @click="deleteCategory(category)">Delete</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </section>
</template>

<script>

export default {
    props:['categories'],

    data(){
        return{
            category:{

            }
        }
    },

    methods:{

         deleteCategory(category){
                 axios.post(`/category/delete/${category.id}`).then(res =>{
                    if(res.data.deleted){
                        alert('Category deleted')
                        window.location.href="/category"

                    }
                })
            }
    }
}

</script>
