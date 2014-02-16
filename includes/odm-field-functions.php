<?php
function show_odm_firstname ($field_name= 'Contact0FirstName', $required_field=false) {
    ?>
    <div class="odm-form-field-block">
        <span class="odm-form-label">First Name <?php if($required_field==true){echo'*';} ?></span><input name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" size="15" class="odm-form-textinput <?php if($required_field==true){echo'required-text';} ?>" type="text" value="<?php $_GET["Contact0FirstName"]; ?>"/>
    </div>
<?php
}
?>
                
<?php
function show_odm_lastname ($field_name= 'Contact0LastName', $required_field=false) {
    ?>
    <div class="odm-form-field-block">
        <span class="odm-form-label">Last Name <?php if($required_field==true){echo'*';} ?></span><input name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" size="15" class="odm-form-textinput <?php if($required_field==true){echo'required-text';} ?>" type="text" value="<?php $_GET["Contact0LastName"]; ?>" />
    </div>
<?php
}
?>
            
<?php
function show_odm_email ($field_name= 'Contact0Email', $required_field=true) {
    ?>
    <div class="odm-form-field-block">
        <span class="odm-form-label">Email <?php if($required_field==true){echo'*';} ?></span><input name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" size="15" class="odm-form-textinput <?php if($required_field==true){echo'required-email';} ?>" type="text" value="<?php $_GET["Contact0Email"]; ?>"/>
    </div>
<?php
}
?>

<?php
function show_odm_organisation ($required_field=false, $field_name= 'Contact0Company') {
    ?>
    <div class="odm-form-field-block">
        <span class="odm-form-label">Organisation <?php if($required_field==true){echo'*';} ?></span><input name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" size="15" class="odm-form-textinput <?php if($required_field==true){echo'required-text';} ?>" type="text" />
    </div>
<?php
}
?>

<?php
function show_odm_mobile ($required_field=false, $field_name= 'Contact0Phone2') {
    ?>
    <div class="odm-form-field-block">
        <span class="odm-form-label">Mobile <?php if($required_field==true){echo'*';} ?></span><input name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" size="15" class="odm-form-textinput <?php if($required_field==true){echo'required-text';} ?>" type="text" />
    </div>
<?php
}
?>
                                
<?php
function show_odm_website ($required_field=false, $field_name= 'Contact0Website') {
    ?>
    <div class="odm-form-field-block">
        <span class="odm-form-label">Website <?php if($required_field==true){echo'*';} ?></span><input name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" size="15" class="odm-form-textinput <?php if($required_field==true){echo'required-text';} ?>" type="text" />
    </div>
<?php
}
?>


<?php
function show_notesfield ($required_field=false, $field_name= 'infusion_custom_addtonotes', $label_text='Please leave your feedback') {
    ?>
    <div class="odm-form-field-block">
        <span class="odm-form-label"><?php echo $label_text; ?> <?php if($required_field==true){echo'*';} ?></span><textarea name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" class="odm-form-textarea"  cols="40" rows="10" ></textarea>
    </div>
<?php
}
?>



<?php
function show_odm_TipsRequested () {
    ?>
    <div class="odm-form-field-block">
        <span class="odm-form-label">Would you like to receive our weekly digital marketing tips for free.</span>
        <!-- <input name="Contact0_ODMTipsRequested" id="Contact0_ODMTipsRequested" class="odm-form-check" type="checkbox" value="1"/> -->
        <span class="odm-yes-no-radio-button">Yes<input class="odm-form-radio" type="radio" name="BookerTipsRequested" class="check" value="1" >
        No<input class="odm-form-radio" type="radio" name="BookerTipsRequested" class="check" value="0" ></span>

    </div>
<?php
}
?>

<?php
function show_odm_leadsource ($field_name= 'Contact0LeadSourceId') {
    ?>
    <div class="odm-form-field-block">
        <span class="odm-form-label">Where did you hear about this course?</span>    
        <select class="odm-form-select" id="<?php echo $field_name; ?>" name="<?php echo $field_name; ?>" >
            <option value="">Please select one option</option>
            <option value="34">4Networking</option>
            <option value="6">Advertisement</option>
            <option value="28">Business Link</option>
            <option value="30">Business Wealth Club</option>
            <option value="9">Direct Mail</option>
            <option value="11">Google</option>
            <option value="26">IoD</option>
            <option value="44">Referred by a Colleague</option>
            <option value="42">Referred by a Friend</option>
            <option value="36">Other</option>
        </select>
    </div>
    <div class="odm-form-field-block">
        <span class="odm-form-label">If Other - please specify</span>
        <input name="Contact0_OtherLeadSource" id="Contact0_OtherLeadSource" size="15" class="odm-form-textinput" type="text" />
    </div>
    
    
<?php
}
?>






