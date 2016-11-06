<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = '//layouts/column1';
	public $title;
	public $SMS_API_ID = 1;
	
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();
	
	public function init(){
		Define ('PAYU_SALT', 'a2it84nzxP');
		Define ('PAYU_MERCHANT_KEY', 'h0fFL9iY');
		#"https://test.payu.in";#End point - change to https://secure.payu.in for LIVE mode
		Define('PAYU_BASE_URL', 'https://test.payu.in');
	}
	
	public function SMSCredit( ){
		// SMS Credit API 
		// http://tran.nspiresoft.com/api/getCredits?username=gautamroy1&password=gautamroy1321
		// 200{"total_credits":10000,"balance":9899,"total_used":null}
		$obj_api= Apimanagement::model()->findByPk( $this->SMS_API_ID );
		$username	= $obj_api->username;  
		$password 	= $obj_api->password;
		
		$credentials='username='.$username.'&password='.$password;
		$url = "http://tran.nspiresoft.com/api/getCredits?".$credentials;
			
		$ch = curl_init($url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		$curl_scraped_page = curl_exec($ch); 
		curl_close($ch); 
				
		$xml = new SimpleXMLElement($curl_scraped_page);
		$response= $xml->Success->Message;
		
		$final_response=json_decode($response);
		
		$total=$final_response->total_credits;
		$remaining=$final_response->balance;
		$used=$total-$remaining;
		return array('total'=>$total,'remaining'=>$remaining,'used'=>$used);		
	}
	
	public function SMS( $sms, $mobile_no, $user_id)
	{           
		/*
			1.) Create table "api_management"
				 Fields are:
				   username,password,senderid,dndrefund ,created_by,updated_by,created_on,updated_on
			2.) Create table for "sms_log":
				 Fileds are:
				   mobileno, sms_body, date_time, api_username
			http://tran.nspiresoft.com/api/sendsms?username=gautamroy&password=gautamroy321&senderid=DGRSSD&message=hi%20Ravindra&numbers=9403133193&dndrefund=1
		*/
		
		$obj_api= Apimanagement::model()->findByPk( $this->SMS_API_ID );
		$param[username]	= $obj_api->username;  
		$param[password] 	= $obj_api->password; 
		$param[senderid] 	= $obj_api->senderid;
		$param[message] 	= $sms;
		$param[numbers] 	= $mobile_no; 
		$param[dndrefund] 	= $obj_api->dndrefund; 				
	 
		foreach($param as $key=>$val)
		{ 
			$request.= $key."=".urlencode($val); 
			$request.= "&"; 
		}
		$request = substr($request, 0, strlen($request)-1);
		
		
		$url = "http://tran.nspiresoft.com/api/sendsms?".$request;
		
		$ch = curl_init($url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		$curl_scraped_page = curl_exec($ch); 
		curl_close($ch); 
		$result=@explode('|',$curl_scraped_page);
		//echo '<pre>';$curl_scraped_page
		   
		if(!empty($result))
		{
			$obj_log_sms = new Logsms;
			$obj_log_sms->api_id  	= $this->SMS_API_ID;
			$obj_log_sms->user_id 	= $user_id;
			$obj_log_sms->sms 		= $sms;
			$obj_log_sms->mobile_no = $mobile_no;					
			$obj_log_sms->insert();
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	 public function SMTPMail($data)
	 {
		 //create array with this index -> username,password,to,reply_to,reply_name,from,from_name,cc,bcc,subject,body,attachmentpath, 

		 
		require_once Yii::app()->basePath . '/smtp/class.phpmailer.php';
		if(!empty($data['to']))
		{
			$mail = new PHPMailer(); // create a new object
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Host = "smtp.gmail.com";
			$mail->domain = "gmail.com";
			$mail->authentication = "plain";
			$mail->Port = 465; // or 587
			$mail->IsHTML(true);
			$mail->Username = $data['username'];
			$mail->Password = $data['password'];
			$mail->AddReplyTo($data['reply_to'], $data['reply_name']); //reply-to address
			$mail->SetFrom($data['from'],$data['from_name']); //From address of the mail
			$cc = explode(',', $data['cc']);
			if(!empty($cc))
			{
				foreach ($cc as $c)
				{
					if(str_replace(' ', '', $c)!=$data['to'])
					{
					   $mail->addCC($c);
					}
				}
			}
			$bcc = explode(',', $data['bcc']);
			if(!empty($bcc))
			{
				foreach ($bcc as $b)
				{
					if(str_replace(' ', '', $b)!=$data['to'])
					{
						$mail->addBCC($b);
					}
				}
			}

			$mail->Subject = $data['subject'];
			$mail->Body = $data['body'];
			$mail->AddAddress($data['to']);
			if(isset($data['attachmentpath']))
			$mail->AddAttachment($data['attachmentpath']);

			if(@$mail->Send()){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}
	
	public function sendemail($to,$subject,$message, $from_email){
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		// $headers .= 'From: <webmaster@example.com>' . "\r\n";
		$headers .= 'From: '.$from_email . "\r\n";
		// $headers .= 'Cc: myboss@example.com' . "\r\n";

		if(@mail($to,$subject,$message,$headers))
			return true;
		else
			return false;
	}
}