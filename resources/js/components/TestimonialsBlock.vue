<template>
    <section v-if="testimonialsdata.length" class="testimonial-section">
        <div class="container">
            <div class="title-section">
                <a href="/testimonials"><h1>{{ labelstxt.testimonials_title }}</h1></a>
            </div>

            <div class="testimonial-box">
                <ul class="bxslider">
                    <li v-for="testimonial in testimonialsdata">
                        <h2>{{ testimonial.name }}</h2>
                        <span>{{ testimonial.rank }}</span>
                        <p>{{ testimonial.text }}</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: [
            'testimonialsdata',
            'labelstxt',

        ],
        data: () => ({})
    }
</script>

<style scoped>

</style>