<template>
    <div class="header">
        <div class="header__wrap">
            <div class="header-top clearfix">
                <div class="header-top__inner">
                    <span class="header-top__contacts">
                      <a v-bind:href="`tel:+79506789486`" class="header-top__contacts-link">{{ contactstxt.cell }}</a>
                    </span>
                    <span class="header-top__contacts">email:
                        <a v-bind:href="`mailto:${contactstxt.email2}`" class="header-top__contacts-link">{{ contactstxt.email2 }}</a>
                    </span>
                </div>
            </div>
            <a class="logo" href="/"><img :src="img" alt=""></a>
            <div class="header__inner clearfix">
                <fixed-header :threshold="200">
                    <nav class="navbar yamm snavbar-default snav-menu">
                        <div class="navbar-header hidden-md hidden-lg hidden-sm">
                            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                                <span v-for="i in 3" class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="navbar-collapse-1" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav submenu nav-menu">
                                <li class="item"
                                    v-for="item in dbmenudata"
                                    :key="item.id"
                                    @mouseenter="isSubmenu(item.children.length)"
                                    @click="isSubmenu(item.children.length)"
                                    @mouseleave="isOpen = false"
                                >
                                    <a :class="{active: isActive(item.lnk)}" :href="item.lnk">{{ item.title }}</a>
                                    <div  class="wrap-submenu">
                                        <transition name="fade">
                                            <ul class="sub-menu" v-if="item.children.length > 0 && isOpen">
                                                <li class="submenu_item" v-for="child in item.children">
                                                    <a :href="child.lnk">{{ child.title }}</a>
                                                </li>
                                            </ul>
                                        </transition>
                                    </div>
                                </li>
                                <li v-for="lang in languages">
                                    <a :href="lang.link"><img :src="lang.img" alt="" width="18"></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </fixed-header>
            </div>
        </div>
    </div>
</template>

<script>
    import FixedHeader from 'vue-fixed-header'

    export default {
        components: {
            FixedHeader
        },
        props: [
            'currentpath',
            'dbmenudata',
            'contactstxt'
        ],
        methods: {
            isSubmenu: function(l){
                if (l > 0) {
                    this.isOpen = true
                }
            },
            isActive (e) {
                if (e === this.currentpath) {
                    return true
                }
            }
        },
        data: () => ({
            img: '/assets/images/logo.png',
            languages: [
                { link: '/locale/ru', img: '/img/ru.png' },
                { link: '/locale/de', img: '/img/de.png' },
                { link: '/locale/en', img: '/img/en.png' },
                { link: '/locale/ch', img: '/img/ch.png' },
            ],
            isOpen: false,
        })
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
    .submenu li:hover {
        cursor: pointer;
        background: #fff;
    }
    .submenu_item a:hover {
        color: #666;
        text-decoration: none;
    }
</style>