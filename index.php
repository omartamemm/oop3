<?php
class user
{
    private static ?string $name=null;
    private static ?int $age=null;
    private static ?string $email=null;
    private static ?int $phone=null;
    private static ?string $password=null;

    public function __get($prop)
    {
        switch ($prop) {
            case 'name':
                return self::$name;

            case 'age':
                return self::$age;

            case 'email':
                return self::$email;

            case 'phone':
                return self::$phone;

            case 'password':
                return self::$password;

            default:
                echo "can't access $prop ";
                break;
        }
    }

    public function __set($name, $value)
    {
        if ($name == "age") {
            if (is_int($value) && $value > 15) {
                self::$age = $value;
            } else {
                echo "value must be integer greater than 15 years ";
            }
        }

        if ($name == "name") {
            if (is_string($value) && strlen($value) > 3) {
                self::$name = $value;
            } else {
                echo "value must be string greater than 3 characters";
            }
        }

        if ($name == "email") {
            if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                self::$email = $value;
            } else {
                echo "value must be a valid email";
            }
        }

        if ($name == "password") {
            if (is_string($value) && strlen($value) > 8) {
                self::$password = $value;
            } else {
                echo "value must be greater than 8 characters";
            }
        }
    }

    public static function flash($prop)
    {
        if (property_exists(__CLASS__, $prop)) {
            $value = self::${$prop};
            self::${$prop}=null;
            return $value;
        } else {
            echo "undefined property ";
        }
    }

    public static function all_data()
    {
        return "name =  " . self::$name . "<br>"
            . "age =  " . self::$age . "<br>"
            . "email =  " . self::$email . "<br>"
            . "password =  " . self::$password . "<br>";
    }


public static function check($prop){
    if(property_exists(__CLASS__,$prop)){
        echo "property is found  ". "$prop = " .self::${$prop} ;

    }else {
          echo "property not found  "; 
        
        
    }
}


public static function remov_all() : void {

    self::$name=null;
    self::$age=null;
    self::$email=null;
    self::$password=null;
    self ::$phone= null;
    echo "all data has been removed sucsseffly ";

    
}

}

$user1 = new user();
$user1->name = "omar";

echo $user1->flash("name");
var_dump($user1->name);

$user1->check("ag");
