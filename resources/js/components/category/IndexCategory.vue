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
        </div>

    </section>

</template>
<script>
export default {
    props:['categori'],
    data(){
        return{
            category: {
                name:null
            }
        }
    },
    mounted(){
        this.categori ? this.category = this.categori:''
    },
    methods:{
        async save(){

            let url= `/category/update/${this.category.id}`

            if(!this.categori){
                url='/category/store'
            }

            await axios.post(url, this.category).then(res=>{
                if(res.data.saved){
                    this.category ={
                        name: null
                    }
                    alert('Category saved')
                    window.location.href="/category"
                    // this.$parent.category.push(res.data.category)
                }else if(res.data.updated){
                    alert('Category updated')
                    window.location.href="/category"
                }
            })
        }
    }
}
</script>
