<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="vc_column-inner">
                    <div class="wrapper">
                        <h2 class="ui-title-block">
                            <span class="ui-title-emphasis">{{ valuestitle.maintitle }}</span>
                        </h2>
                        <div class="decor-1">
                            <i class="icon fa fa-globe"></i>
                        </div>
                        <div class="container  clearfix">
                            <ul class="list-features list-features_mod-a list-features_left list-unstyled">
                                <li class="list-features__item"
                                    v-for="(item, index) in valuesdata"
                                >
                                    <i class="list-features__icon " :class="icons[index]"></i>
                                    <div class="list-features__inner">
                                        <h3 class="list-features__title ui-title-inner">
                                            {{ item.title }}
                                        </h3>
                                        <div class="list-features__description">
                                            <p class="values_p" v-html="item.txt"></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
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
            'valuestitle',
            'valuesdata'
        ],
        data: () => ({
            icons: [
                'flaticon-transport643',
                'flaticon-sticker1',
                'flaticon-head39',
                'flaticon-telephone114'
            ]
        })
    }
</script>

<style scoped>

</style>