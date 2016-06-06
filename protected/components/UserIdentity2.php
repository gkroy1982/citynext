<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity2 extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$record=Users::model()->findByAttributes(array('email'=>$this->username));  // here I use Email as user name which comes from database
       if($record===null )
	   {
			 $this->errorCode=self::ERROR_USERNAME_INVALID;
	   }
       else if($record->password!==($this->password))            // here I compare db password with passwod field
	   {        
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
	   }
	   else if(strcasecmp($record->password,$this->password)!==0)
	   {
	   		$this->errorCode=self::ERROR_PASSWORD_INVALID;
	   }
		else
       {  
		   $this->setState('uid', $record->uid); 
		    $this->setState('email', $record->email);
		    $this->setState('name', $record->full_name );
           $this->errorCode=self::ERROR_NONE;
       }
		
	return !$this->errorCode;
	}
}