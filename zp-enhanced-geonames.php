<?php
/*
Plugin Name: ZodiacPress Enhanced GeoNames
Plugin URI:	https://cosmicplugins.com/downloads/zodiacpress-enhanced-geonames/
Description: Improves the experience when filling out the Birth City field on the ZP form.
Version: 1.6
Author:	Isabel Castillo
Author URI:	https://isabelcastillo.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Copyright 2016-2017 Isabel Castillo

ZodiacPress Enhanced GeoNames is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

ZodiacPress Enhanced GeoNames is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with ZodiacPress Enhanced GeoNames. If not, see <http://www.gnu.org/licenses/>.
*/

if ( class_exists( 'ZP_License' ) && is_admin() ) {
	$zppg_license = new ZP_License( __FILE__, 'ZodiacPress Enhanced GeoNames', '1.6', 'Isabel Castillo' );// @todo update v
}
function zppg_autocomplete_ajaxurl( $url ) {
	return '//api.geonames.org/searchJSON';
}
function zppg_ajax_datatype( $type ) {
	return 'jsonp';
}
function zppg_ajax_type( $type ) {
	return 'GET';
}
add_filter( 'zp_autocomplete_ajaxurl', 'zppg_autocomplete_ajaxurl' );
add_filter( 'zp_ajax_geonames_action', '__return_false'  );
add_filter( 'zp_ajax_datatype', 'zppg_ajax_datatype' );
add_filter( 'zp_ajax_type', 'zppg_ajax_type' );
/**
 * For ZP versions less than 1.5.4
 * @todo remove this in the future.
 */
if ( version_compare( ZODIACPRESS_VERSION, '1.5.4', '<' ) ) {
	function zppg_timezone_ajaxurl( $url ) {
		return '//api.geonames.org/timezoneJSON';
	}
	add_filter( 'zp_timezone_ajaxurl', 'zppg_timezone_ajaxurl' );
}
