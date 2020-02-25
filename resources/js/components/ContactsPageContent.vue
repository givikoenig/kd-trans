<template>
    <div class="section_mod-c">
        <div class="container clearfix">
            <div class="row vc_column_container">
                <div class="col-md-12 col-lg-4 vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="section-contacts-block">
                            <h3 class="contacts-block__title ui-title-inner">
                                KD-TRANS.com
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
                            <h3 class="ui-title-block ui-title-block_mod-c">{{ labelstxt.form_contact_us }}</h3>
                            <div class="decor-1 decor-1_mod-b">
                                <i class="icon fa fa-pencil color-primary"></i>
                            </div>
                        </div>
                        <form @submit.prevent="submit" id="contact-form" class="contact-form">
                            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                            <input
                                name="name"
                                id="name"
                                type="text"
                                :placeholder="labelstxt.form_name"
                                v-model="fields.name"
                            >
                            <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                            <input
                                name="email"
                                id="email"
                                type="email"
                                :placeholder="labelstxt.form_email"
                                v-model="fields.email"
                            >
                            <input name="webmail" type="email" class="webmail">
                            <div v-if="errors && errors.telnumber" class="text-danger">{{ errors.telnumber[0] }}</div>
                            <input
                                name="telnumber"
                                id="telnumber"
                                type="text"
                                :placeholder="labelstxt.form_phone"
                                v-model="fields.telnumber"
                            >
                            <div v-if="errors && errors.message" class="text-danger">{{ errors.message[0] }}</div>
                            <textarea
                                name="message"
                                id="message"
                                :placeholder="labelstxt.form_message"
                                v-model="fields.message"
                            ></textarea>
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
            'action': '/contact-page-message',
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
                            title: this.labelstxt.message_sent,
                            showConfirmButton: false,
                            timer: 1500
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