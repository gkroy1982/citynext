<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
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
		$record=User::model()->findByAttributes(array('username'=>$this->username));  // here I use Email as user name which comes from database
       if($record===null || $record->status==1)
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
		   $this->setState('userid', $record['userId']); 
		   $this->errorCode=self::ERROR_NONE;
       }
		
	return !$this->errorCode;
	}
}