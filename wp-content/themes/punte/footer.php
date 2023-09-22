<?php
/**
 * @package Punte
 */
?>
</div><!-- #content -->

<?php
    if(!is_page('login')){
        do_action('punte_footer');
    }
?>
</div><!-- #page -->

<?php
/**
 * punte_after_footer hook.
 *
 * @hooked punte_back_to_top
 */
do_action( 'punte_after_footer' );

wp_footer();
?>
    <script>
        jQuery( document ).ready(function() {
            <?php if(is_page("submit-ticket")){ ?>
            
                jQuery("#wpas_my_custom_store_wrapper").hide();
                jQuery("#wpas_my_custom_store option[value='']").attr('selected', true);

                var url = window.location.href;  
                var storeId = url.split('?storeId=')[1];
                // console.log(storeId);
                if(typeof(storeId) != "undefined" && storeId !== null) {
                    jQuery("#wpas_department").val(storeId);
                    var checkCurrentModuleName = jQuery('#wpas_department :selected').text().toLowerCase();
                    if(checkCurrentModuleName == "local pos" || checkCurrentModuleName == "receiving app"){
                        jQuery("#wpas_my_custom_store_wrapper").show();
                        jQuery('select[name="wpas_my_custom_store"]').attr('required', true);
                    }else{
                        // jQuery('#wpas_department').val("");
                        jQuery('select[name="wpas_my_custom_store"]').attr('required', false);
                        jQuery("#wpas_my_custom_store").val("").trigger('change');
                        jQuery("#wpas_my_custom_store_wrapper").hide();
                    }
                }
                
                jQuery('select[name="wpas_department"]').attr('required', true);
                // jQuery('#wpas-message').attr('required', true);
                
                // console.log(checkModuleName);
                jQuery("#wpas_department").change(function(){
                    // alert(jQuery('select[name="wpas_department"]').val());
                    var checkModuleName = jQuery('#wpas_department :selected').text().toLowerCase();
                    // alert(checkModuleName);
                    if(checkModuleName == "local pos" || checkModuleName == "receiving app"){
                        jQuery("#wpas_my_custom_store_wrapper").show();
                        jQuery('select[name="wpas_my_custom_store"]').attr('required', true);
                    }else{
                        jQuery('select[name="wpas_my_custom_store"]').attr('required', false);
                        jQuery("#wpas_my_custom_store").val("").trigger('change');
                        jQuery("#wpas_my_custom_store_wrapper").hide();                    
                    }
                });
      
    <?php } elseif( is_page("emergency-submit-ticket") ){ ?>
            jQuery("#wpas_ticket_priority").val(65);
    <?php } ?>
    
    });
    </script>
</body>
</html>
