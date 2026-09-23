<html>

<?php
echo "<body bgcolor= A1DEFF>";
?>

	<h1>Welcome to my website</h1>

<?php
echo "<p>This is the home page.</p>";

for ($i = 0; $i < 5; $i++)  //makes it loop 5 times
	{
    echo "<img src='blueshark.jpg' width='300' alt='Blue shark'>";
	}

$temp = 20;
echo "<h2> TEMP: " . $temp;
$temp = $temp + 10;
echo "<h2> TEMP: " . $temp;
echo "<br>";

for($I = 0; $I < 10; $I++)  //makes it loop 10 times
{

	if ($I == 5)
	{
		echo "<p> FIVE </p>";
	}
	else
	{
		echo $I . "<br>";
	}
}

for ($i = 1; $i <= 6; $i++) 
{
    echo "<h{$i}>heading " . $i . "</h{$i}>"; 
}
//when $I is h1, it makes the font header 1, the end bit also turns it to h1

?>

