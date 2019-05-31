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
  array("name" => "Tori","group" => "A"),
  array("name" => "Julia C","group" => "B"),
  array("name" => "Max","group" => "B"),
  array("name" => "Julia D","group" => "D"),
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
  //And are not the same person (redundant) - fixed by me
  if(($participants[$i][group]!=$recipients[$i][group])){
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

ksort($participants);

?><!DOCTYPE html>
<html>
<head>
  <title>Secret Santa</title>
  <style type="text/css">
  body {
    background: #ffffff url("bg.jpg") no-repeat center top;
  }
  h1 {
    margin:0 auto;
    width: 300px; height: 185px;
    background: url("https://www.ialottery.com/images/Promotions/SecretSanta/SecretSantaLogo_300px.png");
    text-indent: -9999px;
  }
  table {
    margin:0 auto;
    width:auto;
  }
  td {
    color:#333; //can we get the font to be more 'handwritten-like'?
  font:normal 32px "Handvetica",sans-serif;
    line-height:36px;
  }
  .tilt0{transform:rotate(-4deg); -ms-transform:rotate(-4deg); -webkit-transform:rotate(-4deg);}
  .tilt1{transform:rotate(-3deg); -ms-transform:rotate(-3deg); -webkit-transform:rotate(-3deg);}
  .tilt2{transform:rotate(-2deg); -ms-transform:rotate(-2deg); -webkit-transform:rotate(-2deg);}
  .tilt3{transform:rotate(-1deg); -ms-transform:rotate(-1deg); -webkit-transform:rotate(-1deg);}
  .tilt4{transform:rotate(0deg); -ms-transform:rotate(0deg); -webkit-transform:rotate(0deg);}
  .tilt5{transform:rotate(1deg); -ms-transform:rotate(1deg); -webkit-transform:rotate(1deg);}
  .tilt6{transform:rotate(2deg); -ms-transform:rotate(2deg); -webkit-transform:rotate(2deg);}
  .tilt7{transform:rotate(3deg); -ms-transform:rotate(3deg); -webkit-transform:rotate(3deg);}
  .tilt8{transform:rotate(4deg); -ms-transform:rotate(4deg); -webkit-transform:rotate(4deg);}

  </style>
</head>
<body>
  <h1>Secret Santa</h1>
  <table>
      <tr><td></td><td></td><td></td></tr>
    <?php foreach($output as $giver => $receiver): ?>
      <tr>
        <td class="tilt<?=mt_rand(3,5)?>"><?=$giver?></td>
        <td width="100" align="center"><img class="tilt<?=mt_rand(0,8)?>" width="30" src="arrow.jpg"></td>
        <td class="tilt<?=mt_rand(3,5)?>"><?=$output[$giver]?></td>
      </tr>
    <?php endforeach;?>
  </table>
</body>
</html>
<?php
//print_r($output);