<?php
function show_odm_countrylist ($field_name= 'Address_Country') {
    ?>
    <div class="odm-form-field-block">
        <span class="odm-form-label">Country</span>    

        <select class="odm-form-select" name="<?php echo $field_name; ?>" style="width: 199;">
            <option value="">Choose one...</option>
        
            <option value="GB">United Kingdom</option>
            <option value="US">United States</option>
            <option value="CA">Canada</option>
            <option value="AL">Albania</option>
            <option value="DZ">Algeria</option>
    
            <option value="AS">American Samoa</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antarctica</option>
            <option value="AG">Antigua and Barbuda</option>
    
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaijan</option>
    
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrain</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BY">Belarus</option>
            <option value="BE">Belgium</option>
    
            <option value="BZ">Belize</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermuda</option>
            <option value="BT">Bhutan</option>
            <option value="BO">Bolivia</option>
            <option value="BA">Bosnia-Herzegowina</option>
    
            <option value="BW">Botswana</option>
            <option value="BV">Bouvet Island</option>
            <option value="BR">Brazil</option>
            <option value="BN">Brunei Darussalam</option>
            <option value="BG">Bulgaria</option>
            <option value="BF">Burkina Faso</option>
    
            <option value="BI">Burundi</option>
            <option value="KH">Cambodia</option>
            <option value="CM">Cameroon</option>
            <option value="CV">Cape Verde</option>
            <option value="KY">Cayman Islands</option>
            <option value="TD">Chad</option>
    
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CX">Christmas Island</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comoros</option>
            <option value="CG">Congo</option>
    
            <option value="CK">Cook Islands</option>
            <option value="CR">Costa Rica</option>
            <option value="CI">Cote d'Ivoire</option>
            <option value="HR">Croatia</option>
            <option value="CY">Cyprus</option>
            <option value="CZ">Czech Republic</option>
    
            <option value="DK">Denmark</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="DO">Dominican Republic</option>
            <option value="TP">East Timor</option>
            <option value="EC">Ecuador</option>
    
            <option value="EG">Egypt</option>
            <option value="SV">El Salvador</option>
            <option value="GQ">Equatorial Guinea</option>
            <option value="ER">Eritrea</option>
            <option value="EE">Estonia</option>
            <option value="ET">Ethiopia</option>
    
            <option value="FK">Falkland Islands</option>
            <option value="FO">Faroe Islands</option>
            <option value="FJ">Fiji</option>
            <option value="FI">Finland</option>
            <option value="FR">France</option>
            <option value="GF">French Guiana</option>
    
            <option value="PF">French Polynesia</option>
            <option value="GA">Gabon</option>
            <option value="GM">Gambia</option>
            <option value="GE">Georgia</option>
            <option value="DE">Germany</option>
            <option value="GH">Ghana</option>
    
            <option value="GI">Gibraltar</option>
            <option value="GR">Greece</option>
            <option value="GL">Greenland</option>
            <option value="GD">Grenada</option>
            <option value="GP">Guadeloupe</option>
            <option value="GT">Guatemala</option>
    
            <option value="GN">Guinea</option>
            <option value="GW">Guinea-Bissau</option>
            <option value="GY">Guyana</option>
            <option value="HT">Haiti</option>
            <option value="HN">Honduras</option>
            <option value="HK">Hong Kong</option>
    
            <option value="HU">Hungary</option>
            <option value="IS">Iceland</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IE">Ireland</option>
            <option value="IL">Israel</option>
    
            <option value="IT">Italy</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japan</option>
            <option value="JO">Jordan</option>
            <option value="KZ">Kazakhstan</option>
            <option value="KE">Kenya</option>
    
            <option value="KI">Kiribati</option>
            <option value="KP">Korea (South)</option>
            <option value="KR">Korea, Republic of</option>
            <option value="KW">Kuwait</option>
            <option value="KG">Kyrgyzstan</option>
            <option value="LA">Laos</option>
    
            <option value="LV">Latvia</option>
            <option value="LB">Lebanon</option>
            <option value="LS">Lesotho</option>
            <option value="LR">Liberia</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lithuania</option>
    
            <option value="LU">Luxembourg</option>
            <option value="MO">Macau</option>
            <option value="MK">Macedonia</option>
            <option value="MG">Madagascar</option>
            <option value="MW">Malawi</option>
            <option value="MY">Malaysia</option>
    
            <option value="MV">Maldives</option>
            <option value="ML">Mali</option>
            <option value="MT">Malta</option>
            <option value="MH">Marshall Islands</option>
            <option value="MQ">Martinique</option>
            <option value="MR">Mauritania</option>
    
            <option value="MU">Mauritius</option>
            <option value="YT">Mayotte</option>
            <option value="MX">Mexico</option>
            <option value="FM">Micronesia</option>
            <option value="MD">Moldova, Republic of</option>
            <option value="MC">Monaco</option>
    
            <option value="MN">Mongolia</option>
            <option value="MS">Montserrat</option>
            <option value="MA">Morocco</option>
            <option value="MZ">Mozambique</option>
            <option value="MM">Myanmar</option>
            <option value="NA">Namibia</option>
    
            <option value="NR">Nauru</option>
            <option value="NP">Nepal</option>
            <option value="NL">Netherlands</option>
            <option value="AN">Netherlands Antilles</option>
            <option value="NC">New Caledonia</option>
            <option value="NZ">New Zealand</option>
    
            <option value="NI">Nicaragua</option>
            <option value="NE">Niger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk Island</option>
            <option value="NO">Norway</option>
    
            <option value="OM">Oman</option>
            <option value="PK">Pakistan</option>
            <option value="PW">Palau</option>
            <option value="PA">Panama</option>
            <option value="PG">Papua New Guinea</option>
            <option value="PY">Paraguay</option>
    
            <option value="PE">Peru</option>
            <option value="PH">Philippines</option>
            <option value="PN">Pitcairn</option>
            <option value="PL">Poland</option>
            <option value="PT">Portugal</option>
            <option value="QA">Qatar</option>
    
            <option value="RE">Reunion</option>
            <option value="RO">Romania</option>
            <option value="RU">Russian Federation</option>
            <option value="RW">Rwanda</option>
            <option value="KN">Saint Kitts and Nevis</option>
            <option value="LC">Saint Lucia</option>
    
            <option value="WS">Samoa (Independent)</option>
            <option value="ST">Sao Tome and Principe</option>
            <option value="SA">Saudi Arabia</option>
            <option value="SN">Senegal</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leone</option>
    
            <option value="SG">Singapore</option>
            <option value="SK">Slovakia</option>
            <option value="SI">Slovenia</option>
            <option value="SB">Solomon Islands</option>
            <option value="SO">Somalia</option>
            <option value="ZA">South Africa</option>
    
            <option value="ES">Spain</option>
            <option value="LK">Sri Lanka</option>
            <option value="SH">St. Helena</option>
            <option value="SR">Suriname</option>
            <option value="SZ">Swaziland</option>
            <option value="SE">Sweden</option>
    
            <option value="CH">Switzerland</option>
            <option value="TW">Taiwan</option>
            <option value="TJ">Tajikistan</option>
            <option value="TZ">Tanzania</option>
            <option value="TH">Thailand</option>
            <option value="TG">Togo</option>
    
            <option value="TK">Tokelau</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad and Tobago</option>
            <option value="TN">Tunisia</option>
            <option value="TR">Turkey</option>
            <option value="TM">Turkmenistan</option>
    
            <option value="TV">Tuvalu</option>
            <option value="UG">Uganda</option>
            <option value="UA">Ukraine</option>
            <option value="AE">United Arab Emirates</option>
            <option value="UY">Uruguay</option>
    
            <option value="UZ">Uzbekistan</option>
            <option value="VU">Vanuatu</option>
            <option value="VA">Vatican City</option>
            <option value="VE">Venezuela</option>
            <option value="VN">Viet Nam</option>
            <option value="EH">Western Sahara</option>
    
            <option value="YE">Yemen</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabwe</option>
            <option value="__">Other</option>
        </select>
    </div>
<?php
}
?>
        


