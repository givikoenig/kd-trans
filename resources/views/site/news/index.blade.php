<div id="content">
    <div class="inner-content">
        <section id="home-section" class="slider1">
            <div class="tp-banner-container wrap-tp-slide">
                <page-header-component :pagetitle="{{ json_encode($page_title) }}"></page-header-component>
                <news-main-content-component
                        :labelstxt="{{ json_encode($labels_txt) }}"
                        :newslistdata="{{ json_encode($news_list_data) }}"
                ></news-main-content-component>
                <news-second-content-component
                        :labelstxt="{{ json_encode($labels_txt) }}"
                        :contactstxt="{{ json_encode($contacts_txt) }}"
                ></news-second-content-component>
            </div>
        </section>
    </div>
</div>