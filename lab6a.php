
<?php
if(isset($_POST['submit']))
{
    $a = $_POST['n1'];
    $b = $_POST['n2'];
    $op = $_POST['op'];

    switch($op)
    {
        case "+": $r = $a + $b; break;
        case "-": $r = $a - $b; break;
        case "*": $r = $a * $b; break;

        case "/":
            if($b == 0) $r = "Cannot divide by zero";
            else $r = $a / $b;
            break;

        case "sqrt": $r = sqrt($a); break;
        case "square": $r = $a * $a; break;
        case "sin": $r = sin(deg2rad($a)); break;
        case "cos": $r = cos(deg2rad($a)); break;
        case "tan": $r = tan(deg2rad($a)); break;
        case "log": $r = log10($a); break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Scientific Calculator</title>

<style>
body {
    font-family: Arial;
    background: linear-gradient(135deg,#080b1e,#30145b);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.box {
    background: #fff;
    padding: 30px;
    width: 300px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 10px 30px #0005;
}

h2 { color: #5424a5; }

input, select, button {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 7px;
}

button {
    background: #7548e8;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

.result {
    color: #5424a5;
    font-size: 20px;
    font-weight: bold;
}
</style>
</head>

<body>

<div class="box">

<h2>Scientific Calculator</h2>

<form method="post">

<input type="number" step="any" name="n1"
placeholder="First Number" required>

<input type="number" step="any" name="n2"
placeholder="Second Number">

<select name="op">
    <option value="+">Addition</option>
    <option value="-">Subtraction</option>
    <option value="*">Multiplication</option>
    <option value="/">Division</option>
    <option value="sqrt">Square Root</option>
    <option value="square">Square</option>
    <option value="sin">Sin</option>
    <option value="cos">Cos</option>
    <option value="tan">Tan</option>
    <option value="log">Log</option>
</select>

<button type="submit" name="submit">Calculate</button>

</form>

<?php
if(isset($_POST['submit']))
{
    if(isset($r))
        echo "<p class='result'>Result: $r</p>";
}
?>

</div>

</body>
</html>
