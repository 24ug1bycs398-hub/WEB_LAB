
<?php
$result = [];
$type = "";

if(isset($_POST['submit']))
{
    $a = $_POST['a'];
    $b = $_POST['b'] ?? [];
    $type = $_POST['type'];

    if($type == "transpose")
    {
        for($i=0; $i<3; $i++)
            for($j=0; $j<2; $j++)
                $result[$i][$j] = $a[$j][$i];
    }

    if($type == "add" || $type == "multiply")
    {
        for($i=0; $i<2; $i++)
        {
            for($j=0; $j<2; $j++)
            {
                $result[$i][$j] = 0;

                for($k=0; $k<2; $k++)
                {
                    if($type == "add")
                        $result[$i][$j] = $a[$i][$j] + $b[$i][$j];
                    else
                        $result[$i][$j] += $a[$i][$k] * $b[$k][$j];
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Matrix Calculator</title>

<style>
body {
    font-family: Arial;
    background: linear-gradient(135deg,#080b1e,#30145b);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.box {
    background: white;
    padding: 30px;
    width: 350px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 10px 30px #0005;
}

h2 { color: #5424a5; }

select, input, button {
    padding: 10px;
    margin: 6px;
    border: 1px solid #ccc;
    border-radius: 6px;
}

input { width: 65px; }

select, button { width: 90%; }

button {
    background: #7548e8;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

button:hover { background: #5424a5; }

h3 { color: #5424a5; }

.result {
    display: inline-block;
    padding: 10px;
    background: #eee8ff;
    color: #5424a5;
    font-weight: bold;
    margin: 5px;
    border-radius: 5px;
}
</style>
</head>

<body>

<div class="box">

<h2>Matrix Calculator</h2>

<form method="post">

<select name="type" onchange="location.href='?type='+this.value">
    <option value="transpose">Transpose (2x3)</option>
    <option value="add" <?php if(isset($_GET['type']) && $_GET['type']=="add") echo "selected"; ?>>Addition (2x2)</option>
    <option value="multiply" <?php if(isset($_GET['type']) && $_GET['type']=="multiply") echo "selected"; ?>>Multiplication (2x2)</option>
</select>

<?php
$selected = $_GET['type'] ?? 'transpose';
?>

<input type="hidden" name="type" value="<?php echo $selected; ?>">

<h3>First Matrix</h3>

<?php
$rows = ($selected == "transpose") ? 2 : 2;
$cols = ($selected == "transpose") ? 3 : 2;

for($i=0; $i<$rows; $i++)
{
    for($j=0; $j<$cols; $j++)
    {
        echo "<input type='number' name='a[$i][$j]' required>";
    }
    echo "<br>";
}
?>

<?php if($selected != "transpose") { ?>

<h3>Second Matrix</h3>

<?php
for($i=0; $i<2; $i++)
{
    for($j=0; $j<2; $j++)
    {
        echo "<input type='number' name='b[$i][$j]' required>";
    }
    echo "<br>";
}
?>

<?php } ?>

<button type="submit" name="submit">Calculate</button>

</form>

<?php if(isset($_POST['submit'])) { ?>

<h3>Result Matrix</h3>

<?php
foreach($result as $row)
{
    foreach($row as $value)
    {
        echo "<span class='result'>".$value."</span>";
    }
    echo "<br>";
}
?>

<?php } ?>

</div>

</body>
</html>
