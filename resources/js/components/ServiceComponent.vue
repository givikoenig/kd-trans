<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="art_wrapper">
                    <p></p>
                    <div class="example3">
                        <p>
                            <img :src="servicedata.img" alt="" class="example_beauty">
                        </p>
                        <div class="example_text">
                            <p class="example_text_p">{{servicedata.title}}</p>
                            <p class="example_text_p2" v-html="servicedata.text"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 wpb_column vc_column_container vc_col-sm-8">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper ">
                        <p></p>
                        <h2 class="text-center">{{ servicedata.ttl }}</h2>
                        <img :src="servicedata.image" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</template>

<script>

    export default {
        props: [
            'servicedata'
        ]
    }
</script>

<style scoped>
    .example_beauty {
        max-width: 100%;
    }
    .art_wrapper {
        margin-bottom: 10px;
    }
    .example_text_p2{
        color: #fff;
    }
</style>