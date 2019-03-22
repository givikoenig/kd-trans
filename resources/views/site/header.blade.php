<div class="clearfix">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <header-component
                        :dbmenudata="{{ json_encode($db_menu_data) }}"
                        :currentpath="{{ json_encode($current_path) }}"
                        :contactstxt="{{ json_encode($contacts_txt) }}"
                ></header-component>
            </div>
        </div>
    </div>
</div>
