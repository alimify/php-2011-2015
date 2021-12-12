<?php

/************************************

Script : Adnetwork
Website : http://facebook.com/pranto007

Script is created and provided by Pranto (http://facebook.com/pranto007)
**************************************/

include 'db.php';
include 'functions.php';

headtag("$SiteName Registration");

 if($userlog==1){
   header('Location:/');
   }
  else{
 $ref=formget("refer");      if(isset($_POST['firstname']) AND isset($_POST['lastname']) AND isset($_POST['address1']) AND isset($_POST['address2']) AND isset($_POST['state']) AND isset($_POST['city']) AND isset($_POST['zip']) AND isset($_POST['country']) AND isset($_POST['mobile']) AND isset($_POST['email']) AND isset($_POST['password1']) AND isset($_POST['password2']) AND isset($_POST['captcha'])){

$refer=formpost("refer");
$firstname=formpost("firstname");
$lastname=formpost("lastname");
$address1=formpost("address1");
$address2=formpost("address2");
$state=formpost("state");
$city=formpost("city");
$zip=formpost("zip");
$country=formpost("country");
$mobile=formpost("mobile");
$email=formpost("email");
$password1=formpost("password1");
$password2=formpost("password2");
$captcha=formpost("captcha");
$captcha=strtoupper($captcha);
$terms=formpost("terms");

//Codes
$errors=array();
unset($errors);

//Empty
if(strlen($firstname)<1){
$errors[]='First name field left empty!';
}

if(strlen($lastname)<1){
$errors[]='Last name field left empty!';
}

if(strlen($address1)<1){
$errors[]='Primary address field left empty!';
}

if(strlen($city)<1){
$errors[]='City field left empty!';
}

if(strlen($zip)<1){
$errors[]='Zipcode field left empty!';
}

if(strlen($country)<1){
$errors[]='Country field left empty!';
}

if(strlen($email)<1){
$errors[]='Email field left empty!';
}

if(strlen($password1)<1){
$errors[]='Password field left empty!';
}


if(strlen($password2)<1){
$errors[]='Verify password field left empty!';
}

if(strlen($captcha)<1){
$errors[]='Captcha field left empty!';
}

if(!preg_match('/^([a-zA-Z0-9_.-]+)\@([a-zA-Z0-9_.-]+)\.([a-zA-Z0-9_.-]+)$/', $email)){
$errors[]='Email is not valid!';
}

if(!is_numeric($zip)){
$errors[]='Zipcode is not valid!';
}

if($password1!=$password2){
$errors[]='Passwords didn\'t match!';
}

if($_SESSION['captcha']!=$captcha){
$errors[]='Captcha code entered is wrong!';
}

if($terms!=1){$errors[]='You must agree to our terms!';}
$emch=mysql_query("SELECT * FROM userdata WHERE email='$email'");

if(mysql_num_rows($emch)>0){
$errors[]='Email already registered with another account!';
}
$unch=mysql_query("SELECT * FROM userdata WHERE firstname='$firstname'");

if(mysql_num_rows($unch)>0){
$errors[]='UserName already registered with another account!';
}
if(empty($errors)){
  $password=md5($password1);
 if($refer=="")
{
echo '';
}
else 
{ 
mysql_query("INSERT INTO ref (refid, refuser, validated, site) VALUES ('$refer', '$firstname', '0', '$email')");

}
 
$doreg=mysql_query("INSERT INTO userdata (email,password,firstname,lastname,address1,address2,state,city,zipcode,country,mobile,status,adbalance,pubalance) VALUES ('$email','$password','$firstname','$lastname','$address1','$address2','$state','$city','$zip','$country','$mobile','INACTIVE','0.00','0.00')");

  if($doreg){
$user_data=mysql_query("SELECT * FROM userdata WHERE email='$email'");
$userdat=mysql_fetch_array($user_data);
$userid=$userdat['id'];

  $token=md5(microtime());
  $dover=mysql_query("INSERT INTO verification (userid,token) VALUES ('$userid','$token')");


    $to      = $email;
    $subject = 'Registration at DollarMob';
    $message = 'Dear '.$userdat["lastname"].',
Welcome to DollarMob Advertise Network!

Just one more step to complete your registration with DollarMob! Please click bellow link or alternatively copy and paste the url to your browser!

http://dollarmob.com/verify/'.$userid.'/'.$token.'


Once you completed the registration procedure you can add your mobile site and start earning revenue!


Support:
'.$Adminmail.'

Thanks,
DollarMob Team,
DollarMob.Com';
    $headers = 'From: DollarMob.Com<'.$Adminmail.'>' . "\r\n" .
    'Reply-To: '.$Adminmail.'' . "\r\n" .
    'X-Mailer: DollarMob';

    mail($to, $subject, $message, $headers);


$_SESSION['adsgem_email']=$email;
$_SESSION['adsgem_password']=$password;

header('Location:/user/dashboard');
}
else {
echo 'unknown error!';
}
}
else {
echo '<div class="title"><img src="/error.png"/> <font color="red">Error happened!</font></div>';

echo '<div class="error">';

foreach($errors as $error){
echo '- '.$error.'<br/>';
}
echo '</div>';
}
    

//END

}

echo '<div class="title">Registration</div>';
echo '<div class="form"><div id="forgot">
<b>Personal Information:</b></div>
<form method="post">
<input type="hidden" name="refer" value="'.$ref.'" />
<label for="lastname">Full Name:<font color="red">*</font></label><br/><input type="text" name="lastname"/><br/><label for="address1">Address 1:<font color="red">*</font></label><br/><textarea name="address1"></textarea><br/><label for="address2">Address 2:</label><br/><textarea name="address2"></textarea><br/><label for="state">State / Region:</label><br/><input type="text" name="state"/><br/><label for="city">City:<font color="red">*</font></label><br/><input type="text" name="city"/><br/><label for="zip">Zip / Postal Code:<font color="red">*</font></label><br/><input type="text" name="zip"/><br/><label for="country">Country:<font color="red">*</font></label><br/><select name="country">
                <option value="" selected="selected">Select Country:</option>
		<option value="Afghanistan">Afghanistan</option>
		<option value="Albania">Albania</option>
		<option value="Algeria">Algeria</option>
		<option value="American Samoa">American Samoa</option>
		<option value="Andorra">Andorra</option>
		<option value="Angola">Angola</option>
		<option value="Anguilla">Anguilla</option>
		<option value="Antarctica">Antarctica</option>
		<option value="Antigua and Barbuda">Antigua and Barbuda</option>
		<option value="Argentina">Argentina</option>
		<option value="Armenia">Armenia</option>
		<option value="Aruba">Aruba</option>		<option value="Australia">Australia</option>
		<option value="Austria">Austria</option>		<option value="Azerbaijan">Azerbaijan</option>		<option value="Bahamas">Bahamas</option>
		<option value="Bahrain">Bahrain</option>
		<option value="Bangladesh">Bangladesh</option>
		<option value="Barbados">Barbados</option>
		<option value="Belarus">Belarus</option>
		<option value="Belgium">Belgium</option>
		<option value="Belize">Belize</option>
		<option value="Benin">Benin</option>		<option value="Bermuda">Bermuda</option>
		<option value="Bhutan">Bhutan</option>
		<option value="Bolivia">Bolivia</option>		<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
		<option value="Botswana">Botswana</option>		<option value="Bouvet Island">Bouvet Island</option>
		<option value="Brazil">Brazil</option>
		<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
		<option value="Brunei Darussalam">Brunei Darussalam</option>
		<option value="Bulgaria">Bulgaria</option>
		<option value="Burkina Faso">Burkina Faso</option>
		<option value="Burundi">Burundi</option>
		<option value="Cambodia">Cambodia</option>
		<option value="Cameroon">Cameroon</option>
		<option value="Canada">Canada</option>
		<option value="Cape Verde">Cape Verde</option>
		<option value="Cayman Islands">Cayman Islands</option>
		<option value="Central African Republic">Central African Republic</option>
		<option value="Chad">Chad</option>
		<option value="Chile">Chile</option>
		<option value="China">China</option>
		<option value="Christmas Island">Christmas Island</option>
		<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
		<option value="Colombia">Colombia</option>
		<option value="Comoros">Comoros</option>
		<option value="Congo">Congo</option>
		<option value="Cook Islands">Cook Islands</option>
		<option value="Costa Rica">Costa Rica</option>
		<option value="Cote D\'ivoire">Cote D\'ivoire</option>
		<option value="Croatia">Croatia</option>
		<option value="Cuba">Cuba</option>
		<option value="Cyprus">Cyprus</option>
		<option value="Czech Republic">Czech Republic</option>
		<option value="Denmark">Denmark</option>
		<option value="Djibouti">Djibouti</option>
		<option value="Dominica">Dominica</option>
		<option value="Dominican Republic">Dominican Republic</option>
		<option value="Ecuador">Ecuador</option>
		<option value="Egypt">Egypt</option>
		<option value="El Salvador">El Salvador</option>
		<option value="Equatorial Guinea">Equatorial Guinea</option>
		<option value="Eritrea">Eritrea</option>
		<option value="Estonia">Estonia</option>
		<option value="Ethiopia">Ethiopia</option>
		<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
		<option value="Faroe Islands">Faroe Islands</option>
		<option value="Fiji">Fiji</option>
		<option value="Finland">Finland</option>
		<option value="France">France</option>
		<option value="French Guiana">French Guiana</option>
		<option value="French Polynesia">French Polynesia</option>
		<option value="French Southern Territories">French Southern Territories</option>
		<option value="Gabon">Gabon</option>
		<option value="Gambia">Gambia</option>
		<option value="Georgia">Georgia</option>
		<option value="Germany">Germany</option>
		<option value="Ghana">Ghana</option>
		<option value="Gibraltar">Gibraltar</option>
		<option value="Greece">Greece</option>
		<option value="Greenland">Greenland</option>
		<option value="Grenada">Grenada</option>
		<option value="Guadeloupe">Guadeloupe</option>
		<option value="Guam">Guam</option>
		<option value="Guatemala">Guatemala</option>
		<option value="Guinea">Guinea</option>
		<option value="Guinea-bissau">Guinea-bissau</option>
		<option value="Guyana">Guyana</option>
		<option value="Haiti">Haiti</option>
	
		<option value="Honduras">Honduras</option>
		<option value="Hong Kong">Hong Kong</option>
		<option value="Hungary">Hungary</option>
		<option value="Iceland">Iceland</option>
		<option value="India">India</option>
		<option value="Indonesia">Indonesia</option>
		<option value="Iran, Islamic Republic of">Iran</option>
		<option value="Iraq">Iraq</option>
		<option value="Ireland">Ireland</option>
		<option value="Israel">Israel</option>
		<option value="Italy">Italy</option>
		<option value="Jamaica">Jamaica</option>
		<option value="Japan">Japan</option>
		<option value="Jordan">Jordan</option>
		<option value="Kazakhstan">Kazakhstan</option>
		<option value="Kenya">Kenya</option>
		<option value="Kiribati">Kiribati</option>
		<option value="Korea, Republic of">Korea</option>
		<option value="Kuwait">Kuwait</option>
		<option value="Kyrgyzstan">Kyrgyzstan</option>
		<option value="Latvia">Latvia</option>
		<option value="Lebanon">Lebanon</option>
		<option value="Lesotho">Lesotho</option>
		<option value="Liberia">Liberia</option>
		<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
		<option value="Liechtenstein">Liechtenstein</option>
		<option value="Lithuania">Lithuania</option>
		<option value="Luxembourg">Luxembourg</option>
		<option value="Macao">Macao</option>
		
		<option value="Madagascar">Madagascar</option>
		<option value="Malawi">Malawi</option>
		<option value="Malaysia">Malaysia</option>
		<option value="Maldives">Maldives</option>
		<option value="Mali">Mali</option>
		<option value="Malta">Malta</option>
		<option value="Marshall Islands">Marshall Islands</option>
		<option value="Martinique">Martinique</option>
		<option value="Mauritania">Mauritania</option>
		<option value="Mauritius">Mauritius</option>
		<option value="Mayotte">Mayotte</option>
		<option value="Mexico">Mexico</option>
		<option value="Monaco">Monaco</option>
		<option value="Mongolia">Mongolia</option>
		<option value="Montserrat">Montserrat</option>
		<option value="Morocco">Morocco</option>
		<option value="Mozambique">Mozambique</option>
		<option value="Myanmar">Myanmar</option>
		<option value="Namibia">Namibia</option>
		<option value="Nauru">Nauru</option>
		<option value="Nepal">Nepal</option>
		<option value="Netherlands">Netherlands</option>
		<option value="Netherlands Antilles">Netherlands Antilles</option>
		<option value="New Caledonia">New Caledonia</option>
		<option value="New Zealand">New Zealand</option>
		<option value="Nicaragua">Nicaragua</option>
		<option value="Niger">Niger</option>
		<option value="Nigeria">Nigeria</option>
		<option value="Niue">Niue</option>
		<option value="Norfolk Island">Norfolk Island</option>
		<option value="Norway">Norway</option>
		<option value="Oman">Oman</option>
		<option value="Pakistan">Pakistan</option>
		<option value="Palau">Palau</option>
		<option value="Panama">Panama</option>
		<option value="Papua New Guinea">Papua New Guinea</option>
		<option value="Paraguay">Paraguay</option>
		<option value="Peru">Peru</option>
		<option value="Philippines">Philippines</option>
		<option value="Pitcairn">Pitcairn</option>
		<option value="Poland">Poland</option>
		<option value="Portugal">Portugal</option>
		<option value="Puerto Rico">Puerto Rico</option>
		<option value="Qatar">Qatar</option>
		<option value="Reunion">Reunion</option>
		<option value="Romania">Romania</option>
		<option value="Russian Federation">Russian Federation</option>
		<option value="Rwanda">Rwanda</option>
		<option value="Saint Helena">Saint Helena</option>
		<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
		<option value="Saint Lucia">Saint Lucia</option>
		<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
		<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
		<option value="Samoa">Samoa</option>
		<option value="San Marino">San Marino</option>
		<option value="Sao Tome and Principe">Sao Tome and Principe</option>
		<option value="Saudi Arabia">Saudi Arabia</option>
		<option value="Senegal">Senegal</option>
		<option value="Serbia and Montenegro">Serbia and Montenegro</option>
		<option value="Seychelles">Seychelles</option>
		<option value="Sierra Leone">Sierra Leone</option>
		<option value="Singapore">Singapore</option>
		<option value="Slovakia">Slovakia</option>
		<option value="Slovenia">Slovenia</option>
		<option value="Solomon Islands">Solomon Islands</option>
		<option value="Somalia">Somalia</option>
		<option value="South Africa">South Africa</option>
		
		<option value="Spain">Spain</option>
		<option value="Sri Lanka">Sri Lanka</option>
		<option value="Sudan">Sudan</option>
		<option value="Suriname">Suriname</option>
		<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
		<option value="Swaziland">Swaziland</option>
		<option value="Sweden">Sweden</option>
		<option value="Switzerland">Switzerland</option>
		<option value="Syrian Arab Republic">Syrian Arab Republic</option>
		<option value="Taiwan, Province of China">Taiwan, Province of China</option>
		<option value="Tajikistan">Tajikistan</option>
		<option value="Tanzania, United Republic of">Tanzania</option>
		<option value="Thailand">Thailand</option>
		<option value="Timor-leste">Timor-leste</option>
		<option value="Togo">Togo</option>
		<option value="Tokelau">Tokelau</option>
		<option value="Tonga">Tonga</option>
		<option value="Trinidad and Tobago">Trinidad and Tobago</option>
		<option value="Tunisia">Tunisia</option>
		<option value="Turkey">Turkey</option>
		<option value="Turkmenistan">Turkmenistan</option>
		<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
		<option value="Tuvalu">Tuvalu</option>
		<option value="Uganda">Uganda</option>
		<option value="Ukraine">Ukraine</option>
		<option value="United Arab Emirates">United Arab Emirates</option>
		<option value="United Kingdom">United Kingdom</option>
		<option value="United States">United States</option>
		<option value="Uruguay">Uruguay</option>
		<option value="Uzbekistan">Uzbekistan</option>
		<option value="Vanuatu">Vanuatu</option>
		<option value="Venezuela">Venezuela</option>
		<option value="Viet Nam">Viet Nam</option>
		<option value="Virgin Islands, British">Virgin Islands, British</option>
		<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
		<option value="Wallis and Futuna">Wallis and Futuna</option>
		<option value="Western Sahara">Western Sahara</option>
		<option value="Yemen">Yemen</option>
		<option value="Zambia">Zambia</option>
		<option value="Zimbabwe">Zimbabwe</option>
  </select><br/><label for="mobile">Mobile No:</label><br/><input type="text" name="mobile"/><br/><div id="forgot"><b>Account Information:</b></div><label for="firstname">UserName:<font color="red">*</font></label><br/><input type="text" name="firstname"/><br/><label for="email">Email:<font color="red">*</font></label><br/><input type="text" name="email"/><br/><label for="password1">Password:<font color="red">*</font></label><br/><input type="password" name="password1"/><br/><label for="password2">Verify Password:<font color="red">*</font></label><br/><input type="password" name="password2"/><br/><label for="captcha">Captcha:<font color="red">*</font></label><br/><img src="/im'.md5(rand(1,50000)).'.jpg" alt="Loading.."/><br/>Enter the words showing in the image<br/><input type="text" name="captcha"/><br/><div id="forgot"><input type="checkbox" name="terms" value="1"/> <label for="terms">Agree to <a href="/user/terms">Terms</a>:<font color="red">*</font></label></div><input type="submit" value="Register"/></form><br/><font color="red">*</font> Marked fields are required.</div>';

echo '<div class="ad"><img src="/error.png"/> <a href="/">Cancel & Go Back</a></div>';

}

include 'foot.php';

?>
       
