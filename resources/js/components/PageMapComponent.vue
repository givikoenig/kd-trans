<template>
    <div class="up-footer">
        <div>
            <gmap-map v-bind:class="{withform: !mapdata.showform}"
                    :center="mapdata.center"
                    :zoom="mapdata.zoom"

            >
                <gmap-info-window
                        :options="infoOptions"
                        :position="infoWindowPos"
                        :opened="infoWinOpen"
                        @closeclick="infoWinOpen=false"
                >
                    {{infoContent}}
                </gmap-info-window>

                <gmap-marker :key="i" v-for="(m,i) in markers"
                             :position="m.position"
                             :clickable="true"
                             :animation="2"
                             @click="toggleInfoWindow(m,i)"
                ></gmap-marker>
                <div class="container-fluid" v-if="mapdata.showform">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="quote-box">
                                <div class="wrap-title-block wrap-title-block_mod-c">
                                    <h3 class="ui-title-block mode_b">{{labelstxt.form_order_title}}</h3>
                                    <div class="decor-1 decor-1_mod-c">
                                        <i class="icon fa fa-truck color-primary"></i>
                                    </div>
                                </div>
                                <form @submit.prevent="submit" id="contact-form">
                                    <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                                    <input name="name" id="name" type="text"
                                        :placeholder="labelstxt.form_name"
                                        v-model="fields.name"
                                    >
                                    <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                                    <input name="email" id="email" type="email"
                                       :placeholder="labelstxt.form_email"
                                       v-model="fields.email"
                                    >
                                    <input name="webmail" type="email" class="webmail">

                                    <div v-if="errors && errors.whence" class="text-danger">{{ errors.whence[0] }}</div>
                                    <input name="whence" id="whence" type="text"
                                       :placeholder="labelstxt.form_whence"
                                           v-model="fields.whence"
                                    >
                                    <div v-if="errors && errors.where" class="text-danger">{{ errors.where[0] }}</div>
                                    <input name="where" id="where" type="text"
                                           :placeholder="labelstxt.form_where"
                                           v-model="fields.where"
                                    >
                                    <div v-if="errors && errors.message" class="text-danger">{{ errors.message[0] }}</div>
                                    <textarea name="message" id="message"
                                              :placeholder="labelstxt.form_cargo_info"
                                              v-model="fields.message"
                                    ></textarea>

                                    <div class="form-submit-wrap">
                                        <input class="form-submit" type="submit" :value="labelstxt.form_sendorder">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </gmap-map>
        </div>
    </div>
</template>

<script>
    import vSelect from 'vue-select'
    export default {
        components: { vSelect },
        props: [
            'mapdata',
            'labelstxt',
        ],
        data: () => ({
            where: 'Kaliningrad',
            infoContent: '',
            infoWindowPos: null,
            infoWinOpen: false,
            currentMidx: null,
            //optional: offset infowindow so it visually sits nicely on top of our marker
            infoOptions: {
                pixelOffset: {
                    width: 0,
                    height: -35
                }
            },
            markers: [{
                position: {
                    lat: 54.726063,
                    lng: 20.501396
                },
                infoText: 'Rustrans - KD-TRANS.com'
            }],
            action: '/order-message',
            fields: {},
            errors: {},
            success: false,
            loaded: true,
        }),
        methods: {
            onChange(event) {
                this.product = event.target.value;
                console.log(event.target.value)
            },
            toggleInfoWindow: function(marker, idx) {
                this.infoWindowPos = marker.position;
                this.infoContent = marker.infoText;
                //check if its the same marker that was selected if yes toggle
                if (this.currentMidx == idx) {
                    this.infoWinOpen = !this.infoWinOpen;
                }
                //if different marker set infowindow to open and reset current marker index
                else {
                    this.infoWinOpen = true;
                    this.currentMidx = idx;
                }
            },
            submit() {
                if (this.loaded) {
                    this.loaded = false;
                    this.success = false;
                    this.errors = {};
                    axios.post(this.action, this.fields).then(response => {
                        Swal.fire({
                            position: 'top-end',
                            type: 'success',
                            title: this.labelstxt.order_sent,
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

        }
    }
</script>

<style scoped>
    .withform {
        height: 393px;
    }
</style>