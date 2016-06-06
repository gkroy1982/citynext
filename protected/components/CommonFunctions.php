<?php

class CommonFunctions
{

	

	public static function printpricenew($val,$dec=2)
	{
		return number_format($val,$dec,'.',',');
	}
	
	/* Any file upload  insert
		$src= image file path , $max_width => resize max width  ,$max_height => resize max height
	*/
	
	public static function imageresize($src,$max_width,$max_height) // Don't write inline css for image tag
	{
		$size = getimagesize($src); 
		$width = $size[0]; 
		$height = $size[1]; 

		$x_ratio = $max_width / $width; 
		$y_ratio = $max_height / $height; 
		 
		if ( ($width <= $max_width) && ($height <= $max_height) ) { 
			$tn_width = $width; 
			$tn_height = $height; 
		} 
		else if (($x_ratio * $height) < $max_height) { 
			$tn_height = ceil($x_ratio * $height); 
			$tn_width = $max_width; 
		} 
		else { 
			$tn_width = ceil($y_ratio * $width); 
			$tn_height = $max_height; 
		}

		if($tn_height < $max_height) {
			$t=$max_height-$tn_height;
			$top=($t/2)."px";
		}
		if($tn_width < $max_width) {	
			$l=$max_width-$tn_width;
			$left=($l/2)."px";
		}
		 
		return ' width="'.$tn_width.'" height="'.$tn_height.'" 				 
				 style="display:block; margin-top: '.$top.'; margin-left: '.$left.';" ';
	}
	/* Any file upload  insert
		$model= model name,
		$field= input field name
		$location= where to file save
	*/
	public static function FileUpload($model,$field,$location) 
	{		
		$today=getdate();
		//$today=date('Y-m-d');
		$mKey=$today['mday'].$today['mon'].$today['year'].$today['hours'].$today['minutes'].$today['seconds'];
		
		$uploadedFileImg=CUploadedFile::getInstance($model,$field);
		$fileNameImage="{$mKey}-{$uploadedFileImg}";
		$fileNameImage=preg_replace('/[^A-Za-z0-9._]/', "", $fileNameImage);
		if(!empty($uploadedFileImg))
		{
			
			$uploadedFileImg->saveAs($location.$fileNameImage);
			
		}
		return $fileNameImage;
	}
	/* Any file upload  Update
		$model= model name,
		$field= input field name
		$location= where to file save
	*/
	public static function FileUpdate($model,$field,$location)
	{		
		
		
		$today=getdate();
	//$today=date('Y-m-d');
		$mKey=$today['mday'].$today['mon'].$today['year'].$today['hours'].$today['minutes'].$today['seconds'];
		
		$uploadedFileImg = CUploadedFile::getInstance($model,$field);
		
		
		if(!empty($uploadedFileImg))
		{
			if(!empty($model->$field))
				@unlink($location.$model->$field);

			$fileNameImage = "{$mKey}-{$uploadedFileImg}";
			$fileNameImage=preg_replace('/[^A-Za-z0-9._]/', "", $fileNameImage);
			$uploadedFileImg->saveAs($location.$fileNameImage);
			return $fileNameImage;
		}
					
		return Null;
	}
	public static function substrdata($str,$count)
	{
		$str=strip_tags(htmlspecialchars_decode($str,ENT_QUOTES));
		$new_str=substr($str,0,$count);
		if( strlen($new_str) < strlen($str) ) {
			$new_str=trim($new_str)." ...";
		}							
		return $new_str;
	}

	public static function getStatus()
	{								
		return array('1'=>'Pause','2'=>'Active');
	}

	public static function getStatus2()
	{								
		return array('Disable'=>'Disable','Enable'=>'Enable');
	}
	
	function addDayswithdate($date,$days){
		$date = strtotime("+".$days." days", strtotime($date));
		return  date("Y-m-d", $date);
	}
	
