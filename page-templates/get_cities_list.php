<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

$output = " ";



if($_POST['city_name']){
    $output = "";
	$keyword = $_POST['city_name'];
	global $wpdb;

    $table_name = 'US_CITIES';	
	$relation_table_name = $wpdb->prefix.'term_relationships';	

	$city_data = $wpdb->get_results ( "SELECT * FROM $table_name WHERE `CITY` LIKE '$keyword%' GROUP BY CITY ORDER BY ID");
    
   
    $output = '<ul>';   

    foreach ($city_data as $city_list) {

        $city_name = $city_list->CITY;
        $state_id = $city_list->ID_STATE;
        

        $output .= '<li data-toggle="tooltip" data-placement="top" title="Click for select the City" class="search_city_list" state_id="'.$state_id.'"><p>'.$city_name.'</p></li>';
    
    }
    $output .= '</ul>';
    echo $output;

    
}
  
?>