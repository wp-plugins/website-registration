<?php
class Validation {
  
  //--[ ATTRIBUTES
  private 
    $_value,
    $_regexNumber,
    $_regexLowercase,
    $_regexUppercase,
    $_regexAlpha,
    $_regexAlphanumeric,
    $_regexPhone,
    $_regexEmail;
    
  
  //--[ CONSTRUCTOR          
  public function __construct($value="") { 
    $this->_value             = $value; 
    $this->_regexNumber       = "/^[0-9]{1,}$/";
    $this->_regexLowercase    = "/^[a-z]{1,}$/";
    $this->_regexUppercase    = "/^[A-Z]{1,}$/";
    $this->_regexAlpha        = "/^[A-Za-z]{1,}$/";
    $this->_regexAlphanumeric = "/^[A-Za-z0-9]{1,}$/";
    $this->_regexPhone        = array("/^\+[0-9]{3}/","","");
    $this->_regexEmail        = "/^[a-zA-Z0-9\._]+@[a-z0-9\-_]+\.[a-z\.]{2,6}$/";
    $this->_regexUrl          = "/^(http|https):\/\/[a-z0-9\-_\.]*\.*[a-z\.]{0,6}$/";
    $this->_regexIp4          = "/^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/";
    //$this->_regexPostcode     = "/^[]/";
  }            
  
  //--[ ACCESSORS
  public function getValue()            { return $this->_value; }
  public function getRegexNumber()      { return $this->_regexNumber; }
  public function getRegexLowercase()   { return $this->_regexLowercase; }
  public function getRegexUppercase()   { return $this->_regexUppercase; }
  public function getRegexAlpha()       { return $this->_regexAlpha; }
  public function getRegexAlphanumeric(){ return $this->_regexAlphanumeric; }
  public function getRegexPhone($frm) { 
    if($frm == "1") return $this->_regexPhone[0];
    else if($frm == "2") return $this->_regexPhone[1]; 
    else if($frm == "3") return $this->_regexPhone[2];
  }
  public function getRegexEmail(){ return $this->_regexEmail; }
  public function getRegexUrl(){ return $this->_regexUrl; }
  public function getRegexIp4(){ return $this->_regexIp4; }
  
  //--[ MUTATORS
  public function setValue($value)                    { $this->_value = $value; }
  public function setRegexNumber($regexNumber)        { $this->_regexNumber = $regexNumber; }
  public function setRegexLowercase($regexLowercase)  { $this->_regexLowercase = $regexLowercase; }
  public function setRegexUppercase($regexUppercase)  { $this->_regexUppercase = $regexUppercase; }
  public function setRegexAlpha($regexAlpha)          { $this->_regexAlpha = $regexAlpha; }
  public function setRegexAlphanumeric($regexAlphanumeric)   { $this->_regexAlphanumeric = $regexAlphanumeric; }
  public function setRegexPhone($regexPhone)          { $this->_regexPhone = $regexPhone; }
  public function setRegexEmail($regexEmail)          { $this->_regexEmail = $regexEmail; }
  public function setRegexUrl($regexUrl)          { $this->_regexUrl = $regexUrl; }
  public function setRegexIp4($regexIp4)          { $this->_regexIp4 = $regexIp4; }
  
  //--[ METHODS
  
  /*****************************************************************************
   * Name     : Go 
   * Type     : BOOLEAN 
   * Function : To start validate something
   ****************************************************************************/
  public function go() {}
  
  /*****************************************************************************
   * Name     : lowercase
   * Type     : BOOLEAN 
   * Function : Validate lowercase
   ****************************************************************************/
  public function lowercase() {
    return preg_match($this->_regexLowercase, $this->_value);
  }
  
  /*****************************************************************************
   * Name     : uppercase
   * Type     : BOOLEAN 
   * Function : Validate uppercase
   ****************************************************************************/
  public function uppercase() {
    return preg_match($this->_regexUppercase, $this->_value);
  }
  
  /*****************************************************************************
   * Name     : alpha
   * Type     : BOOLEAN 
   * Function : Validate alphabet
   ****************************************************************************/
  public function alpha() {
    return preg_match($this->_regexAlpha, $this->_value);
  }
  
  /*****************************************************************************
   * Name     : alpha
   * Type     : BOOLEAN 
   * Function : Validate alphanumeric
   ****************************************************************************/
  public function alphanumeric() {
    return preg_match($this->_regexAlphanumeric, $this->_value);
  }
  
  /*****************************************************************************
   * Name     : number
   * Type     : BOOLEAN 
   * Function : Validate number
   ****************************************************************************/
  public function number() {
    return preg_match($this->_regexNumber, $this->_value);
  }
  
  /*****************************************************************************
   * Name     : phone
   * Type     : BOOLEAN 
   * Function : Validate phone number
   ****************************************************************************/
  public function phone() {
    return preg_match($this->_regexPhone[0], $this->_value);
  }
  
  /*****************************************************************************
   * Name     : email
   * Type     : BOOLEAN 
   * Function : Validate email address
   ****************************************************************************/
  public function email() {
    return preg_match($this->_regexEmail, $this->_value);
  }
  
  /*****************************************************************************
   * Name     : url
   * Type     : BOOLEAN 
   * Function : Validate url address
   ****************************************************************************/
  public function url() {
    return preg_match($this->_regexUrl, $this->_value);
  }
  
  /*****************************************************************************
   * Name     : ip4
   * Type     : BOOLEAN 
   * Function : Validate url address
   ****************************************************************************/
  public function ip4() {
    return preg_match($this->_regexIp4, $this->_value);
  }
  
  /*****************************************************************************
   * Name           : postcode
   * Type           : BOOLEAN 
   * Responsibility : Validate Postcode
   * Parameter      : n - length of the postcode   
   ****************************************************************************/
  public function postcode($n) {
    $nv = strlen($this->_value);
    return ($nv == $n)?"1":"0";
  }
  
  /*****************************************************************************
   * Name     : databasePreparation
   * Type     : STRING
   * Function : Validate input for database
   ****************************************************************************/
  public function databasePreparation()
	{
		if(get_magic_quotes_gpc()) $val = stripslashes($this->_value);
		return mysql_real_escape_string($val);
	}
	
}
/*
$td = new Validation('0000');
echo $td->getValue()."<br />";
//echo $td->getRegexPostcode()."<br />";
echo $td->postcode(4);
*/
?>
