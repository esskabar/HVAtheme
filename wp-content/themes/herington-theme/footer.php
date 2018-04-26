<?php wp_footer(); ?>
<?php  $image_front_bkg = get_field('front_image_modal', 'option');?>
<?php $image_bkg = get_field('back_image_modal', 'option');?>

<div class="wrapper_modal__block" id="reserve_selected">
    <div class="modal__block back">
        <div class="modal_back_bkg">
            <div class="modal_contact">
                <div class="wraper_inputs_back" style="background-image: url('<?php echo $image_bkg['url'];?>')">

                </div>
            </div>
        </div>
    </div>
    <div class="modal__block front">
        <div class="modal_front_bkg" data-img_bkg="<?php echo $image_front_bkg['url'];?>">
            <div class="modal_contact">
                <?php the_field('contact_form_for_modal', 'option');?>
            </div>
        </div>
        <div class="close">×</div>
    </div>
</div>

<div class="wrapper_modal__block" id="reserve_current">
    <div class="modal__block back">
        <div class="modal_back_bkg">
            <div class="modal_contact">
                <div class="wraper_inputs_back" style="background-image: url('<?php echo $image_bkg['url'];?>')">

                </div>
            </div>
        </div>
    </div>
    <div class="modal__block front">
        <div class="modal_front_bkg" data-img_bkg="<?php echo $image_front_bkg['url'];?>">
            <div class="modal_contact">
                <?php the_field('contact_form_for_current', 'option');?>
            </div>
        </div>
        <div class="close">×</div>
    </div>
</div>

<footer>

    <div class="container">
        <i class="icon-equal_housing"></i>
        <i class="icon-disabled"></i>
        <ul>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Terms</a></li>
        </ul>
        <span class="copyright">© 2017 Professionally Managed by: Wellington Advisors. All Rights Reserved. </span>
        <span class="powered">Powered by <i class="icon-resident"></i> </span>
    </div>

</footer>

</body>
</html>