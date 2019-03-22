<template>
    <div class="section-title section-title2 parallax-bg parallax-light">
        <ul class="bg-slideshow">
            <li>
                <div class="bg-slide">
                    <parallax :speedFactor="0.3">
                        <img :src="img" alt="">
                    </parallax>
                </div>
            </li>
        </ul>
        <div class="section__default">
            <div class="section__inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="text-center">
                                <i class="list-progress__title-icon fa fa-truck"></i>
                                <h2 class="ui-title-block ui-title-block_mod_color">{{countertitle.title}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1 mt-5">
                            <div class="row">
                                <div v-for="item in counterdata" class="col-md-3 col-sm-6 col-xs-12 text-center">
                                    <div id="counter">
                                        <h1 class="list-progress__percent chart timer count-title count-number" :data-to="item.num">0</h1>
                                        <div class="decor-3 decor-3_mod-a"></div>
                                        <span class="list-progress__name">{{item.txt}}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
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
        props: [
            'countertitle',
            'counterdata'
        ],
        data: () => ({
            img: '/assets/images/pages/bg3.jpg'
        })
    }
</script>

<style scoped>

</style>