<div class="acf-map">
<?php

$location = get_sub_field('location');

if( !empty($location) ): ?>
    <div class="acf-map" id="map">
        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
    </div>
<?php endif;?>
</div>
