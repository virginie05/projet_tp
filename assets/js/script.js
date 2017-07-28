$(function () {
    $('#create').click(function () {
        $('#video').submit();
    })
    $('#create').click(function () {
        $('#pictureFilm').submit();
    });
});

jQuery(document).ready(function () {
    jQuery("#gallery").unitegallery({
        tile_border_color: "#7a7a7a",
        tile_outline_color: "#8B8B8B",
        tile_enable_shadow: true,
        tile_shadow_color: "#8B8B8B",
        tile_overlay_opacity: 0.3,
        tile_show_link_icon: true,
        tile_image_effect_reverse: true,
        tile_enable_textpanel: true,
        lightbox_textpanel_title_color: "e5e5e5",
        tiles_space_between_cols: 20,
        tile_width:180,
	tile_height:230,
	grid_num_rows:2
    });
});
		