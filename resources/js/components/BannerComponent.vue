<template>
    <div class="tp-banner-container wrap-tp-slide">
        <div class="tp-banner tp-slide header" >
            <ul>
            <li v-for="(slide, i) in slidesdata"
                :key="i"
                data-transition="fade"
                data-slotamount="7"
                :data-masterspeed="500"
                data-saveperformance="on"
                data-title="Intro Slide">
                <img :src="slide.img"  class="main-img"
                     :alt="i"
                     :data-lazyload="slide.img"
                     data-bgposition="center top"
                     data-duration="12000"
                     data-bgfit="cover"

                     data-bgpositionend="center bottom">
                     data-bgrepeat="norepeat">
                <div class="tp-caption lft tp-resizeme rs-parallaxlevel-0"
                     data-x="100"
                     data-y="390"
                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="1000"
                     data-start="1000"
                     data-easing="Power3.easeInOut"
                     data-splitin="none"
                     data-splitout="none"
                     data-elementdelay="0.1"
                     data-endelementdelay="0.1"
                     style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="left-top corner-border"></span>
                </div>
                <div class="tp-caption lfb tp-resizeme rs-parallaxlevel-0"
                     data-x="100"
                     data-y="530"
                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="1000"
                     data-start="1000"
                     data-easing="Power3.easeInOut"
                     data-splitin="none"
                     data-splitout="none"
                     data-elementdelay="0.1"
                     data-endelementdelay="0.1"
                     style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="left-bottom corner-border"></span>
                </div>
                <div class="tp-caption lft tp-resizeme rs-parallaxlevel-0"
                     data-x="1000"
                     data-y="390"
                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="1000"
                     data-start="1000"
                     data-easing="Power3.easeInOut"
                     data-splitin="none"
                     data-splitout="none"
                     data-elementdelay="0.1"
                     data-endelementdelay="0.1"
                     style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="right-top corner-border"></span>
                </div>

                <div class="tp-caption lfb tp-resizeme rs-parallaxlevel-0"
                     data-x="1000"
                     data-y="530"
                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="1000"
                     data-start="1000"
                     data-easing="Power3.easeInOut"
                     data-splitin="none"
                     data-splitout="none"
                     data-elementdelay="0.1"
                     data-endelementdelay="0.1"
                     style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="right-bottom corner-border"></span>
                </div>
                <div class="tp-caption finewide_medium_white lft tp-resizeme rs-parallaxlevel-0 slider-link"
                     :data-x="620 - slide.txt.length * 28 / 2"
                     data-y="470"
                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="1000"
                     data-start="1200"
                     data-easing="Power3.easeInOut"
                     data-splitin="none"
                     data-splitout="none"
                     data-elementdelay="0.1"
                     data-endelementdelay="0.1"
                     style="z-index: 8;  white-space: nowrap;">
                    <a href="#order"> {{ slide.txt }} </a>
                </div>
            </li>

        </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'slidesdata'
        ]
    }
</script>

<style scoped>
</style>