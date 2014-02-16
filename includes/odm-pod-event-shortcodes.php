<?php

/*****************************************************************************************/
/* !odm-event-list shortcode */
/*****************************************************************************************/

function odm_event_list() {

	$params = array(
        'where'   => 't.event_status = "Live" AND t.event_date > curdate()',
        'limit'   => -1  // Return all rows
    );

    // Create and find in one shot
    $events = pods( 'odm_event') ->find( $params );

	$content = '<div id="odm-event-list">';

	$myrows = get_odm_event_list();
	
	if ( 0 < $events->total() ) {
        while ( $events->fetch() ) {
		$content .= '<div class="odm-event-list-block">';
		$content .= '<div class="odm-event-list-link">';
		$content .= '<a href="'. $events->display('sales_page_url') . '">';
		$content .= '<img src="http://odm-website.s3.amazonaws.com/odm-images/training-thumbnail-' . $events->display('event_shortname') . '.jpg" height="50px" width="50px" class="odm-event-list-thumbnail">' . $events->display('title') . '</a>';
		$content .= '</div>';
		$content .= '<div class="odm-event-list-timings"><em>'. $events->display('city') . ' - ' .date("jS M, Y", strtotime($events->display('start_date'))). ' - '. $events->display('duration'). '</em></div>';
		$content .= '<div class="odm-event-list-pitch">'. $events->display('elevator_pitch'). '</div>';
		$content .= '</div>';
		}
	return $content;
	}
}

/*****************************************************************************************/
/* !get event list */
/*****************************************************************************************/
/*
function get_odm_event_list(){

	global $wpdb;
	
	$myrows = $wpdb->get_results("SELECT  FROM odm_event_details WHERE event_date_status = 'live' AND start_date > curdate() AND event_type != 'Webinar' order by start_date");
	}
*/
/*****************************************************************************************/
/* !show full event list */
/*****************************************************************************************/
add_shortcode('show_full_odm_event_list','get_full_odm_event_list_pod');
function get_full_odm_event_list_pod(){

	$params = array(
        'where'   => 't.event_date_status = "Live" AND t.event_date > curdate()',
        'limit'   => -1  // Return all rows
    );

    // Create and find in one shot
    $events = pods( 'odm_event_dates') ->find( $params );

    $content = '';

    if ( 0 < $events->total() ) {
        while ( $events->fetch() ) {
			$content .= '<div class="odm-event-list-block">';
			$content .= '<div class="odm-event-list-link"><a href="' .$events->display( 'event.sales_page_url'). '" style="font-weight:bold;">';
			$content .= '<img src="http://odm-website.s3.amazonaws.com/odm-images/training-thumbnail-' . $events->display('event.event_shortname') . '.jpg" height="50px" width="50px" class="odm-event-list-thumbnail"><span class="odm-event-list-title">' . $events->display('event.name') . '</span></a></div>';
			
			$content .= '<div class="odm-event-list-timings"><em>'. $events->display('venue.city') . ' - ' .date("jS M, Y", strtotime($events->display('event_date'))). ' - '. $events->display('event.duration'). '</em></div>';
			$content .= '<div class="odm-event-list-pitch">'. $events->display('event.elevator_pitch'). '</div>';
			$content .= '</div>';
			} 
		}
	else { 
			$content .= 'No upcoming events.'; 
		}
    
    return $content;
}

/*****************************************************************************************/
/* !show sales page event list */
/*****************************************************************************************/
add_shortcode('show_sales_page_event_list','get_sales_page_event_list_pod');
function get_sales_page_event_list_pod(){

	$params = array(
        'where'   => 't.event_status = "Live"',
        'limit'   => -1  // Return all rows
    );

    // Create and find in one shot
    $events = pods( 'odm_event') ->find( $params );

    $content = '';

    if ( 0 < $events->total() ) {
        while ( $events->fetch() ) {

        $content .= '<h2>'. $events->display( 'event_shortname' ) . '</h2>';
        //$content .= '<h2>'. {@event_shortname} . '</h2>';
        $content .= '<p>Author: ' .$events->display( 'event_status' ) . '</p>';
        $content .= '<br />';
        $content .= '<p>Category: ' .$events->display( 'elevator_pitch' ). '</p>';
        $content .= '<br />';

        } // end of books loop
    } // end of found books
    
    return $content;
}

/*****************************************************************************************/
/* !Sidebar Training List */
/*****************************************************************************************/
add_shortcode('odm_sidebar_event_list','get_odm_pod_events_for_sidebar');

function get_odm_pod_events_for_sidebar(){
	//$content = 'Inside shortcode';
	
	
	//$where = "profile.city.id = '{$city_id}'";
	$params = array(
        'where'   => 't.event_date_status = "Live" AND t.event_date > curdate()',
        'limit'   => 4,  // Return all rows
        'orderby' => 't.event_date ASC',
        //'join' => 'LEFT JOIN wp_pods_odm_event ON wp_pods_odm_event.`id` = `t`.`id`'
    );

    // Create and find in one shot
    $events = pods( 'odm_event_dates') ->find( $params );

	$content = '<div class="odm_sidebar_list">';			
	$content .= '<h3 class="sidebar-h3">Up & Coming Public Trainings</h3>';	
	$content .= '<div class="odm_sidebar_box">';   
	
    if ( 0 < $events->total() ) {
        while ( $events->fetch() ) {
			$content .= '<div class="odm-sidebar-event-list-block">';
			$content .= '<div class="odm-sidebar-event-list-link"><a href="' .$events->display( 'event.sales_page_url'). '" style="font-weight:bold;">';
			$content .= '<img src="http://odm-website.s3.amazonaws.com/odm-images/training-thumbnail-' . $events->display('event.event_shortname') . '.jpg" height="50px" width="50px" class="odm-sidebar-event-list-thumbnail"><span class="odm-sidebar-event-list-title">' . $events->display('event.name') . '</span></a></div>';
			
			$content .= '<div class="odm-sidebar-event-list-timings"><em>'. $events->display('venue.city') . ' - ' .date("jS M, Y", strtotime($events->display('event_date'))). ' - '. $events->display('event.duration'). '</em></div>';
			$content .= '<div class="odm-sidebar-event-list-pitch">'. $events->display('event.elevator_pitch'). '</div>';
			} 
		}
	else { 
			$content .= 'No upcoming events.'; 
		}
	
	$content .= '<a href="/internet-marketing-training/" style="font-weight:bold;">More...</a>';
	$content .= '</div>';            
	$content .= '</div>';

	return $content;
		//return 'end of shortcode';
	}
?>