<template>
    <div class="section_mod-c news-second">
        <div class="container clearfix">
            <div class="row vc_column_container">
                <div class="col-md-12 col-lg-4 vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="section-contacts-block">
                            <h3 class="contacts-block__title ui-title-inner">
                                KD-Trans
                            </h3>
                            <div class="decor-2 decor-2_mod-b"></div>
                            <div class="contacts-block__description" style="font: 300 14px/1.714 Lato, Helvetica, Arial, sans-serif;">
                                {{ labelstxt.form_you_can_contact_us }}
                            </div>
                            <div class="contacts-block clearfix">
                                <i class="icon flaticon-telephone114"></i>
                                <span class="contacts-block__inner">
                                                <span class="contacts-block__emphasis color-primary">{{ contactstxt.phone }}</span>
                                            </span>
                            </div>
                            <div class="contacts-block clearfix">
                                <i class="icon icon flaticon-mail45"></i>
                                <span class="contacts-block__inner">
                                    <a href="mailto:kuleshov@kd-trans.com" class="contacts-block__emphasis color-primary">{{ contactstxt.email2 }}</a>
                                    {{ labelstxt.form_we_will_reply }}
                                </span>
                            </div>
                        </div>
                        <div class="section-contacts-block clearfix">
                            <h3 class="contacts-block__title ui-title-inner">{{ labelstxt.form_or_visit_office }}</h3>
                            <div class="decor-2 decor-2_mod-b"></div>
                            <div class="contacts-block contacts-block_mod-a clearfix">
                                <i class="icon flaticon-location74"></i>
                                <span class="contacts-block__inner">
                                                {{ contactstxt.address }}
                                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-7 col-lg-offset-1 vc_column-inner">

                    <div class="quote-box">
                        <div class="wrap-title-block wrap-title-block_mod-c">
                            <h2 class="ui-title-block">
                                <span class="ui-title-emphasis">{{ labelstxt.form_subscribe }}</span>
                            </h2>
                            <div class="decor-1">
                                <i class="icon flaticon-mail45 color-primary"></i>
                            </div>
                        </div>
                        <form @submit.prevent="submit" id="contact-form" class="contact-form review-form">
                            <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                            <input
                                    name="email"
                                    id="email"
                                    type="email"
                                    :placeholder="labelstxt.form_email"
                                    v-model="fields.email"
                            >
                            <input name="webmail" type="email" class="webmail">
                            <input type="submit" :value="labelstxt.form_sendmessage">
                        </form>
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
            'contactstxt',
        ],
        data: () => ({
            'action': '/subscribe',
            fields: {},
            errors: {},
            success: false,
            loaded: true,
        }),
        methods: {
            submit() {
                if (this.loaded) {
                    this.loaded = false;
                    this.success = false;
                    this.errors = {};
                    axios.post(this.action, this.fields).then(response => {
                        Swal.fire({
                            position: 'top-end',
                            type: 'success',
                            title: this.labelstxt.subscribtion_sent,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        this.fields = {}; //Clear input fields.
                        this.loaded = true;
                        this.success = true;
                    }).catch(error => {
                        this.loaded = true;
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }
                    });
                }
            },
        },
    }
</script>

<style scoped>

</style>