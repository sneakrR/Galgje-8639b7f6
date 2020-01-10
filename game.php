<Style type="text/css">

body {
    background-color: #42f5e9;
}
</style>


<?php

session_start();


if(isset($_POST['reset']))
{
    session_destroy();
    header("location: ".$_SERVER['REQUEST_URI']);
    exit;
}


$woordenarray = array("jarvis", "bit", "academy", "school");

if (isset($_POST["InputText"]))
{
$_POST["InputText"] != "";
$_SESSION["woord"] = strtoupper(trim($_POST["InputText"]));
}

elseif(!isset($_SESSION['woord']))
{
    $rand= rand(0,count($woordenarray)-1);
    $woord=$woordenarray[$rand];
    $_SESSION["woord"] = strtoupper(trim($woord));
}



$form = true;


if(isset($_POST['submit']) && isset($_POST['checkbox']))
{
    if (stripos($_SESSION['woord'], $_POST['checkbox'][0]) === false)
    {
        array_push($_SESSION['foute_letters'], $_POST['checkbox'][0]);
    }
    else
    {
        array_push($_SESSION['juiste_letters'], $_POST['checkbox'][0]);
    }
}


if(!isset($_SESSION['foute_letters']))
{
    $_SESSION['foute_letters'] = array();
}
if(!isset($_SESSION['juiste_letters']))
{
    $_SESSION['juiste_letters'] = array();
}


elseif(!isset($_SESSION['foute_letters']))
{
    $_SESSION['foute_letters'] = $_POST["InputText"];
}
if(!isset($_SESSION['juiste_letters']))
{
    $_SESSION['juiste_letters'] = $_POST["InputText"];
}




$show = '';
for($i = 0; $i < strlen($_SESSION['woord']); $i++)
{
    $show .= in_array(substr($_SESSION['woord'], $i, 1), $_SESSION['juiste_letters']) ? substr($_SESSION['woord'], $i, 1) : " _ ";
}

echo $show;


if(count($_SESSION['foute_letters']) >= 8)
{
    echo '<h1 style="text-decoration:blink">☠Game over☠</h1> Het woord was '.$_SESSION['woord'].'<br />Het spel wordt binnen 5 seconden opnieuw gestart';
    $form = false;
    session_destroy();
    header("Refresh: 5; URL=".$_SERVER['REQUEST_URI']);
    exit;
}

if($show == $_SESSION['woord'] && $form == true)
{
    echo '<h1 style="text-decoration:blink">! 🎊🎉Gefeliciteerd🎉🎊 !</h1>Spel wordt binnen 5 secs opnieuw gestart';
    echo "<h>＼(＾O＾)／";
    $form = false;
    session_destroy();
    header("Refresh: 5; URL=".$_SERVER['REQUEST_URI']);
    exit;
}
?>



<form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
<?php

if($form == true)
{
	$letters = range("A","Z");
	foreach($letters as $letter)
  {
		if(!in_array($letter,$_SESSION['juiste_letters']) && !in_array($letter, $_SESSION['foute_letters']))
		{
		?>
    <label for="<?php echo $letter?>"><?php echo $letter?></label><input name="checkbox[]" id="<?php echo $letter?>" type="checkbox" value="<?php echo $letter?>" />
		<?php
		}

	}
?>
    <input name="submit" type="submit" value="submit" />
<?php
}
?>
    <input name="reset" type="submit" value="reset" />
</form>

<?php

$f[8] = '
    _____
    |/    |
    |     0
    |     /|\
    |      /\
    |
      ______
';
$f[7] = '
    _____
    |/    |
    |     0
    |     /|\
    |
    |
      ______
';
$f[6] = '
    _____
    |/    |
    |     0
    |
    |
    |
      ______
';
$f[5] = '
    _____
    |/    |
    |
    |
    |
    |
      ______
';
$f[4]= '
    _____
    |/
    |
    |
    |
    |
      ______
';
$f[3]= '
    _____
    |
    |
    |
    |
    |
      ______
';
$f[2]= '

    |
    |
    |
    |
    |
      ______
';
$f[1]= '






      ______
';
$f[0]='';

echo '<pre>'.$f[count($_SESSION['foute_letters'])].'</pre>';
//echo $_SESSION['woord'];
