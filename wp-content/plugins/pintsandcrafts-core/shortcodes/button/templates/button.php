<button type="submit" <?php pintsandcrafts_edge_inline_style($button_styles); ?> <?php pintsandcrafts_edge_class_attribute($button_classes); ?> <?php echo pintsandcrafts_edge_get_inline_attrs($button_data); ?> <?php echo pintsandcrafts_edge_get_inline_attrs($button_custom_attrs); ?>>
    <span class="edgtf-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo pintsandcrafts_edge_icon_collections()->renderIcon($icon, $icon_pack); ?>
    <?php if ($params['type'] === 'bordered') { ?>
        <span class="edgtf-btn-border-holder"></span>
    <?php } ?>
</button>