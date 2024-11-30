<?php

$input = "
Time:        53     89     76     98
Distance:   313   1090   1214   1201";

/*
$input = "
Time:      7  15   30
Distance:  9  40  200";*/

function day1($input) {
  $input = trim($input);
  $split = explode("\n", $input);
  $first_row = explode(":", $split[0]);
  $second_row = explode(":", $split[1]);
  $time = array_filter(preg_split("/ +/", $first_row[1]));
  $distance = array_filter(preg_split("/ +/", $second_row[1]));
  $res = 1;
  for ($i = 1; $i <= sizeof($time); $i++) {
    $win = 0;
    for ($j = 1; $j < $time[$i]; $j++) {
      if ($j * ($time[$i]-$j) > $distance[$i]) {
        $win++;
      }
    }
    $res *= $win;
  }

  return $res;
}

function day2($input) {
  $input = trim($input);
  $split = explode("\n", $input);
  $first_row = explode(":", $split[0]);
  $second_row = explode(":", $split[1]);
  $time = implode(array_filter(preg_split("/ +/", $first_row[1])));
  $distance = implode(array_filter(preg_split("/ +/", $second_row[1])));
  $res = 0;
  for ($j = 1; $j < $time; $j++) {
    if ($j * ($time-$j) > $distance) {
      $res++;
    }
  }

  return $res;
}

//echo day1($input);
echo day2($input);
