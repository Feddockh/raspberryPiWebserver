
<!DOCTYPE html>
<html lang="en">

<head>

</head>
<body>
    <h1>Hello There</h1>

</body>

<?php
echo "Hello in php<br>";

// Comment can be made in several ways
# this also works
/* and this can do multiline comments */

// Variable can be declared with the $
// Data types are not set strictly
$txt = "school";
$x = 5;
$y = 10.5;

// The variables can be used as follows
echo "I miss $txt!<br>";
// Or use . to join
echo "I miss " . $txt . "!<br>";

// Can also sum variables
echo $x + $y;
?>

<?php
// echo and print are the same, except print returns a value of 1 so it can be used in expressions
// HTML markup tags can also be used inside
$txt = "example";
echo "This is an " . $txt . "<br>";
print "This is another " . $txt . "<br>";
?>

<?php
// php datatypes: string, integer, float, boolean, array, object, NULL, reasource
$a = "This is a string";
var_dump($a); // function returns data type and value
echo "<br>";
$b = 5985;
var_dump($b);
echo "<br>";
$c = 10.365;
var_dump($c);
echo "<br>";
$d = true;
var_dump($d);
echo "<br>";
$e = array("Volvo", "BMW", "Toyota");
var_dump($e);
echo "<br>";
// Class made to show object datatype
class Car {
    public $color;
    public $model;
    public function __construct($color, $model) // constructor
    {
        $this->color = $color;
        $this->model = $model;
    }
    public function message() {
        return "My car is a " . $this->color . " " . $this->model . "!";
    }
}
$f = new Car("black", "Volvo");
echo $f -> message();
echo "<br>";
$g = null;
var_dump($g);
echo "<br>";
// Reference is not an actual datatype. It is the storing of a reference to functions and resources external to php
?>

<?php
// if...elseif..else statement
$t = date("H"); // date("H") function gets the current hour
if ($t < "10") { // If hour is less than 10
  echo "Have a good morning!<br>";
} elseif ($t < "20") { // If hour is greater than 10 and less than 20
  echo "Have a good day!<br>";
} else { // If hour is greater than 20
  echo "Have a good night!<br>";
}
?>

<?php
// switch statement
$favcolor = "red";
switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!<br>";
    break;
  case "blue":
    echo "Your favorite color is blue!<br>";
    break;
  case "green":
    echo "Your favorite color is green!<br>";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!<br>";
}
?>

<?php
// php loop types: while, do while, for, foreach
$x = 1;
while($x <= 5) {
  echo "The number is: $x <br>";
  $x++;
}

$x = 1;
do {
  echo "The number is: $x <br>";
  $x++;
} while ($x <= 5);

for ($x = 0; $x <= 10; $x++) {
    echo "The number is: $x <br>";
}

$colors = array("red", "green", "blue", "yellow");
foreach ($colors as $value) { // syntax: foreach ($array as $value)
  echo "$value <br>";
}

// break jumps out of a loop
for ($x = 0; $x < 10; $x++) {
    if ($x == 4) {
      break;
    }
    echo "The number is: $x <br>";
}

// continue skips one iteration of the loop
for ($x = 0; $x < 10; $x++) {
    if ($x == 4) {
      continue;
    }
    echo "The number is: $x <br>";
}
?>

<?php
// function with arguments
function familyName($fname, $year) {
  echo "$fname Refsnes. Born in $year <br>";
}

familyName("Hege", "1975");
familyName("Stale", "1978");
familyName("Kai Jim", "1983");
?>

<?php
// indexed arrays
$cars = array("Volvo", "BMW", "Toyota");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";

// associative arrays use assigned keys
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"); // syntax: array(key=>value, key2=>value2,...)
// can also be made this way
$age['Peter'] = "35";
$age['Ben'] = "37";
$age['Joe'] = "43";
echo "Peter is " . $age['Peter'] . " years old.";
foreach($age as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

// 2D arrays
$cars2 = array (
    array("Volvo",22,18),
    array("BMW",15,13),
    array("Saab",5,2),
    array("Land Rover",17,15)
);
echo $cars2[0][0].": In stock: ".$cars2[0][1].", sold: ".$cars2[0][2].".<br>";
echo $cars2[1][0].": In stock: ".$cars2[1][1].", sold: ".$cars2[1][2].".<br>";
echo $cars2[2][0].": In stock: ".$cars2[2][1].", sold: ".$cars2[2][2].".<br>";
echo $cars2[3][0].": In stock: ".$cars2[3][1].", sold: ".$cars2[3][2].".<br>";

// Sort functions for arrays
// sort() - sort arrays in ascending order
$numbers = array(4, 6, 2, 22, 11);
sort($numbers);
foreach($numbers as $x) { echo $x . " "; }
echo "<br>";
// rsort() - sort arrays in descending order
rsort($numbers);
foreach($numbers as $x) { echo $x . " "; }
echo "<br>";
// asort() - sort associative arrays in ascending order, according to the value
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
asort($age);
foreach($age as $x => $x_value) { echo $x . "(" . $x_value . ") "; }
echo "<br>";
// ksort() - sort associative arrays in ascending order, according to the key
ksort($age);
foreach($age as $x => $x_value) { echo $x . "(" . $x_value . ") "; }
echo "<br>";
// arsort() - sort associative arrays in descending order, according to the value
arsort($age);
foreach($age as $x => $x_value) { echo $x . "(" . $x_value . ") "; }
echo "<br>";
// krsort() - sort associative arrays in descending order, according to the key
krsort($age);
foreach($age as $x => $x_value) { echo $x . "(" . $x_value . ") "; }
echo "<br>";
?>

<?php
// php superglobals are built-in variables available in all scopes
// $GLOBALS[index] is used too access the array of global variables from anywhere
$x = 75;
$y = 25;
function addition() {
  $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}
addition();
echo $z . "<br>";

// $_SERVER is a superglobal that holds information about headers, paths, and script locations
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
echo "<br>";
echo $_SERVER['REMOTE_ADDR'];
echo "<br>";
echo $_SERVER['REMOTE_PORT'];
echo "<br>";
echo $_SERVER['SERVER_ADDR'];
// and more ...
?>


<!-- $_REQUEST is a superglobal used to collect data after submitting an HTML form
The example below shows a form with an input field and a submit button. When a user 
submits the data by clicking on "Submit", the form data is sent to the file specified 
in the action attribute of the <form> tag. In this example, we point to this file itself 
for processing form data. If you wish to use another PHP file to process form data, replace 
that with the filename of your choice. Then, we can use the super global variable $_REQUEST 
to collect the value of the input field: -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field using $_REQUEST
  $name = $_REQUEST['fname'];
  if (empty($name)) {
    echo "Name is empty" . "<br>";
  } else {
    echo $name . "<br>";
  }
}
?>

<?php
// $_POST is another superglobal used to colect data after submitting an HTML form with method="post" and is also widely used to pass variables
// This code does the same thing as before except it used $_POST instead of $_REQUEST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field using $_POST
  $name = $_POST['fname'];
  if (empty($name)) {
    echo "Name is empty" . "<br>";
  } else {
    echo $name . "<br>";
  }
}
?>

<!-- $_GET is another superglobal used to colect data after submitting an HTML form with method="get" and can collect data sent to the URL -->
<a href="test_get.php?subject=PHP&web=W3schools.com">Test $GET</a>
<!-- When a user clicks on the link "Test $GET", the parameters "subject" and "web" are sent to "test_get.php", and you can then access their values in "test_get.php" with $_GET. -->


</html>