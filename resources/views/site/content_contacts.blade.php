<div id="content">
    <div class="inner-content">
        <section id="home-section" class="slider1">
            <div class="tp-banner-container wrap-tp-slide">
                <page-header-component :pagetitle="{{ json_encode($page_title) }}"></page-header-component>
                <page-map-component
                        :mapdata="{{json_encode($map_data)}}"
                ></page-map-component>
                <contacts-page-content-component
                        :labelstxt="{{ json_encode($labels_txt) }}"
                        :contactstxt="{{ json_encode($contacts_txt) }}"
                ></contacts-page-content-component>
            </div>
        </section>
    </div>
</div>