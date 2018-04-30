<?php
                                                                    #LESSON 1

	/*$a =123;
	echo $a;
	define('LEET', 1333);
	echo LEET;*/

#Tipy dannyh
	/* Celue chisla 3, 33- INTEGER
	Chisla s plaw tochkoi 3.2 - DOUBLE/FLOAT
	stroki 'asdasd' - STRING
	logicheski tip danyh - BOOLEN -true false
	massivu - array
	obiekty - object
	null - net znacheniya
	resourse -ssilka na vneshni resyrs
	*/

#Stroki
	// $str1 = 'Hello,';
	// $str2 = "World";

	// $str_full = $str1 . ' ' . $str2;
	// // echo $str_full;

	// $str_sin = '$str1 $str2';
	// $str_doub = "$str1 $str2";
	// // echo $str_sin;
	// // echo '<br>';
	// // echo $str_doub;

	// echo 'That\'s right!';
	// echo "That's right!";

#HEREDOC
	 /*  echo <<<END
		asdasdasdASD
		asdasdsdsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
	END;*/

#ARRAYS
	/*	$names=array('Alex', 'Sus', 'sUBAS');
	$days = ['Mond', 'Tuesd'];
	// echo $names[1];
	$names[1] = 'SANSOS';
	$names[]= 'rOBE';

	echo '<pre>';
	print_r($names);*/

#АССОЦИАТИВНЫЕ МАССИВЫ


#УСЛОВНЫЕ КОНСТРУКЦИИ


#ТЕРНАРНЫЙ ОПЕРАТОР
 	/*$age = 17;
	$result = ($age >=18) ? "goden" : "net";*/
	//echo $result;*/

#SWITCH
	/*	$i = 5;
	switch ($i) {
		case 0:
			echo 'i=0';# code...
			break;
		case 1:
			echo 'i=1';
			break;
		default:
		echo 'no matches ';
			# code...
			break;
	}*/


#ЦИКЛЫ
	/*
	WHILE

	while(virazenie){
		istrykc
	}*/

	/*$i = 0;
	while($i < 5){
		echo "$i";
		echo "<br>";
		$i++;
	}*/

#DO...WHILE

#FOR
	/*for($i=0; $i<11; $i++){
		echo "$i <br>";
		if ($i === 5){
			echo "GG EZ<BR>";
			continue;
			echo "asdasd";
		}
	}*/

#ПРЕОБРАЗВАНИЕ ТИПОВ
	// (int), (float), bool, array, string, object


	/*$float = 1.23;
	$integer = (int) $float;
	echo $integer;

	$bool_false = false; //0, 0.0*/

                                                                #LESSON2

	/*function greeting($name){
			echo "Hello, $name<br>";
		}*/
	// GREETING('Alex' , 'Susan');
	// greeting('Alex');
	// greEting('Alex');

	/*function power($x){
	    return $x*$x;
	}
	$result = power(4);
	// echo $result;*/

#ОБЛАСТЬ ВИДИМОСТИ
	/*function test(){
		$var = "Testing";

	}
	test();
	echo $var;

    $glob=10;
    function namevar(){
        global $glob; //глобальная перменная
        $loc = 3; //локальная
        echo "Global: $glob, Local: $loc";
    }
    //namevar();*/




#ВКЛЮЧЕНИЕ И ЗАПРОС ФАЙЛОВ
/*
INCLUDE
REQUIRE
*/

// require_once 'func.php';
// require_once 'func.php';
// include 'missing.php';

// echo 'After missing';

// printStatus();

#ОБЪЕКТЫ

/*    class Human{
        public $first_name = 'Ivan';
        public $last_name = 'Ivanov';
        public $age = '11';
        public $iq = 'Slabii';

        public static $population = 2;
        const HEAD_CONST =1;

        public function hello(){
            echo "Privet";
        }
        public function sayName(){
            echo "My name - $this->first_name";
        }

        public function __construct($first_name, $last_name, $age, $iq){
            $this->first_name=$first_name;
            $this->last_name=$last_name;
            $this->age=$age;
            $this->iq=$iq;

            echo "Rodilsia $this->first_name<br>";
        }
        public function __destruct(){
            echo "Menia zvali $this->first_name. Ya projil dolgyy jizn<br>";
        }
        public static function printPop(){
            echo "Poka chto chislo ludei  " .self::$population;
        }
    }

    echo Human::printPop();*/

/*    // $mark = new Human('Mark', 'Hem', 60, 137);
    // unset($mark);
    // $luke = new Human('Luk', 'Skay', 10, 127);
    // unset($luke);

    // $mark->first_name='Mark';
    // $luke->first_name='Luk';
    // $luke->age='13';

    // $mark->hello();
    // $mark->sayName();

    // echo '<pre>';
    // print_r($mark);
    // print_r($luke);*/
