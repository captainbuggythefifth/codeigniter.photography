<?php foreach($aAlbums as $album) :?>
    <div class="col-md-3 well" style="background-color: pink; margin-top: 50px">
        <div class="album-container">
            <div class="album-header-container">
                <div class="album-header" style="text-align: center;">
                    <span style="font-style: italic; font-weight: 300; font-size: 30px">
                        <?php echo $album['name']?>
                    </span>
                </div>
            </div>

            <div class="album-top col-md-12 no-padding-lg-md">
                <div class="album-top-left col-md-6 no-padding-lg-md padding-3px">
                    <img src="https://scontent.fmnl4-1.fna.fbcdn.net/t31.0-8/s960x960/13235201_10204268116583397_3469558818044451801_o.jpg" style="width: 100%" data-source-id="<?php echo $album['aPhotos'][0]['id']?>">
                </div>
                <div class="album-top-right col-md-6 no-padding-lg-md padding-3px">
                    <img src="https://scontent.fmnl4-1.fna.fbcdn.net/t31.0-8/s960x960/13235201_10204268116583397_3469558818044451801_o.jpg" style="width: 100%">
                </div>
            </div>
            <div class="album-bottom col-md-12 no-padding-lg-md">
                <div class="album-bottom-left col-md-4 no-padding-lg-md padding-3px">
                    <img src="https://scontent.fmnl4-1.fna.fbcdn.net/t31.0-8/s960x960/13235201_10204268116583397_3469558818044451801_o.jpg" style="width: 100%">
                </div>
                <div class="album-bottom-middle col-md-4 no-padding-lg-md padding-3px">
                    <img src="https://scontent.fmnl4-1.fna.fbcdn.net/t31.0-8/s960x960/13235201_10204268116583397_3469558818044451801_o.jpg" style="width: 100%">
                </div>
                <div class="album-bottom-right col-md-4 no-padding-lg-md padding-3px">
                    <img src="https://scontent.fmnl4-1.fna.fbcdn.net/t31.0-8/s960x960/13235201_10204268116583397_3469558818044451801_o.jpg" style="width: 100%">
                </div>
            </div>
            <div class="album-info-container">
                <div class="album-info-date pull-right">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i> &nbsp; <span> June 18, 2014</span>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;?>
