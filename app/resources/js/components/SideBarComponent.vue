<template>
<div id="sidebar" v-if="$root.showSideBar">
<div class="top">
        <div class="p-2">CART</div>
        <div class="p-2" @click="hide">X</div>
</div>
<div v-for="(p  ,  index) in $root.products" class="row p-2" :key="index">
    <div class="col-3">
        <img :src="p.first_image[0].path" :alt="p.first_image[0].seo" height="100" />
    </div>
    <div class="col-3 d-flex justify-content-center " style="align-items: center;" >
        <span style="font-size: 15px;">{{ p.name}}</span></div>
    <div class="col-3 d-flex justify-content-center " style="align-items: center;"  >
        <div class="btn-group"  role="group" aria-label="Basic example">
            <span  @click="minus(p.id , p.count)" class="btn_act">-</span>
            <input type="number" style=" width: 20px;" :value="p.count" >
            <span @click="plus(p.id , p.count)"  class="btn_act">+</span>
        </div>
    </div>
    <div class="col-2 d-flex" style="align-items: center;font-size: 16px;">
        <span class="p-2">{{ Number(p.price_total).toFixed(2) }}$</span>
    </div>
    <div class="col-1 d-flex" style="align-items: center">
        <img src="/img/delete.svg" style="height: 30px;cursor:pointer;" @click="deleteKey(p.id)" /></div>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <div >Total</div>
        <div> {{ total_price }} $</div>
    </div>

    <div class="d-flex mt-4">
        <div class="btn btn-primary br20 w-100" @click="alert('OK!')">CHECKOUT</div>
    </div>


</div>
</template>

<script>
import Store from './../store'
export default {
    name: "SideBarComponent",
    computed:{
        total_price(){
            var sum =0;
            if(this.$root.products) {
                Object.entries(this.$root.products).map(function (value) {
                        if (value[1]) {
                            sum += Number(value[1].price_total);
                        }
                    }
                );
            }
            return sum.toFixed(2);
        },
    },
    methods:{
        async deleteKey(id){
            const res = await axios.delete("/api/cache/" +$cookies.get('shop_session')+ "/" + id  );
            if(res.status === 200){
                this.$root.products = res.data;
            }
        },

       async plus(product_id , count){
              const res = await axios.post('/api/cache/'+ $cookies.get('shop_session') , { product : product_id , count: ++count });
              if(res.status === 200){
                  this.$root.products = res.data;
              }
        },
        async minus(product_id , count){
            const res = await axios.post('/api/cache/'+ $cookies.get('shop_session') , { product : product_id , count: --count });
            if(res.status === 200){
                this.$root.products = res.data;
            }
        },
        hide(){
            this.$root.showSideBar = false;
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
    z-index: 999;
    height: 100%;
    overflow: auto;
    position: fixed;
    background-color: #f5f5f5;
    top:0px;
    right: 0px; /* Position them outside of the screen */
    width: 500px;
    padding: 15px; /* 15px padding */
    text-decoration: none; /* Remove underline */
    font-size: 20px; /* Increase font size */
}
.btn_act{
    text-align: center;
    width: 30px;
    height: 35px;
}
input[type="number"] {
    -webkit-appearance: textfield;
    -moz-appearance: textfield;
    appearance: textfield;
    background-color: #f5f5f5;
    border: none;
}
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
}

</style>
