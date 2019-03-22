<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="art_wrapper article-content">
                    <p></p>
                    <div class="example3">
                        <p>
                            <img :src="articledata.img" alt="" class="example_beauty">
                        </p>
                        <div class="example_text">
                            <p class="example_text_p">{{articledata.title}}</p>
                            <p class="example_text_p2" v-html="articledata.text"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'articledata'
        ]
    }
</script>

<style scoped>
    .example_beauty {
        max-width: 100%;
    }
    .example_text_p2{
        color: #fff;
    }
</style>