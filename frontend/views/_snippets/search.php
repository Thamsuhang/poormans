<section id="search_sec" class="search-bar reset-search parallax parallax-image-1">
    <div class="container">
        <div class="title_sec">
            <h1>Find A Business</h1>
        </div>
        <form class="form-inline clearfix" method="get" action="/poormans/search">
            <div class="search-form">
                <div class="form-field">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                            <input type="text" name="keyword" class="form-control" placeholder="What are you looking for?" value="<?php echo (isset($_GET['keyword']) && $_GET['keyword'] != '') ? $_GET['keyword'] : ''; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-field ">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                            <input type="text" name="address" class="form-control" placeholder="Where are you looking it?" value="<?php echo (isset($_GET['address']) && $_GET['address'] != '') ? $_GET['address'] : ''; ?>">
                        </div>
                    </div>
                </div>

                <div class="form-submit">
                    <button type="submit" class="btn btn-danger">Search</button>
                </div>
            </div>
        </form>
    </div>
</section>