<template>
    <div class="section_mod-c news-main">
        <div class="container clearfix">
            <div v-if="testimonialsdata.length" class="row vc_column_container">
                <div class="col-xs-12">
                    <div class="quote-box">
                        <div class="wrap-title-block wrap-title-block_mod-c">
                            <h2 class="ui-title-block">
                                <span class="ui-title-emphasis">{{ labelstxt.testimonials }}</span>
                            </h2>
                            <div class="decor-1">
                                <i class="icon flaticon-newspaper color-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div v-for="item in testimonialsdata" class="block-services block-testimonials">
                        <div class="block-services__description created">{{item.created_at}}</div>
                        <p></p>
                        <h3 class="block-services__title block-review" >{{ item.name }}</h3>
                        <h5 class="block-services__title block-review" >{{ item.rank }}</h5>
                        <div class="block-services__description block" v-html="item.text">
                        </div>
                        <div class="decor-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'labelstxt',
            'testimonialsdata'
        ],
        data: () => ({})
    }
</script>

<style scoped>
    .block{
        font: 300 12px/1.714 Lato, Helvetica, Arial, sans-serif;
    }
</style>