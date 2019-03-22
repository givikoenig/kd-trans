<div id="content">
    <div class="inner-content">
        <section id="home-section" class="slider1">
            <banner-component :slidesdata="{{ json_encode($slides_data) }}"></banner-component>
            <div class="tp-bannertimer"></div>
        </section>
        <section class="banner-section main-page">
            <owl-component :servicesdata="{{ json_encode($buttons_data) }}"></owl-component>
        </section>
        <section class="tabs-section">
            <tabs-section-component
                :blockaboutmaindata="{{json_encode($block_about_main_data)}}"
            ></tabs-section-component>
        </section>
         <section class="quote-section" id="order">
                <page-map-component
                    :labelstxt="{{ json_encode($labels_txt) }}"
                    :mapdata="{{json_encode($map_data)}}"
                ></page-map-component>
        </section>
        <testimonials-block
              :labelstxt="{{ json_encode($labels_txt) }}"
              :testimonialsdata="{{ json_encode($testimonials_data) }}"
        ></testimonials-block>
        <div class="tp-banner-container wrap-tp-slide">
            <partners-component :partners_data="{{ json_encode($partners_data) }}"></partners-component>
        </div>

    </div>
</div>