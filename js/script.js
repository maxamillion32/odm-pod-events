// form validation
jQuery().ready(function() {
    // reset attendee count
    jQuery('#AttendeeCount').val('1');
    
    ValidateForm();
    
    jQuery('input[name="BookerAttending"]').change(function() {
         var selectedOption = jQuery(this).val();
         
         if (selectedOption == 'yes') {
            jQuery('#Attendee1').html('');
         }
         else {
            jQuery('#Attendee1').html('<fieldset class="odm-form-fieldset" id="attendee1" style=""><legend class="odm-form-legend">Attendee 1 Contact Details</legend><div class="odm-form-field-block"><span class="odm-form-label">First Name *</span><input name="Contact1FirstName" id="Contact1FirstName" size="15" class="odm-form-textinput required-text" type="text" value=""></div><div class="odm-form-field-block"><span class="odm-form-label">Last Name *</span><input name="Contact1LastName" id="Contact1LastName" size="15" class="odm-form-textinput required-text" type="text" value=""></div><div class="odm-form-field-block"><span class="odm-form-label">Email *</span><input name="Contact1Email" id="Contact1Email" size="15" class="odm-form-textinput required-email" type="text" value=""></div><div class="odm-form-field-block"><span class="odm-form-label">Mobile *</span><input name="Contact1Phone" id="Contact1Phone" size="15" class="odm-form-textinput required-text" type="text"></div></fieldset>');
            ValidateForm();
         }
    });
    
    // Check if cookies are enabled
    // remember, these are the possible parameters for Set_Cookie:
    // name, value, expires, path, domain, secure
    Set_Cookie( 'test', 'none', '', '/', '', '' );
    // if Get_Cookie succeeds, cookies are enabled, since
    //the cookie was successfully created.
    if ( Get_Cookie( 'test' ) )
    {
        cookie_set = true;
        // and these are the parameters for Delete_Cookie:
        // name, path, domain
        // make sure you use the same parameters in Set and Delete Cookie.
        Delete_Cookie('test', '/', '');
    }
    // if the Get_Cookie test fails, cookies
    //are not enabled for this session.
    else
    {
        jQuery('#odm-form').html('Sorry, cookies must be enabled on your browser to make a booking, please enable them and try again.');
        cookie_set = false;
    }
    
});

function ValidateForm() {
    // validate the form
    jQuery('#odm-free-event-form').validate({
        rules: {
            BookerLead: { required: true },
            BookerTipsRequested: { required: true }
             },
        messages: {
            BookerLead: "Please select a value",
            BookerTipsRequested: "Please choose Yes or No"
            }
    });

    jQuery('.required-text').each(function() {
        jQuery(this).rules('add', {
            required: true,
            messages: {
                required:  "This field is required "
            }
        });
    });
    
    jQuery('.required-email').each(function() {
        jQuery(this).rules('add', {
            required: true,
            email: true,
            messages: {
                required:  "Please enter a valid email address "
            }
        });
    });
}


// add attendee rows
function AddAttendee() {
    
    var AttendeeCount = jQuery('#AttendeeCount').val();
    // increment to include new attendee
    AttendeeCount++;
    
    var Content = '<fieldset class="odm-form-fieldset"><legend class="odm-form-legend">Attendee ' + AttendeeCount + ' Contact Details</legend><div class="odm-form-field-block"><span class="odm-form-label">First Name *</span><input name="Contact' + AttendeeCount + 'FirstName" id="Contact' + AttendeeCount + 'FirstName" size="15" class="odm-form-textinput required-text" type="text" value=""></div><div class="odm-form-field-block"><span class="odm-form-label">Last Name *</span><input name="Contact' + AttendeeCount + 'LastName" id="Contact' + AttendeeCount + 'LastName" size="15" class="odm-form-textinput required-text" type="text" value=""></div><div class="odm-form-field-block"><span class="odm-form-label">Email *</span><input name="Contact' + AttendeeCount + 'Email" id="Contact' + AttendeeCount + 'Email" size="15" class="odm-form-textinput required-email" type="text" value=""></div><div class="odm-form-field-block"><span class="odm-form-label">Mobile *</span><input name="Contact' + AttendeeCount + 'Phone" id="Contact' + AttendeeCount + 'Phone" size="15" class="odm-form-textinput required-text" type="text"></div></fieldset>';
    
    
    jQuery('#AttendeePlaceHolder').append(Content);
    
    // increment AttendeeCount field
    jQuery('#AttendeeCount').val(AttendeeCount);
    
    ValidateForm();
}