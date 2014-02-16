<?php
$show_debug = true;

add_shortcode('odm_process_event_order','process_order');

function process_order() {
    require(WP_PLUGIN_DIR."/infusionsoft/isdk.php"); 
    
    //build our application object 
    $app = new iSDK;
    //connect to the API
    if($app->cfgCon("odmconn")){
        Debug("app connected!"); 
    }    
    else {
        Debug("connection failed!"); 
    }
    
    // get passed data
    //$contact_id = $_GET['contactId'];
    $order_id = $_GET['orderId'];
    
    // get trans id from contact
    //$returnFields = array('_EventTransactionID');
    //$conDat = $app->loadCon($contact_id, $returnFields);
    
    //$event_transaction_id = $conDat['_EventTransactionID'];
    $event_transaction_id = $_COOKIE['EventTransactionID'];
    // expire cookie
    setcookie("EventTransactionID", "", time()-3600);
    
    // update order
    $dat = array('_OrderEventTransactionID' => $event_transaction_id);

    $jobId = $app->dsUpdate("Job", $order_id, $dat);
    Debug('UPDATE: _OrderEventTransactionID = '.$event_transaction_id);
    
    
    // find all contacts associated with this order and add tag
}

function Debug($debug_text) {
    global $show_debug;
    
    if ($show_debug) {
        echo "<p style=\"color: red;\">$debug_text</p>";
    }
}
  
?>