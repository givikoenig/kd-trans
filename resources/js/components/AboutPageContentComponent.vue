<template>
    <div class="container">
        <div class="row">
            <div class="section_mod-e block_about">
                <div class="col-sm-12 col-md-6 vc_column_container">
                    <div class="vc_column-inner">
                        <p>
                            <strong>
                                <span v-html="pageaboutdata.text"></span>
                            </strong>
                        </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6  vc_column_container">
                    <div class="vc_column-inner">
                        <img :src="pageaboutdata.img" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="section_mod-d block_about">
                <div class="col-xs-12 vc_column_container">
                    <div class="vc_column-inner">
                        <p>
                            <strong>
                                <span v-html="pageaboutdata.subtext"></span>
                            </strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'pageaboutdata'
        ]
    }
</script>

<style scoped>

</style>