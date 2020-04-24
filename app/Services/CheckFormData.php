<?php

namespace App\Services;

class CheckFormData
{
  public static function checkAge($data){
    if($data->age === 1){
      $age = '１８歳以下';
    }

    if($data->age === 2){
        $age = '１９～２９歳';
    }

    if($data->age === 3){
        $age = '３０～３９歳';
    }
      
      if($data->age === 4){
        $age = '４０～４９歳';
    }

    if($data->age === 5){
        $age = '５０～５９歳';
    }

    if($data->age === 6){
        $age = '６０歳以上';
    }

    return $age;

  }

  public static function checkGender($data){

    if($data->gender === 0){
      $gender = '男性';
    }

    if($data->gender === 1){
        $gender = '女性';
    }

    if($data->gender === 3){
        $gender = 'その他';
    }

    return $gender;

  }
}