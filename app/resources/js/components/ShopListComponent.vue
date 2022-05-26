<template>
    <div class="container">

        <div class="row">
            <div class="col-2">
                FILTER PRODUCTS
            </div>
            <div class="col-10">
                <div class="row">
                    <div class="container pt-2">
                        <div class="float-right">
                            <select v-model="filter_param" @change="sortBy($event)" id="filter">
                                <option value="">Sort by</option>
                                <option value="price">Price</option>
                                <option value="date">Date</option>
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-4"  v-for="(product , index ) in products.data" :key="index">
                            <div class="shop__thumb">
                                <a href="#">
                                    <div class="shop-thumb__img m-3">
                                        <img :src="imagePath(product.images)" @mouseover="changeImage(product.images , $event)" @mouseleave="imagePath(product.images , 0)"   class="img-responsive" >
                                    </div>
                                    <h5 class="shop-thumb__title">
                                        {{ product.name }}
                                    </h5>
                                    <div class="shop-thumb__price">
                                        <span class="shop-thumb-price_new">{{ product.price }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
    export default {
        name: 'ShopListComponent',
        props:['products'],
        data:() => {
            return{
                filter_param : ""
            }
        },

        methods:{
            imagePath(data , index = 0){
                return data[index].path;
            },
            changeImage(data , $event){
                $event.target.src =  this.imagePath(data , Math.floor( Math.random() * data.length));
            },
            sortBy(data){
                this.filter_param  = data.target.value;
                axios.get('/api/products?orderBy='+ this.filter_param )
            }

        }


    }
</script>

<style scoped lang="scss">

.shop-thumb__img {
    overflow: hidden;
    img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
}



</style>