	public static function getCountry(){

		return array(
		'AF'=>'Afghanistan',
		'AL'=>'Albania',
		'DZ'=>'Algeria',
		'AS'=>'American Samoa',
		'AD'=>'Andorra',
		'AO'=>'Angola',
		'AI'=>'Anguilla',
		'AQ'=>'Antarctica',
		'AG'=>'Antigua And Barbuda',
		'AR'=>'Argentina',
		'AM'=>'Armenia',
		'AW'=>'Aruba',
		'AU'=>'Australia',
		'AT'=>'Austria',
		'AZ'=>'Azerbaijan',
		'BS'=>'Bahamas',
		'BH'=>'Bahrain',
		'BD'=>'Bangladesh',
		'BB'=>'Barbados',
		'BY'=>'Belarus',
		'BE'=>'Belgium',
		'BZ'=>'Belize',
		'BJ'=>'Benin',
		'BM'=>'Bermuda',
		'BT'=>'Bhutan',
		'BO'=>'Bolivia',
		'BA'=>'Bosnia And Herzegovina',
		'BW'=>'Botswana',
		'BV'=>'Bouvet Island',
		'BR'=>'Brazil',
		'IO'=>'British Indian Ocean Territory',
		'BN'=>'Brunei',
		'BG'=>'Bulgaria',
		'BF'=>'Burkina Faso',
		'BI'=>'Burundi',
		'KH'=>'Cambodia',
		'CM'=>'Cameroon',
		'CA'=>'Canada',
		'CV'=>'Cape Verde',
		'KY'=>'Cayman Islands',
		'CF'=>'Central African Republic',
		'TD'=>'Chad',
		'CL'=>'Chile',
		'CN'=>'China',
		'CX'=>'Christmas Island',
		'CC'=>'Cocos (Keeling) Islands',
		'CO'=>'Columbia',
		'KM'=>'Comoros',
		'CG'=>'Congo',
		'CK'=>'Cook Islands',
		'CR'=>'Costa Rica',
		'CI'=>'Cote D\'Ivorie (Ivory Coast)',
		'HR'=>'Croatia (Hrvatska)',
		'CU'=>'Cuba',
		'CY'=>'Cyprus',
		'CZ'=>'Czech Republic',
		'CD'=>'Democratic Republic Of Congo (Zaire)',
		'DK'=>'Denmark',
		'DJ'=>'Djibouti',
		'DM'=>'Dominica',
		'DO'=>'Dominican Republic',
		'TP'=>'East Timor',
		'EC'=>'Ecuador',
		'EG'=>'Egypt',
		'SV'=>'El Salvador',
		'GQ'=>'Equatorial Guinea',
		'ER'=>'Eritrea',
		'EE'=>'Estonia',
		'ET'=>'Ethiopia',
		'FK'=>'Falkland Islands (Malvinas)',
		'FO'=>'Faroe Islands',
		'FJ'=>'Fiji',
		'FI'=>'Finland',
		'FR'=>'France',
		'FX'=>'France, Metropolitan',
		'GF'=>'French Guinea',
		'PF'=>'French Polynesia',
		'TF'=>'French Southern Territories',
		'GA'=>'Gabon',
		'GM'=>'Gambia',
		'GE'=>'Georgia',
		'DE'=>'Germany',
		'GH'=>'Ghana',
		'GI'=>'Gibraltar',
		'GR'=>'Greece',
		'GL'=>'Greenland',
		'GD'=>'Grenada',
		'GP'=>'Guadeloupe',
		'GU'=>'Guam',
		'GT'=>'Guatemala',
		'GN'=>'Guinea',
		'GW'=>'Guinea-Bissau',
		'GY'=>'Guyana',
		'HT'=>'Haiti',
		'HM'=>'Heard And McDonald Islands',
		'HN'=>'Honduras',
		'HK'=>'Hong Kong',
		'HU'=>'Hungary',
		'IS'=>'Iceland',
		'IN'=>'India',
		'ID'=>'Indonesia',
		'IR'=>'Iran',
		'IQ'=>'Iraq',
		'IE'=>'Ireland',
		'IL'=>'Israel',
		'IT'=>'Italy',
		'JM'=>'Jamaica',
		'JP'=>'Japan',
		'JO'=>'Jordan',
		'KZ'=>'Kazakhstan',
		'KE'=>'Kenya',
		'KI'=>'Kiribati',
		'KW'=>'Kuwait',
		'KG'=>'Kyrgyzstan',
		'LA'=>'Laos',
		'LV'=>'Latvia',
		'LB'=>'Lebanon',
		'LS'=>'Lesotho',
		'LR'=>'Liberia',
		'LY'=>'Libya',
		'LI'=>'Liechtenstein',
		'LT'=>'Lithuania',
		'LU'=>'Luxembourg',
		'MO'=>'Macau',
		'MK'=>'Macedonia',
		'MG'=>'Madagascar',
		'MW'=>'Malawi',
		'MY'=>'Malaysia',
		'MV'=>'Maldives',
		'ML'=>'Mali',
		'MT'=>'Malta',
		'MH'=>'Marshall Islands',
		'MQ'=>'Martinique',
		'MR'=>'Mauritania',
		'MU'=>'Mauritius',
		'YT'=>'Mayotte',
		'MX'=>'Mexico',
		'FM'=>'Micronesia',
		'MD'=>'Moldova',
		'MC'=>'Monaco',
		'MN'=>'Mongolia',
		'MS'=>'Montserrat',
		'MA'=>'Morocco',
		'MZ'=>'Mozambique',
		'MM'=>'Myanmar (Burma)',
		'NA'=>'Namibia',
		'NR'=>'Nauru',
		'NP'=>'Nepal',
		'NL'=>'Netherlands',
		'AN'=>'Netherlands Antilles',
		'NC'=>'New Caledonia',
		'NZ'=>'New Zealand',
		'NI'=>'Nicaragua',
		'NE'=>'Niger',
		'NG'=>'Nigeria',
		'NU'=>'Niue',
		'NF'=>'Norfolk Island',
		'KP'=>'North Korea',
		'MP'=>'Northern Mariana Islands',
		'NO'=>'Norway',
		'OM'=>'Oman',
		'PK'=>'Pakistan',
		'PW'=>'Palau',
		'PA'=>'Panama',
		'PG'=>'Papua New Guinea',
		'PY'=>'Paraguay',
		'PE'=>'Peru',
		'PH'=>'Philippines',
		'PN'=>'Pitcairn',
		'PL'=>'Poland',
		'PT'=>'Portugal',
		'PR'=>'Puerto Rico',
		'QA'=>'Qatar',
		'RE'=>'Reunion',
		'RO'=>'Romania',
		'RU'=>'Russia',
		'RW'=>'Rwanda',
		'SH'=>'Saint Helena',
		'KN'=>'Saint Kitts And Nevis',
		'LC'=>'Saint Lucia',
		'PM'=>'Saint Pierre And Miquelon',
		'VC'=>'Saint Vincent And The Grenadines',
		'SM'=>'San Marino',
		'ST'=>'Sao Tome And Principe',
		'SA'=>'Saudi Arabia',
		'SN'=>'Senegal',
		'SC'=>'Seychelles',
		'SL'=>'Sierra Leone',
		'SG'=>'Singapore',
		'SK'=>'Slovak Republic',
		'SI'=>'Slovenia',
		'SB'=>'Solomon Islands',
		'SO'=>'Somalia',
		'ZA'=>'South Africa',
		'GS'=>'South Georgia And South Sandwich Islands',
		'KR'=>'South Korea',
		'ES'=>'Spain',
		'LK'=>'Sri Lanka',
		'SD'=>'Sudan',
		'SR'=>'Suriname',
		'SJ'=>'Svalbard And Jan Mayen',
		'SZ'=>'Swaziland',
		'SE'=>'Sweden',
		'CH'=>'Switzerland',
		'SY'=>'Syria',
		'TW'=>'Taiwan',
		'TJ'=>'Tajikistan',
		'TZ'=>'Tanzania',
		'TH'=>'Thailand',
		'TG'=>'Togo',
		'TK'=>'Tokelau',
		'TO'=>'Tonga',
		'TT'=>'Trinidad And Tobago',
		'TN'=>'Tunisia',
		'TR'=>'Turkey',
		'TM'=>'Turkmenistan',
		'TC'=>'Turks And Caicos Islands',
		'TV'=>'Tuvalu',
		'UG'=>'Uganda',
		'UA'=>'Ukraine',
		'AE'=>'United Arab Emirates',
		'UK'=>'United Kingdom',
		'US'=>'United States',
		'UM'=>'United States Minor Outlying Islands',
		'UY'=>'Uruguay',
		'UZ'=>'Uzbekistan',
		'VU'=>'Vanuatu',
		'VA'=>'Vatican City (Holy See)',
		'VE'=>'Venezuela',
		'VN'=>'Vietnam',
		'VG'=>'Virgin Islands (British)',
		'VI'=>'Virgin Islands (US)',
		'WF'=>'Wallis And Futuna Islands',
		'EH'=>'Western Sahara',
		'WS'=>'Western Samoa',
		'YE'=>'Yemen',
		'YU'=>'Yugoslavia',
		'ZM'=>'Zambia',
		'ZW'=>'Zimbabwe'
		);
	}
}
