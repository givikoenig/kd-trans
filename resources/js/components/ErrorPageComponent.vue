<template>
    <div class="section_mod-c">
        <div class="container clearfix">
            <section class="block-404">
                <h2 class="block-404__title ui-title-block">
                    <span class="ui-title-emphasis">{{errordata.error_404}}</span>
                    {{errordata.comment_404}}
                </h2>
                <div class="decor-1">
                    <i class="icon fa fa-exclamation-triangle "></i>
                </div>
                <div class="ui-subtitle-block ui-subtitle-block_mod-c">
                    {{errordata.description_404}}
                </div>
                <div class="text-center">
                    <a href="/" class="btn btn_mod-a btn-effect btn-back">
                        <span class="btn__inner">{{errordata.go_home}}</span>
                    </a>
                </div>
            </section>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['errordata']
    }
</script>

<style scoped>
    .btn-back {
        font-size: 14px;
        font-weight: 200;
        text-transform: uppercase;
    }
</style>