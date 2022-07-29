<template>
    <div>
        <div class="container">
            <div class="back-prev-page">
                <a href="/">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    <span>Back</span>
                </a>
            </div>
            <div class="carousel-content">
                <div class="carousel">
                    <carousel
                        :nav="true"
                        :items="2"
                        :autoHeight="true"
                        :center="true"
                    >
                        <div style="margin-right: 30px" v-for="(item) in modelCars.attachments" :key="item.id">
                            <img :src="'/uploads/'+item.image">
                        </div>
                    </carousel>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import carousel from 'vue-owl-carousel'

export default {
    name: "Car Model",
    components: { carousel },
    props: {
        modelCars: '',
    },
}
</script>

<style scoped>
.carousel-content {
    display: flex;
    justify-content: center;
}
    .carousel {
        width: 50%;
    }
    .carousel img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
   .back-prev-page {
       margin-top: 20px;
   }
    .back-prev-page a {
        font-size: 18px;
        text-decoration: none;
        color: #000000;
    }
</style>
