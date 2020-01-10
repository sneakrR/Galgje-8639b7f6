<h1>Galgje</h1>

<h2 id="left">Zelf een woord kiezen</h2>
<h2 id="right">Een random woord kiezen</h2>

<form action="game.php" method="post" name="SubmitEigenWoord">
<input type="submit" value="Random woord" name="RandomWoord">
<input id="text" type="text" name="InputText">
<input id="SubmitButton" type="submit" value="Generate word" name="EigenWoord">
</form>


<Style type="text/css">
#SubmitButton {
    position: absolute;
    top: 400px;
    left: 355px;
}
input {
    position: absolute;
    top: 350px;
    left: 990px;
}
#text {
    position: absolute;
    top: 350px;
    left: 330px;
}
h1 {
    font-family: sans-serif;
	font-size: 60;
	position: absolute;
    right: 500px;
    left: 613px;
}
#left {
    font-family: sans-serif;
    font-size: 40;
    position: absolute;
    top: 150px;
    right: 800px;
    left: 200px;
}
#right {
    font-family: sans-serif;
    font-size: 40;
    position: absolute;
    top: 150px;
    right: 200px;
    left: 800px;
}
body {
    background-color: #42f5e9;
}
