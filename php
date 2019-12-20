<?php
      $woord;
      $lives = 10;
      $woordString = " ";
      $message = " ";
      $Won = "fasle";

      $randword = array("Bit", "Acdemy", "Bitacdemy", "jarvis" );


      if  (isset($_POST["EigenWoord"])) {

      $woord = $_POST["InputText"]

      if ($woord == " ") {
        $woord = $Randomwoord[rand(0, count($Randomwoord))];
      }

    MaakwoordString($woord)
    setcookie('woord', $woord);
    setcookie('woord_string', $woordString);
    setcookie('lives', $lives);
    setcookie('message', $message);
    setcookie('won', $won);

    header ("Location: game.php");

      }
    function MaakwoordString($string){
    global
    for ($i=0; $i <strlen($string); $i++) {
    $woordString = $woordString . "_";
  }
    }

       ?>
