<?php

namespace OrganikHaberlesme;

class Sms {

  function headers(){
    return new class(){
      function get(){
        return \OrganikHaberlesme::raw('sms/headers/get');
      }
    };
  }

  function send($header,$message,$recipients=null,$groups=null,$commercial='BIREYSEL',$type='sms',$otp=null,$appeal=null,$validity=null,$date=null){
    $data = [];
    $data['commercial'] = $commercial;
    $data['type']       = $type;
    if($message)    $data['message']      = $message;
    if($groups)     $data['groups']       = $groups;
    if($recipients) $data['recipients']   = $recipients;
    if($header)     $data['header']       = $header;
    if($otp)        $data['otp']          = $otp;
    if($appeal)     $data['appeal']       = $appeal;
    if($validity)   $data['validity']     = $validity;
    if($date)       $data['date']         = $date;
    return \OrganikHaberlesme::raw('sms/send', $data);
  }

  function group(){
    return new class(){
      function get(){
        return \OrganikHaberlesme::raw('sms/group/get');
      }
      function add($name){
        return \OrganikHaberlesme::raw('sms/group/add',['name' => $name]);
      }
    };
  }

  function recipient(){
    return new class(){
      function get($group){
        return \OrganikHaberlesme::raw('sms/recipient/get',['group' => $group]);
      }
      function add($group,$recipients){
        return \OrganikHaberlesme::raw('sms/recipient/add',['group' => $group, 'recipients' => $recipients]);
      }
      function delete($group,$id){
        return \OrganikHaberlesme::raw('sms/recipient/add',['group' => $group, 'id' => $id]);
      }
    };
  }

  function inbox(){
    return new class(){
      function keyword(){
        return \OrganikHaberlesme::raw('sms/inbox/keyword');
      }
      function message($id){
        return \OrganikHaberlesme::raw('sms/inbox/message',['id' => $id]);
      }
    };
  }

}
