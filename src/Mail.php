<?php

namespace OrganikHaberlesme;

class Mail {

  function send($id = null){
    $class = new class {
      function __construct($id = null){ $this->id = $id; }
      function start($sender, $title, $groups, $recipients, $date=null, $commercial=null){
        return \OrganikHaberlesme::raw('mail/send/start', ['sender' => $sender, 'title' => $title, 'groups' => $groups, 'recipients' => $recipients, 'date' => $date, 'commercial' => $commercial]);
      }
    };
    return new $class($id);
  }

  function report($id = null){
    $class = new class {
      function __construct($id = null){ $this->id = $id; }
      function get($begin=null,$end=null){
        return ($begin && $end)
             ? \OrganikHaberlesme::raw('mail/report/get', ['begin' => $begin, 'end' => $end])
             : \OrganikHaberlesme::raw('mail/report/get');
      }
      function detail(){
        return \OrganikHaberlesme::raw('mail/report/detail', ['id' => $this->id]);
      }
    };
    return new $class($id);
  }

  function template(){
    $class = new class {
      function get(){
        return \OrganikHaberlesme::raw('mail/template/get');
      }
    };
    return new $class();
  }

  function group(){
    $class = new class {
      function get(){
        return \OrganikHaberlesme::raw('mail/group/get');
      }
    };
    return new $class();
  }

  function recipient($id = null){
    $class = new class {
      function __construct($id = null){ $this->id = $id; }
      function get($group){
        return \OrganikHaberlesme::raw('mail/recipient/get',['group' => $group]);
      }
      function add($group, $email, $name="", $surname=""){
        return is_array($email)
             ? (\OrganikHaberlesme::raw('mail/recipient/add',['group' => $group, 'recipients' => $email]))
             : (\OrganikHaberlesme::raw('mail/recipient/add',['group' => $group, 'recipients' => [['email' => $email, 'name' => $name, 'surname' => $surname]]])[0] ?? false);
      }
      function set($email, $name, $surname){
        return \OrganikHaberlesme::raw('mail/recipient/set',['id' => $this->id, 'email' => $email, 'name' => $name, 'surname' => $surname]);
      }
      function delete(){
        return \OrganikHaberlesme::raw('mail/recipient/delete',['id' => $this->id]);
      }
    };
    return new $class($id);
  }

  function sender(){
    $class = new class {
      function get(){
        return \OrganikHaberlesme::raw('mail/sender/get');
      }
    };
    return new $class();
  }

}
