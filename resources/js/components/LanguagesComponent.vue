<template>
    <ul class="social-icons">
        <li v-for="lang in languages">
            <a :href="lang.link"><img :src="lang.img" alt="" width="18"></a>
        </li>
    </ul>
</template>

<script>

    export default {
        data: () => ({
            languages: [
                { link: 'locale/ru', img: 'img/ru.png' },
                { link: 'locale/de', img: 'img/de.png' },
                { link: 'locale/en', img: 'img/en.png' },
                { link: 'locale/ch', img: 'img/ch.png' },
            ]
        })
    }
</script>

<style scoped>
    li {
        margin-right: 5px;
    }
    img {
        vertical-align: text-top;
    }
    .top-line ul.social-icons li a  {
        width: 32px;
        height: 32px;
    }
</style>