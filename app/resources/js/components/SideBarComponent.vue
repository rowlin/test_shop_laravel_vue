<template>
<div id="sidebar">
<div class="top">
        <div class="p-2">CART</div>
        <div class="p-2">X</div>
</div>
<!--<div v-for="(p  ,  index) in products" class="row" :key="index">
    <div class="col-3">{{ index}}</div>
    <div class="col-3">{{ p.name}}</div>
    <div class="col-3"></div>
    <div class="col-3"> {{ p.price_with_discount  }} <i>del</i></div>
</div>-->

    <button @click="getCache"> click  me </button>


    <button @click="flush"> flush </button>


    <pre>
        {{ this.products }}
    </pre>


</div>
</template>

<script>

export default {
    name: "SideBarComponent",

    async created() {

        if($cookies.isKey('shop_session')){
          this.products  = await axios.get('/api/cache/'+ $cookies.get('shop_session'))
        }

        console.log("here");

    },
    data(){
        return {
            products : {}
        }

    },
    methods:{
       async getCache(){
            if($cookies.isKey('shop_session')){
                this.products  = await axios.get('/api/cache/'+ $cookies.get('shop_session'))
            }
        },
       async  flush(){
            if($cookies.isKey('shop_session')){
                await axios.delete('/api/cache/'+ $cookies.get('shop_session'))
                this.products  = await axios.get('/api/cache/'+ $cookies.get('shop_session'))
            }
        }

    }
}
</script>

<style scoped lang="scss">
.top{
    display: flex;
    justify-content: space-between;
}



#sidebar {
    height: 100%;
    overflow: auto;
    position: fixed;
    background-color: #f5f5f5;
    top:0px;
    right: 0px; /* Position them outside of the screen */
    width: 400px;
    padding: 15px; /* 15px padding */
    text-decoration: none; /* Remove underline */
    font-size: 20px; /* Increase font size */
}


</style>
