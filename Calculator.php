
<?php
$result = null;
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$a = isset($_POST['a']) ? $_POST['a'] : '';
	$b = isset($_POST['b']) ? $_POST['b'] : '';
	$operation = isset($_POST['operation']) ? $_POST['operation'] : '+';

	if ($a === '' || $b === '' || !is_numeric($a) || !is_numeric($b)) {
		$error = 'Please enter two valid numbers.';
	} else {
		$x = floatval($a);
		$y = floatval($b);
		switch ($operation) {
			case '+':
				$result = $x + $y;
				break;
			case '-':
				$result = $x - $y;
				break;
			case '*':
				$result = $x * $y;
				break;
			case '/':
				if ($y == 0) {
					$error = 'Division by zero is not allowed.';
				} else {
					$result = $x / $y;
				}
				break;
			default:
				$error = 'Unknown operation.';
				break;
		}
	}
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Simple Calculator</title>
	<style>
    	body{font-family:Arial,Helvetica,sans-serif;padding:20px}
		.box{max-width:380px;margin:0 auto;padding:18px;border:1px solid #ddd;border-radius:8px}
		input[type="number"]{width:100%;padding:8px;margin:6px 0;box-sizing:border-box}
		select,button{padding:8px;margin-top:6px}
		.result{margin-top:12px;padding:10px;background:#f7f7f7;border-radius:4px}
		.error{color:#a00}
	</style>
</head>
<body>
<div class="box">
	<h2>Simple Calculator</h2>
	<form method="post" action="">
		<label>Number 1</label>
		<input type="number" step="any" name="a" value="<?php echo isset($_POST['a'])?htmlspecialchars($_POST['a']):''; ?>">

		<label>Number 2</label>
		<input type="number" step="any" name="b" value="<?php echo isset($_POST['b'])?htmlspecialchars($_POST['b']):''; ?>">

		<label>Operation</label>
		<select name="operation">
			<option value="+" <?php echo (isset($_POST['operation']) && $_POST['operation']=='+')? 'selected':''; ?>>Add (+)</option>
			<option value="-" <?php echo (isset($_POST['operation']) && $_POST['operation']=='-')? 'selected':''; ?>>Subtract (-)</option>
			<option value="*" <?php echo (isset($_POST['operation']) && $_POST['operation']=='*')? 'selected':''; ?>>Multiply (*)</option>
			<option value="/" <?php echo (isset($_POST['operation']) && $_POST['operation']=='/')? 'selected':''; ?>>Divide (/)</option>
		</select>

		<div>
			<button type="submit">Calculate</button>
			<button type="button" onclick="location.href=location.pathname">Reset</button>
		</div>
	</form>

	<?php if ($error): ?>
		<div class="result error"><?php echo htmlspecialchars($error); ?></div>
	<?php elseif ($result !== null): ?>
		<div class="result"><strong>Result:</strong> <?php echo rtrim(rtrim(number_format($result, 8, '.', ''), '0'), '.'); ?></div>
	<?php endif; ?>
</div>
</body>
</html>
