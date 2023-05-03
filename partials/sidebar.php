<div class="sidebar">
    <div class="row">
        <!-- in the future / change search logic -->
        <!-- <div class="col-lg-12">
            <div class="sidebar-item search">
                <form id="search_form" name="gs" method="GET" action="#">
                    <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                </form>
            </div>
        </div> -->
        <div class="col-lg-12">
            <div class="sidebar-item recent-posts">
                <div class="sidebar-heading">
                    <h2>Recent Posts</h2>
                </div>
                <div class="content">
                    <ul>
                        <?php
                        sidebar_get_blogs();
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>