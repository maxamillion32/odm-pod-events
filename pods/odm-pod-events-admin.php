<?php
/*
Plugin Name: ODM Pod Events
Plugin URI: http://oxforddigitalmarketing.co.uk
Description:  Manages ODM Pod Events
Author: Simon Wallace-Jones
Version: 1.0
Author URI: http://oxforddigitalmarketing.co.uk
*/

add_action('admin_menu','initialize_admin');

//hiding 'pods' menu from admin sidebar
//If we are building our own UI then it would be good to hide that
add_filter( 'pods_admin_menu_secondary_content', '__return_false' ); 
//remove_submenu_page('themes.php', 'themes.php');
//remove_menu_page('link-manager.php');

function initialize_admin () {

	//set Your icon URL here
	$plugins_url = plugins_url();
	$icon = $plugins_url . '/odm-pod-events/images/event-date.png';

    // adding page object -> http://codex.wordpress.org/Function_Reference/add_object_page
    // add_object_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url );
    add_object_page('ODM Events', 'ODM Events', 'manage_options', 'odm-events', 'display_event_dates_page', $icon);

    // in order to not duplicate top menu - first child menu have the same slug as parent
    // http://codex.wordpress.org/Function_Reference/add_submenu_page
    // add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function ); 

    // submenu
    add_submenu_page('odm-events', 'Event Dates', 'Event Dates', 'manage_options', 'odm-events', 'display_event_dates_page');
    // submenu
    add_submenu_page('odm-events', 'Events', 'Events', 'manage_options', 'odm-events-page', 'display_events_page');
    // submenu
    add_submenu_page('odm-events', 'Event Venues', 'Venues', 'manage_options', 'odm-event-veunes', 'display_event_venues_page');

}

function display_info_page() {
	//You can do various stuff here - just an example
    echo '<h2>Recommendation Settings</h2>
    	<p>Here we\'ll add the settings that govern the rule logic for Recommendation scoring once it is worked out.</p>';
}
/*****************************************************************************************/
/* ! Recommendations */
/*****************************************************************************************/
function display_event_dates_page() {
    //initialize pods
    $object = pods('odm_event_dates');

    //for this pod type we will also use all available fields
    $allFields = array();
    foreach($object->fields as $field => $data) {
        $allFields[$field] = array('label' => $data['label']);
    }       
    
    $keyFields = array('name','event','event_date','event_date_status', 'places_left','event_venue','author','permalink');
    
    $manageFields = array('name','event','event_date','event_date_status', 'places_left');

    //adding few basic parameters
    $object->ui = array(
        'item'   => 'Event Date',
        'items'  => 'Event Dates',
        'fields' => array(
            'add'       => $keyFields,
            'edit'      => $allFields,
            'duplicate' => $allFields,
            'manage'    => $manageFields
        ),
    );         

    //pass parameters
    pods_ui($object);
}

/*****************************************************************************************/
/* ! Sectors */
/*****************************************************************************************/

function display_events_page() {
    $object = pods('odm_event');

    //for this pod type we will also use all available fields
    $fields = array();
    foreach($object->fields as $field => $data) {
        $fields[$field] = array('label' => $data['label']);
    }  

    $manageFields = array('name','event_status','event_price','duration');


    //adding few basic parameters
    $object->ui = array(
        'item'   => 'Event',
        'items'  => 'Events',
        'fields' => array(
            'add'       => $fields,
            'edit'      => $fields,
            'duplicate' => $fields,
            'manage'    => $manageFields,
        ),
    );         

    pods_ui($object);
}
/*****************************************************************************************/
/* !Sources */
/*****************************************************************************************/

function display_event_venues_page() {
    $object = pods('odm_event_venue');

    //for this pod type we will also use all available fields
    $fields = array();
    foreach($object->fields as $field => $data) {
        $fields[$field] = array('label' => $data['label']);
    }  

    //adding few basic parameters
    $object->ui = array(
        'item'   => 'Venue',
        'items'  => 'Venues',
        'fields' => array(
            'add'       => $fields,
            'edit'      => $fields,
            'duplicate' => $fields,
            'manage'    => $fields,
        ),
    );         

    pods_ui($object);
}

?>