<?php

class Lucky7{

		public static $welcomeAmount = 100;
		public static $dice1 = 0;
		public static $dice2 = 0;

		public $betAmount = 10;
		public $l7_win = 30;
		public $below7_win = 20;
		public $above7_win = 20;

		public function __contruct(){

		}

		public function throwDice(){

			self::$dice1 = rand(1,6);
			self::$dice2 = rand(1,6);

		}

		public function processRound($choice){

			$sum_of_dices = self::$dice1 + self::$dice2;
			echo "sum_of_dices:".$sum_of_dices.PHP_EOL;

			$wc = self::$welcomeAmount;
			$wc -= $this->betAmount;
			$result = '';

			switch($choice){
					case '7': 
								if ($sum_of_dices == '7'){
									$result = "Congratulations! You win! Your balance is now ";
									$wc += $this->l7_win;  
								}
								break;
					case 'Above 7':
								if ($sum_of_dices < 7){
									$result = "Congratulations! You win! Your balance is now ";
									$wc += $this->above7_win;  
								}
								break;
					case 'Below 7':
								if ($sum_of_dices < 7){
									$result = "Congratulations! You win! Your balance is now ";
									$wc += $this->below7_win;  
								}
								break;

			}

			self::$welcomeAmount = $wc;

			echo "Game Result:".PHP_EOL;

			echo "Dice 1:". self::$dice1 . PHP_EOL;
			echo "Dice 2:". self::$dice2 . PHP_EOL;
			echo "Total :". $sum_of_dices . PHP_EOL;

			echo $result . self::$welcomeAmount ." Rs";
		}

}

$game = new Lucky7();

$choices = array("Below 7","7", "Above 7");

PLAYAGAIN:

echo "Welcome to Lucky 7 Game".PHP_EOL;

echo "Place your bet (Rs. 10) ".PHP_EOL;

$choice = readline("[Below 7] [7] [Above 7]");

if(in_array($choice, $choices)){

	$game->throwDice();

	$game->processRound($choice);

	$opt = readLine("Reset(R) or Continue(C)");

	if ($opt == 'R'){
		Lucky7::$welcomeAmount = 100;
	}
	else if($opt == 'C'){
		goto PLAYAGAIN;
	}

}		
?>