<?php
function show_odm_industry () {
?>
    <div class="odm-form-field-block">
        <span class="odm-form-label">Industry</span>    

        <select class="odm-form-select" name="Industry" style="width: 199;">
            <option value="">Choose one...</option>
            <option value="Accounting">Accounting</option>
            <option value="Advertising/Marketing/PR">Advertising/Marketing/PR</option>
            <option value="Aerospace & Defense">Aerospace & Defense</option>
            <option value="Banking & Securities">Banking & Securities</option>

            <option value="Call Center Outsourcing">Call Center Outsourcing</option>
            <option value="Consulting">Consulting</option>
            <option value="Education">Education</option>
            <option value="Energy, Chemical, Utilities">Energy, Chemical, Utilities</option>
            <option value="Financial Services - Other">Financial Services - Other</option>
            <option value="Government - Federal">Government - Federal</option>

            <option value="Government - State & Local">Government - State & Local</option>
            <option value="High Tech - Hardware">High Tech - Hardware</option>
            <option value="High Tech - ISP">High Tech - ISP</option>
            <option value="High Tech - Other">High Tech - Other</option>
            <option value="Hospital, Clinic, Doctor Office">Hospital, Clinic, Doctor Office</option>
            <option value="Hospitality, Travel, Tourism">Hospitality, Travel, Tourism</option>

            <option value="Insurance">Insurance</option>
            <option value="Legal">Legal</option>
            <option value="Manufacturing">Manufacturing</option>
            <option value="Medical, Pharma, Biotech">Medical, Pharma, Biotech</option>
            <option value="Real Estate">Real Estate</option>
            <option value="Retail">Retail</option>

            <option value="Software - Finance">Software - Finance</option>
            <option value="Software - Healthcare">Software - Healthcare</option>
            <option value="Software - Other">Software - Other</option>
            <option value="Support Outsourcing">Support Outsourcing</option>
            <option value="Telecommunications">Telecommunications</option>
            <option value="Transportation & Distribution">Transportation & Distribution</option>

            <option value="VAR/Systems Integrator">VAR/Systems Integrator</option>
            <option value="Other">Other</option>
        </select>
    </div>
<?php
}
?>
