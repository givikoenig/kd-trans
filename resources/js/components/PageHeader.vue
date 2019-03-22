<template>
    <div class="section-title parallax-bg parallax-light">
        <ul class="bg-slideshow">
            <li>
                <div class="bg-slide">
                    <parallax :speedFactor="0.5">
                        <img :src="img" alt="">
                    </parallax>
                </div>
            </li>
        </ul>
        <div class="section__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="ui-title-page">{{ pagetitle.title }}</h1>
                        <div class="decor-2 decor-2_mod-a decor-2_mod_white"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Parallax from 'vue-parallaxy'

    export default {
        components: {
            Parallax
        },
        props: ['pagetitle'],
        data: () => ({
            img: '/assets/images/pages/1-2-2.jpg'
        })
    }
</script>

<style scoped>

</style>