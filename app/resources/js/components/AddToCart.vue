<template>
    <div>
        <div class="btn-group m-4"  role="group" aria-label="Basic example">
            <span type="button" @click="minus" class="btn_act">-</span>
            <input type="number" style="height: 40px; ; width: 40px;" :value="count" >
            <span type="button" @click="plus"  class="btn_act">+</span>
        </div>

        <div class="btn btn-primary br20" @click="addToCart">
            ADD TO CART
        </div>
    </div>
</template>

<script>
export default {
    name: "AddToCart",
    props: ['max' , 'product' ],
    data:() => {
        return{
            count: 0
        }
    },
    methods:{
        plus(){
            if(this.count <= this.max) {
                this.count++;
            }
        },
        minus(){
            if(this.count !== 0) {
                this.count--;
            }
        },
        async addToCart(){
            if(this.count > 0) {
                var cookie_rand;
                if (!$cookies.isKey('shop_session')) {
                    cookie_rand = Math.random().toString(36).substring(2, 7)
                    $cookies.set('shop_session', cookie_rand, 60 * 60 * 24)
                } else {
                    cookie_rand = $cookies.get('shop_session');
                }
                const res = await axios.post('/api/cache/'+ cookie_rand, {
                    count: this.count,
                    product: this.product,
                })
                if(res.status === 200){
                    this.$root.products = res.data;
                }
            }
            this.$root.showSideBar = true;
        }
    }

}
</script>

<style scoped lang="scss">
.w-50{
    width: 50px;
}
.btn_act{
    padding: 7px;
    text-align: center;
    width: 30px;
    height: 40px;
    border: solid grey 1px;
}

input[type="number"] {
    -webkit-appearance: textfield;
    -moz-appearance: textfield;
    appearance: textfield;
}
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
}
.br20{
    height: 40px;
    border-radius:20px;
}


</style>
