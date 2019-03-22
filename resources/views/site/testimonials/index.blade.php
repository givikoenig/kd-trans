<div id="content">
    <div class="inner-content">
        <section id="home-section" class="slider1">
            <div class="tp-banner-container wrap-tp-slide">
                <page-header-component :pagetitle="{{ json_encode($page_title) }}"></page-header-component>
                <testimonials-page-content-component
                        :labelstxt="{{ json_encode($labels_txt) }}"
                        :testimonialsdata="{{json_encode($testimonials_data)}}"
                ></testimonials-page-content-component>
                <testimonials-page-form
                        :labelstxt="{{ json_encode($labels_txt) }}"
                ></testimonials-page-form>
            </div>
        </section>
    </div>
</div>