<?php

class OrganikHaberlesme {
  protected static $_url = "https://api.organikhaberlesme.com/";
  protected static $_key = null;
  protected static $_arr = [];
  protected static $_api = [];
  protected static $_inc = [];
  const ERROR = "api_error";
  const ERROR_MSG = "api_error_msg";
  const REQUEST = "api_request";
  const REQUEST_URL = "api_request_url";
  const REQUEST_HEADER = "api_request_header";
  const RESULT = "api_result";
  const RESULT_CODE = "api_result_code";

  function __construct($key=null){
    if($key) self::auth($key);
  }

  public static function auth($key){
    self::$_key = $key;
    return true;
  }

  public static function me(){
    return self::raw('me');
  }

  public static function mail(){
    if(!in_array('mail',self::$_inc)) include __DIR__.'/src/Mail.php';
    return new \OrganikHaberlesme\Mail();
  }

  public static function user(){
    if(!in_array('user',self::$_inc)) include __DIR__.'/src/User.php';
    return new \OrganikHaberlesme\User();
  }

  public static function raw($action, $data=null){
    self::$_arr[self::ERROR] = false;
    self::$_arr[self::ERROR_MSG] = false;
    $url = self::$_url.$action;
    self::$_arr[self::REQUEST_URL] = $url;
    self::$_arr[self::REQUEST] = null;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    $header = [];
    if(!empty($data)){
      $postData = json_encode($data);
      self::$_arr[self::REQUEST] = $postData;
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
      $header[] = 'Content-Type: application/json';
    }
    if(self::$_key !== null) $header[] = 'X-Organik-API: 1';
    if(self::$_key !== null) $header[] = 'X-Organik-Auth: '.self::$_key;
    self::$_arr[self::REQUEST_HEADER] = $header;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
    self::$_arr[self::RESULT] = curl_exec($ch);
    $result = json_decode(self::$_arr[self::RESULT]);
    if(json_last_error() != JSON_ERROR_NONE) return self::$_arr[self::RESULT];
    self::$_arr[self::RESULT_CODE] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close ($ch);
    self::$_arr[self::ERROR] = isset($result->errors) ? $result->errors[0]->code : false;
    self::$_arr[self::ERROR_MSG] = isset($result->errors) ? $result->errors[0]->message : false;
    return in_array(self::$_arr[self::RESULT_CODE],[200,202,204]) ? $result->data : false;
  }

  public static function get($v=null){
    if($v === null) return new class {
      public function error()  { return (object)['code' => OrganikHaberlesme::get(OrganikHaberlesme::ERROR),      'desc' => OrganikHaberlesme::get(OrganikHaberlesme::ERROR_MSG)]; }
      public function request(){ return (object)['url'  => OrganikHaberlesme::get(OrganikHaberlesme::REQUEST_URL),'body' => OrganikHaberlesme::get(OrganikHaberlesme::REQUEST)]; }
      public function result() { return (object)['code' => OrganikHaberlesme::get(OrganikHaberlesme::RESULT_CODE),'body' => OrganikHaberlesme::get(OrganikHaberlesme::RESULT)]; }
    };
    return isset(self::$_arr[$v]) ? self::$_arr[$v] : false;
  }
}
