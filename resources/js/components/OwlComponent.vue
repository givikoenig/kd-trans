<template>
    <div class="container">
        <carousel
                :autoplay="true"
                :nav="false"
                :dots="false"
                :margin="20"
                :responsive="{0:{items:1},768:{items:2},992:{items:3} }"
        >
            <div v-for="service in servicesdata" class="block-services">
                <h3 class="block-services__title ui-title-inner" >{{ service.title }}</h3>
                <div class="block-services__description block index_page">
                    {{ service.text }}
                </div>
                <div class="decor-3"></div>
                <a :href="service.lnk" class="block-services__link btn-link">{{ service.btn }}</a>
            </div>
        </carousel>
    </div>
</template>

<script>
    import carousel from 'vue-owl-carousel'
    export default {
        props: [
            'servicesdata'
        ],
        components: {carousel}
    }
</script>

<style scoped>
    .block {
        font: 400 14px/1.714 Lato, Helvetica, Arial, sans-serif;
        color: #777;
    }
</style>