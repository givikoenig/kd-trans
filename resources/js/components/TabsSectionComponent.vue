<template>
    <div class="container" v-if="blockaboutmaindata.title1">
        <div class="row">
            <div class="col-sm-6">
                <div class="about-us-box">
                    <h1>{{ blockaboutmaindata.title1 }}</h1>
                    <p>{{ blockaboutmaindata.text1 }}</p>
                    <img :src="blockaboutmaindata.img" alt="blockaboutmaindata.img">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="about-box">
                    <img :src="blockaboutmaindata.img2" alt="blockaboutmaindata.img2" class="hidden-xs">
                    <h2>{{blockaboutmaindata.title2}}</h2>
                    <p>{{blockaboutmaindata.text2}}</p>
                    <img :src="blockaboutmaindata.img2" alt="blockaboutmaindata.img2" class="visible-xs">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'blockaboutmaindata'
        ],

        data: () => ({})
    }
</script>

<style scoped>
    .visible-xs {
        margin-top: 30px;
    }
</style>