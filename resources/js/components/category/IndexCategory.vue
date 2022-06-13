<template>

    <section>
        <div class="mt-35">
            <h3>Category</h3>
            <div>
                <form @submit.prevent="save">
                    <div class="form-group">
                        <label for="name" class="form-lable">Name</label>
                        <input type="text" class="form-control" v-model="category.name">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                    </div>
                </form>
            </div>
            <!-- <form @submit.prevent="save">
                <div class="form-group">
                    <label for="title" class="form-label">Name</label>
                    <input type="text"  class="form-control" v-model="category.name">
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary mt-2">Save</button>
                </div>

            </form> -->
        </div>
    </section>

</template>
<script>
export default {

    data(){
        return{
            category:{
                
            }
        }
    },

    methods:{
        async save(){
            await axios.post('/category/store', this.category).then(res=>{
                if(res.data.saved){
                    this.category ={
                        name: null
                    }
                    alert('Category saved')
                }
            })
        }
    }
}
</script>
