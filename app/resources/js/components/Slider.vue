<template>
    <div >
    <div class="main-image">
        <a href="#" class="slider-arrow-prev big" v-if="images.length >1"
           @click.prevent="slidePrev('sliderBig')">
            <i class="fas fa-chevron-left"></i></a>
        <a href="#" class="slider-arrow-next big" v-if="images.length >1"
           @click.prevent="slideNext('sliderBig')">
            <i class="fas fa-chevron-right"></i></a>
        <VueSlickCarousel v-bind="sliderBigSettings" class="main-slider"
                          ref="sliderBig" v-if="images.length">
            <img :src="image.path" :alt="image.name"
                 class='img-vertical'
                 v-for="(image, idx) in images" :key="idx"
                 loading="lazy">
        </VueSlickCarousel>
    </div>

    <div class="preview row">
        <!--            PREVIEW SLIDER-->
        <div class="preview__images col-12">
            <a href="#" class="slider-arrow-prev thumb" v-if="images.length >1"
               @click.prevent="slidePrev('sliderThumb')"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="slider-arrow-next thumb" v-if="images.length >1"
               @click.prevent="slideNext('sliderThumb')"><i class="fas fa-chevron-right"></i></a>
            <VueSlickCarousel v-bind="sliderPreviewSettings" ref="sliderThumb" v-if="images.length">
                <div class="preview__images__item" :class="{'active' : idx === activeImage}"
                     v-for="(image, idx) in images" :key="idx"
                     @click.prevent="sliderGoTo(idx)">
                    <div class="preview__image__wrapper">
                        <img :src="image.path" :alt="image.seo"
                              class="img-vertical"
                             loading="lazy">
                    </div>
                </div>
            </VueSlickCarousel>
        </div>
    </div>
    </div>
</template>
<script>
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
export default {
    props : ['images'],
    name: "Slider",
    components: {VueSlickCarousel},
    data() {
        return {
            activeImage: 0,
            sliderBigSettings: {
                "arrows": true,
                "edgeFriction": 0.35,
                "infinite": true,
                "speed": 500,
                "slidesToShow": 1,
                "slidesToScroll": 1
            },
            sliderPreviewSettings: {
                "centerMode": true,
                "infinite": true,
                "slidesToShow": 3,
                "speed": 500,
                "arrows": false
            },
        }
    },
    methods: {
        slideNext(val) {
            if (val === 'sliderBig') {
                this.activeImage++
                if (this.activeImage > this.images.length - 1) {
                    this.activeImage = 0
                }
                this.$refs.sliderThumb.goTo(this.activeImage)
            }
            this.$refs[val].next();

        },
        slidePrev(val) {
            if (val === 'sliderBig') {
                this.activeImage--
                if (this.activeImage < 0) {
                    this.activeImage = this.images.length - 1
                }
                this.$refs.sliderThumb.goTo(this.activeImage)
            }
            this.$refs[val].prev();
        },
        sliderGoTo(idx) {
            this.activeImage = idx
            this.$refs.sliderBig.goTo(idx)
        }
    }

}
</script>

<style scoped lang="scss">

$secondary-color: white;
$logo-green: white;

.over-image-panel {
    width: 100%;
    height: 45px;
    background-color: $secondary-color;
    margin: 0;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    color: #000000;
    font-size: 12px;
}

.main-image {
    max-height: 700px;
    position: relative;
    width: 100%;
    overflow: hidden;
    text-align: center;
}

.preview, .preview__other, .copy-link {
    display: flex;
    justify-content: space-between;
    width: 100%;
}

.copy-link button {
    margin-left: 5px;
}

.preview {
    margin: 0;
    margin-top: 5px;
}

.preview__images {
    padding-left: 0;
    padding-right: 0;
}

.preview__other {
    padding-right: 0;
}


@media (max-width: 1200px) {
    .preview__other, {
        justify-content: center;
        margin-top: 15px;
    }
}

.preview {
    width: 100%;
}

.preview__images__item {
    width: 150px !important;
    height: 76px;
    margin-right: 5px;
    cursor: pointer;
    padding: 3px;
    overflow: hidden;
    border: 1px solid #b5dfff;
    transition: all 0.3s;
    opacity: 0.8;
}

.preview__image__wrapper {
    overflow: hidden;
    height: 100%;
}

.preview__images__item:hover {
    opacity: 1;
    border: 1px solid $logo-green;
}

.preview__images__item.active {
    border: 2px solid $logo-green;
    opacity: 1;
}

.preview__other__item {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 74px;
    height: 74px;
    border: 1px solid $secondary-color;
    border-radius: 10px;
    overflow: hidden;
    margin-left: 5px;

}

.preview__other__item__name {
    position: absolute;
    font-size: 10px;
    font-weight: bolder;
    bottom: 2px;
    color: $secondary-color;
}

.preview__other__item img {
    position: relative;
    width: 70%;
    height: auto;
    top: -5px;
}
.img-vertical{
    width: auto !important;
    height: 100% !important;
    margin: 0 auto;
}

</style>
