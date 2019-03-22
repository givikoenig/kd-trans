<template>
    <div class="container clearfix">
        <div class="carousel_wrap">
            <carousel
                    :autoplay="true"
                    :nav="false"
                    :dots="false"
                    :margin="20"
                    :responsive="{0:{items:1},576:{items:2},768:{items:3},992:{items:4} }"
            >
                <div v-for="partner in partners_data" class="block-services block-clients">
                    <div class="block-services__description logo_block">
                        <a :href="partner.url" target="_blank"><img :src="partner.img" alt=""></a>
                    </div>
                </div>
            </carousel>
        </div>
    </div>
</template>

<script>
    import carousel from 'vue-owl-carousel'

    export default {
        props: [
            'partners_data'
        ],
        components: {carousel},
    }
</script>

<style scoped>
    .carousel_wrap {
        height: 250px;
        padding-top: 38px;
        padding-bottom: 34px;
    }
</style>