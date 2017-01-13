<?php if(!empty($posts)):?>
    <div class="row">
        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
                <div data-p="225.00">
                    <a href="<?php echo site_url('read/'.$posts[0]['slug'])?>"><img data-u="image" src="<?php echo BASE_URI.$posts[0]['featured_image']?>" /></a>
                </div>
                <div data-p="225.00" style="display:none;">
                    <a href="<?php echo site_url('read/'.$posts[1]['slug'])?>"><img data-u="image" src="<?php echo BASE_URI.$posts[1]['featured_image']?>" /></a>
                </div>
                <div data-p="225.00" data-po="80% 55%" style="display:none;">
                    <a href="<?php echo site_url('read/'.$posts[2]['slug'])?>"><img data-u="image" src="<?php echo BASE_URI.$posts[2]['featured_image']?>" /></a>
                </div>
                <a data-u="any" href="http://www.jssor.com" style="display:none">Full Width Slider</a>
            </div>
            <span data-u="arrowleft" class="jssora22l" style="top:0px;left:8px;width:40px;height:58px;" data-autocenter="2"></span>
            <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:40px;height:58px;" data-autocenter="2"></span>
        </div>

    </div> <!-- end row -->
    <section class="magazine">
        <div class="row">
            <h3><?php echo $magazines[0]['title']; ?></h3>
            <div class="col-md-12">
                <a href=""><img src="" alt=""></a>
            </div>
        </div>
    </section>
<?php endif;?>