<template>
    <footer>
        <div class="up-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-widget info-widget">
                            <p><a class="logo" href="/"><img src="/assets/images/logo.png" alt=""></a></p>
                            <p><b>{{footerlabelsdata['additional_contact']}}</b></p>
                            <p>
                                Skype: {{ contactstxt.skype }} <br>
                                ICQ: {{ contactstxt.icq }} <br>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div  v-for="item in dbmenudata">
                            <div class="footer-widget info-widget" v-if="item.children.length > 0">
                                <h3 class="footer__title">{{ item.title }}</h3>
                                <div class="decor-2 decor-2_mod_b decor-2_mod_white"></div>
                                <div class="menu-uslugi-container">
                                    <p>
                                        <ul class="menu"  >
                                            <li v-for="subitem in item.children">
                                                <a :href="subitem.lnk">{{ subitem.title }}</a>
                                            </li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div v-for="(item, index) in dbmenudata">
                            <div class="footer-widget info-widget" v-if="index == dbmenudata.length -1">
                                <h3 class="footer__title">{{item.title}}</h3>
                                <div class="decor-2 decor-2_mod_b decor-2_mod_white"></div>
                                <div class="menu">
                                    <p><span>{{ contactstxt.address }}</span></p>
                                    <p><span class="footer_span">{{ footerlabelsdata.telfax }} </span><a v-bind:href="`tel:+74012376581`"> {{ contactstxt.phone }}</a></p>
                                    <p><span>{{ footerlabelsdata.cell }} </span><a v-bind:href="`tel:+79506789486`"> {{ contactstxt.cell }}</a></p>
                                    <p><span>{{ footerlabelsdata.email }} </span><a v-bind:href="`mailto:${email}`">{{ contactstxt.email1 }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p v-if="year === 2019" class="copyright">&copy; {{year}}. "KD-TRANS" Co.</p>
                        <p v-else="" class="copyright">&copy; 2019 - {{year}}. "KD-TRANS" Co.</p>
                    </div>
                    <div class="col-md-6 hidden-xs">
                        <p class="copyright right">
                            Powered by <a href="http://givik.ru" target="_blank">GiViK</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>

    export default {
        props: [
            'dbmenudata',
            'contactstxt'
        ],
        data: () => ({
            year: new Date().getFullYear(),
            email: '',
            footerlabelsdata: []
        }),
        mounted() {
            this.update()
        },
        methods: {
            update: function() {
                axios.get('/footer-labels-data').then((response) => {
                    this.footerlabelsdata = response.data
                });
            }
        }
    }
</script>

<style scoped>
    .footer-widget p,
    .footer-widget h2,
    .menu li a,
    .menu p span a {
        color: #999;
    }
    .menu li a:hover {
        color: #ffb118;
    }
    .footer-widget.info-widget p {
        margin-bottom: 25px;
    }
    .footer-widget .logo {
        float: none;
    }
    .footer-widget .logo img {
        margin-top: 0px;
    }
    .footer__title {
        margin-top: 0;
        margin-bottom: 0;
        font: 700 16px 'Titillium Web';
        color: #fff;
        text-transform: uppercase;
    }
    .menu {
        font-weight: 700;
        padding-left: 0;
        margin-top: 30px;
        list-style: none;
    }
    footer .up-footer {
        padding: 50px 0 0 0;
    }
    footer p.copyright {
        padding: 25px 0;
        background: #222222;
        text-transform: none;
        font-size: 13px;
        font-family: 'Montserrat', sans-serif;
        color: #999;
        text-align: unset;
        margin: 0;
    }
    footer p.copyright.right {
        font-size: 10px;
        text-align: right;
    }
    footer p.copyright.right a{
        color: #999;
    }
    footer p.copyright.right a:hover{
        color: #FFB118;
        text-decoration: none;
    }

</style>