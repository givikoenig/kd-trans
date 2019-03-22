<template>
    <div class="section_mod-c news-second">
        <div class="container clearfix">
            <div class="row vc_column_container">

                <div class="col-xs-12 vc_column-inner">

                    <div class="quote-box">
                        <div class="wrap-title-block wrap-title-block_mod-c">
                            <h3 class="ui-title-block review">{{ labelstxt.put_your_testimonial }}</h3>
                            <div class="decor-1">
                                <i class="icon fa fa-pencil color-primary"></i>
                            </div>
                        </div>
                        <form @submit.prevent="submit" id="contact-form" class="contact-form review-form">
                            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                            <input
                                    name="name"
                                    id="name"
                                    type="text"
                                    :placeholder="labelstxt.form_name"
                                    v-model="fields.name"
                            >
                            <div v-if="errors && errors.telnumber" class="text-danger">{{ errors.telnumber[0] }}</div>
                            <input
                            name="rank"
                            id="rank"
                            type="text"
                            :placeholder="labelstxt.form_rank"
                            v-model="fields.rank"
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
        ],
        data: () => ({
            'action': '/testimonial-page-message',
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
                            title: this.labelstxt.review_sent,
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