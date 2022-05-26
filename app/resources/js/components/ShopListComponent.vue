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
                                <option value="price">Price</option>
                                <option value="updated_at">Date</option>
                                <option value="code">Code</option>
                                <option value="discount_id">Discount</option>
                                <option value="available_count">Available Count</option>
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-4 mb-5"  v-for="(product , index ) in products.data" :key="index">
                            <div class="shop__thumb">

                                <a :href="'product/' +product.slug" class="text-decoration-none">
                                    <div class="shop-thumb__img m-3">
                                        <div v-if="product.discount && product.discount.position === 0" style="position: absolute;margin:10px ">
                                            <div :style="'background-color:'+ product.discount.color + ';padding:5px; color:#fff;' ">
                                                <b>{{ product.discount.procent}}%</b>
                                            </div>
                                        </div>
                                        <div v-if="product.discount && product.discount.position === 1" style="position: absolute;margin:10px ">
                                            <div :style="'background-color:'+ product.discount.color + ';padding:5px; color:#fff;' ">
                                                <b>{{ product.discount.message || product.discount.procent + '%'}}</b>
                                            </div>
                                        </div>
                                        <img :src="imagePath(product.images)" @mouseover="changeImage(product.images , $event)" @mouseleave="imagePath(product.images , 0)"   class="img-responsive" >
                                    </div>
                                    <h5 class="shop-thumb__title">
                                          {{ product.name }}
                                    </h5>
                                    <div class="shop-thumb__price">
                                        <span  v-if="product.discount">  <del>{{ product.price }}$</del>
                                      {{ product.price_with_discount }}$
                                             <span v-if="product.discount.message && product.discount.position === 2"
                                                   :style="'background-color:'+ product.discount.color + ';padding:5px; color:#fff;' ">
                                                {{ product.discount.message }}
                                            </span>
                                        </span>
                                        <span v-else>{{ product.price }}$</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li v-for="(r , index) in Array.from({length: products.last_page}, (v, k) => k+1)" :key="index" class="page-item" :class="{ 'active' :products.current_page === r}" >
                    <a class="page-link"  @click="goTo(r)">{{ r }}</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import axios from 'axios'
    export default {
        name: 'ShopListComponent',
        data:() => {
            return{
                products : {},
                page : 1,
                filter_param : "updated_at"
            }
        },
        created() {
          this.loadData();
        },
        methods:{
            loadData(){
                axios.get('/api/products?orderBy=' + this.filter_param
                    + '&page='+ this.page
                ).then(res=>{
                    if(res.status===200){
                        this.products =res.data;
                    }
                }).catch(err=>{
                    console.log(err)
                });
            },
            imagePath(data , index = 0){
                return data[index].path;
            },
            changeImage(data , $event){
                $event.target.src =  this.imagePath(data , Math.floor( Math.random() * data.length));
            },
            sortBy(data){
                this.page = 1;
                this.filter_param  = data.target.value;
                this.loadData();
            },
            goTo(page){
                this.page = page;
                this.loadData();
                scroll(0 , 0);
            }
        }


    }
</script>

<style scoped lang="scss">
.shop__thumb {
    text-decoration: none;
    color: #1a202c;
    .shop-thumb__img {
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }
    .shop-thumb__title, .shop-thumb__price {
        text-decoration: none;
        color: #1a202c;
        margin-left: 1rem;
    }
}


</style>
