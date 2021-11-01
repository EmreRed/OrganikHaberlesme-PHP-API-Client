<?php

namespace OrganikHaberlesme;

class User {

  function payment(){
    $class = new class {
      function balance(){
        return \OrganikHaberlesme::raw('user/payment/balance');
      }
    };
    return new $class();
  }

  function iys(){
    $class = new class {
      function brands(){
        return \OrganikHaberlesme::raw('user/iys/brands');
      }
    };
    return new $class();
  }

}
