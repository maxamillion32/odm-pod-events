<?php

    // Init plugin options to white list our options
    function odm_paid_event_init(){
        register_setting( 'odm_paid_event_plugin_settings', 'odm_paid_event_trans_id' );
    }

    add_action('admin_init', 'odm_paid_event_init' );
    add_shortcode('show_odm_event','show_odm_event');

    $TransactionID = get_option('odm_paid_event_trans_id');
    
    if ($TransactionID == "") $TransactionID = 0;

    // increment TransactionID
    $TransactionID++;
    
    update_option('odm_paid_event_trans_id', $TransactionID);
    setcookie("EventTransactionID", $TransactionID, 0, '/'); // set cookie to be picked on success
    
    function show_odm_event() {
        global $TransactionID;
        
        $thisDate = $myODMevent->start_date;
        $infusionsoftFormName = "ODM Intro Event Sign-Up (paid)";
        
        $params = array(
            'where'   => 'id = '.$_GET[event_date_id],
            'limit'   => 1
        );

        // Create and find in one shot
        $events = pods( 'odm_event_dates' ) ->find( $params );

        if ( 0 < $events->total() ) {
            $events->fetch();

        setcookie("infusionsoft_regstarted_tagid", $events->display('event.infusionsoft_regstarted_tagid'), 0, '/'); // set cookie to be picked on success
            
    ?>

        <div id="odm-eventregpage">
            <div id="odm-eventregpage-left-col">
                <h1><?php echo $events->display('name'); ?> <br /> 
                <?php echo $events->display('venue.city'); ?> - <?php echo date("l, jS F Y", strtotime($events->display('event_date'))) ?> </h1>
                <p style="padding-top:15px; font-weight:bold;">To register for <?php echo $myODMevent->title; ?> on <?php echo date("l, jS F Y", strtotime($events->display('event_date'))) ?> 
                please complete the form below for each attendee. <br/>
                
                An email will be sent to each attendee you register requesting their approval.  <br/>
                If you'd like to discuss bringing a group from your company, please contact us on +44 (0)1865 57 59 55 or via the <a href="/contact-us/">contact-us</a> page.</p>
                
                <div id="odm-form" style="width: 570px;">
                
                <form action="<?php echo WP_PLUGIN_URL.'/odm-pod-events/includes/' ?>odm-paid-event-is-api.php" method='POST' id="odm-free-event-form">
                <input name="TransactionID" type="hidden" value="<?php echo $TransactionID; ?>" id="TransactionID" />
                <input name="Contact0_ODMEventName" value="<?php echo $events->display('name'); ?>" type="hidden" id="Contact0_ODMEventName" />
                <input name="Contact0_ODMEventDate" value="<?php echo date("d/m/Y", strtotime($events->display('event_date'))); ?>" type="hidden" id="Contact0_ODMEventDate" />
                <input name="Contact0_ODMEventLocation" value="<?php echo $events->display('venue.name'); ?>" type="hidden" id="Contact0_ODMEventLocation" />
                <input name="Contact0_ODMEventID" value="<?php echo $_GET[event_date_id]; ?>" type="hidden" id="Contact0_ODMEventID" />
                <input name="IS_productID" value="<?php echo $events->display('event.infusionsoft_productid'); ?>" type="hidden" id="IS_productID" />
                <input name="infusionsoft_regstarted_tagid" value="<?php echo $events->display('event.infusionsoft_regstarted_tagid'); ?>" type="hidden" id="infusionsoft_regstarted_tagid" />
                <input name="infusion_datefieldname" value="<?php echo $events->display('event.infusion_datefieldname'); ?>" type="hidden" id="infusion_datefieldname" />
                <input name="infusion_locationfieldname" value="<?php echo $events->display('event.infusion_locationfieldname'); ?>" type="hidden" id="infusion_locationfieldname" />
                <input name="AttendeeCount" value="1" type="hidden" id="AttendeeCount" />
                
                    <fieldset class="odm-form-fieldset">
                    <legend class="odm-form-legend">Your Details</legend>
                        <?php show_odm_firstname('BookerFirstName',true); ?>
                                
                        <?php show_odm_lastname('BookerLastName',true); ?>
                                
                        <?php show_odm_email('BookerEmail'); ?>
                
                        <?php show_odm_mobile(true, 'BookerPhone'); ?>
                    
                        <?php show_odm_organisation(true, 'BookerCompany'); ?>
                        
                        <?php show_odm_website(true, 'BookerWebsite'); ?>
                        
                        <?php show_odm_leadsource(); ?>
                        
                        <?php show_odm_TipsRequested(); ?>
                    </fieldset>
                    
                    <fieldset class="odm-form-fieldset">
                    <legend class="odm-form-legend">Who will be attending?</legend>
                        <div class="odm-form-field-block">
                            <span class="odm-form-label">Will you be attending the event? *</span>
                            <span class="odm-yes-no-radio-button">
                                <label for="BookerAttendingYes">Yes</label><input checked="checked" name="BookerAttending" id="BookerAttendingYes" class="odm-form-radio" type="radio" value="yes"/>
                                <label for="BookerAttendingNo">No</label><input name="BookerAttending" id="BookerAttendingNo" class="odm-form-radio" type="radio" value="no"/>
                        </div>
                        <div id="Attendee1"></div>
                        
                        <div id="AttendeePlaceHolder"></div>
                        
                        <div class="odm-form-field-block">
                        <a href="javascript:void(null);" onclick="AddAttendee();">+ Add another attendee</a>
                        </div>                
                        <div>
                            <input id="Submit" class="register-button"  name="Submit" type="submit" value="Register Now" />
                        </div>
                
                    </fieldset>
                    * Fields marked with an asterix (*) are required fields.  Your details are safe with us, we never give your details to any other company.
                </form>
                
                </div>
            </div>
            
            <div id="odm-eventregpage-right-col">
                
                <div class="panel_280">
                    <div class="panel_head2"><h2>When</h2></div>

                    <div class="panel_body" id="panel_when">
                        <b><span class="dtstart"><?php echo date("l, jS, F, Y", strtotime($events->display('event_date'))) ?> <br />from <?php echo date("H:i A", strtotime($events->display('event_date'))); ?> - <?php echo date("H:i A", strtotime($myODMevent->end_time)); ?> (GMT)
                        </b>                         
                    </div>
                            
                </div>
            
                <?php if ($events->display('event.event_price') > 0) { ?>
                <div class="panel_280">
                    <div class="panel_head2"><h2>Cost</h2></div>

                    <div class="panel_body" id="panel_when">
                        <b>The event costs &pound;<?php echo $events->display('event.event_price'); ?> + VAT</h2></b>                         
                    </div>
                            
                </div>
                <?php } ?>
            
            <div class="panel_280">
                        <div class="panel_head2"><h2>Where</h2></div>

                        <div class="panel_body location vcard" id="panel_address"> 
                              <b><span class="fn org"><?php echo nl2br($events->display('venue.full_address')); ?></span></b>
                              <br />
                            <img height="260" width="310" marginheight="0" marginwidth="0" name="googlemap" src="http://maps.google.com/maps/api/staticmap?center=<?php echo $events->display('venue.latitude'); ?>,<?php echo $events->display('venue.longitude'); ?>&zoom=12&size=310x260&sensor=false&markers=color:EE6600|label:i|<?php echo $events->display('venue.longitude'); ?>,<?php echo $events->display('venue.longitude'); ?>&output=embed" />
                                <span class="geo">  <!-- SEO, not css -->
                                       <span class="latitude">
                                          <span class="value-title" title="<?php echo $events->display('venue.latitude'); ?>" ></span>
                                       </span>
                                       <span class="longitude">
                                          <span class="value-title" title="<?php echo $events->display('venue.longitude'); ?>" ></span>
                                       </span>
                                </span>
                            </iframe>

                            <br />
                            <p><b>More detailed map:</b>
                            <a href="<?php echo $events->display('venue.googlemaplink'); ?>" target="_blank">Google Maps</a></p>
                                    
                                    
                                
                        </div>
                        <!-- end panel_body -->

                    </div><!-- end panel_280 -->

            </div>
        </div>
    <?php
        }
    }
    ?>
