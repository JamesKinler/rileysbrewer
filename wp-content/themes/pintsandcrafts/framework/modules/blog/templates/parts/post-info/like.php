<?php if(pintsandcrafts_edge_core_plugin_installed()) { ?>
    <div class="edgtf-blog-like">
        <?php if( function_exists('pintsandcrafts_edge_get_like') ) pintsandcrafts_edge_get_like(); ?>
    </div>
<?php } ?>