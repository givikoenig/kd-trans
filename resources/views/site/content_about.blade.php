<div id="content">
    <div class="inner-content">
        <section id="home-section" class="slider1">
            <div class="tp-banner-container wrap-tp-slide">
                <page-header-component :pagetitle="{{ json_encode($page_title) }}"></page-header-component>
                <about-content-component :pageaboutdata="{{json_encode($page_about_data)}}"></about-content-component>
                <page-counter-component
                        :countertitle="{{json_encode($counter_title)}}"
                        :counterdata="{{json_encode($counter_data)}}"
                ></page-counter-component>
                <section class="tabs-section tabs-section-about">
                    <page-values-component
                            :valuestitle="{{ json_encode($values_title) }}"
                            :valuesdata="{{ json_encode($values_data) }}"></page-values-component>
                </section>
                <partners-component :partners_data="{{ json_encode($partners_data) }}"></partners-component>
            </div>
        </section>
    </div>
</div>
