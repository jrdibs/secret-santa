<?php
//Create multi-dimensional array of Secret Santa participants
//with group identifiers to preclude certain participants from
//being matched with others in their group
//(siblings/couples don't get each other)
$participants = array(
  array("name" => "John Ryan","group" => "C"),
  array("name" => "Gavin","group" => "C"),
  array("name" => "Amelia","group" => "C"),
  array("name" => "Braden","group" => "C"),
  array("name" => "Mikey","group" => "A"),
  array("name" => "Victoria","group" => "A"),
  array("name" => "Julia","group" => "B"),
  array("name" => "Max","group" => "B"),
  array("name" => "Jules","group" => "D"),
  array("name" => "CJ","group" => "D"),
  array("name" => "Jackie","group" => "E"),
  array("name" => "Gabriel","group" => "E")
);
//Randomize order of participants
shuffle($participants);
//Duplicate participants so we can match them
$recipients = $participants;
//Create an empty array to hold the matches
$output = array();

function selectRecipient($i){
  global $output;
  global $participants;
  global $recipients;

  //Select participant and recipient and add to output if they are...
  //Not from the same group
  //And are not the same person
  if(($participants[$i][group]!=$recipients[$i][group])&&($participants[$i][name]!=$recipients[$i][name])){
    $output[$participants[$i][name]] = $recipients[$i][name];
  }
}

//Iterate through the participants array and select recipients
do {
  shuffle($recipients);
  $output = array();
  for($i=0;$i<count($participants);$i++) {
    selectRecipient($i);
  }
} while (count($participants)!=count($output));
//If at the end the results array does not have the same
//number of elements as the participant array, start over

print_r($output);exit;
