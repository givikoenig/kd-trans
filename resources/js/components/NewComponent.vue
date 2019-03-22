<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="art_wrapper article-content">
                    <p></p>
                    <div class="example3">
                        <p><img :src="newdata.img" alt="" class="example_beauty"></p>
                        <div class="example_text">
                            <p class="example_text_p">{{newdata.title}}</p>
                            <p class="example_text_p2" v-html="newdata.text"></p>
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
            'newdata'
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