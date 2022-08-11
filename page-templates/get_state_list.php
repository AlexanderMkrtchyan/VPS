<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

$output = " ";



if($_POST['state_name']){
    $output = "";
	$keyword = $_POST['state_name'];
	global $wpdb;

    $table_name = 'US_STATES';	
	$relation_table_name = $wpdb->prefix.'term_relationships';	

	$state_data = $wpdb->get_results ( "SELECT * FROM $table_name WHERE `STATE_NAME` LIKE '%$keyword%' GROUP BY STATE_NAME ORDER BY ID");
    
   
    $output = '<ul>';   

    foreach ($state_data as $state_list) {

        $state_name = $state_list->STATE_NAME;
        $output .= '<li data-toggle="tooltip" data-placement="top" title="Click for select the state" class="search_state_list"><p>'.$state_name.'</p></li>';
    
    }
    $output .= '</ul>';
    echo $output;

    
}
  
?>