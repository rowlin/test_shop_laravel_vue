<template>
    <div>
        <button type="button" class="btn btn-primary me-2 br20" @click="$root.showSideBar = true">Cart {{ total_price }} $</button>
    </div>
</template>

<script>
import countPrice from "../mixins/countPrice";
import Store from './../store'
export default {
    name: "CartButton",
    mixins:['countPrice'],
    async created() {
        if($cookies.isKey('shop_session')){
           const res = await axios.get('/api/cache/'+ $cookies.get('shop_session'))
           if(res.status == 200){
               this.$root.products = res.data;
           }
        }
    },
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
        }
    }
}
</script>

<style scoped>

</style>
