<template>
    <div class="section_mod-c news-main">
        <div class="container clearfix">
            <div v-if="newslistdata" class="row vc_column_container">
                <div class="col-xs-12">
                    <div class="quote-box">
                        <div class="wrap-title-block wrap-title-block_mod-c">
                            <h2 class="ui-title-block">
                                <span class="ui-title-emphasis">{{ labelstxt.last_news }}</span>
                            </h2>
                            <div class="decor-1">
                                <i class="icon flaticon-newspaper color-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div v-for="item in newslistdata" class="block-services block-news">
                        <div class="block-services__description created">{{item.created_at}}</div>
                        <p></p>
                        <h3 class="block-services__title ui-title-inner" >{{ item.title }}</h3>
                        <div class="block-services__description block" v-html="item.text">
                        </div>
                        <div class="decor-3"></div>
                        <a :href="item.alias" class="block-services__link btn-link">{{item.btn}}</a>
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
            'newslistdata'
        ],
        data: () => ({})
    }
</script>

<style scoped>
    .block{
        font: 300 12px/1.714 Lato, Helvetica, Arial, sans-serif;
    }
</style>