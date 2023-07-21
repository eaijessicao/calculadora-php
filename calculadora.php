<!DOCTYPE html>
<html>
<head>
    <title>KCS Calculator</title>
    <meta name="description" content="Welcome to my kawaii calculator">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="kc-calculate">
            <h1>Js Technology</h1>
            <p id="result"><?php echo isset($_POST['expression']) ? calculate($_POST['expression']) : ''; ?></p>
            <form action="" method="post">
                <table>
                    <tr>
                        <td><button class="kc-btn" name="expression" value="">C</button></td>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? substr($_POST['expression'], 0, -1) : ''; ?>"><</button></td>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '/' : '/'; ?>">/</button></td>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '*' : '*'; ?>">X</button></td>
                    </tr>
                    <tr>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '7' : '7'; ?>">7</button></td>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '8' : '8'; ?>">8</button></td>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '9' : '9'; ?>">9</button></td>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '-' : '-'; ?>">-</button></td>
                    </tr>
                    <tr>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '4' : '4'; ?>">4</button></td>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '5' : '5'; ?>">5</button></td>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '6' : '6'; ?>">6</button></td>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '+' : '+'; ?>">+</button></td>
                    </tr>
                    <tr>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '1' : '1'; ?>">1</button></td>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '2' : '2'; ?>">2</button></td>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '3' : '3'; ?>">3</button></td>
                        <td rowspan="2"><button style="height: 106px;" class="kc-btn" name="expression" value="=">=</button></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button style="width: 106px;" class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '0' : '0'; ?>">0</button></td>
                        <td><button class="kc-btn" name="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] . '.' : '.'; ?>">.</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
</body>
</html>

<?php
function calculate($expression) {
    if (preg_match('/[^\d\+\-\*\/\.]/', $expression)) {
        return 'Invalid expression';
    }

    $expression = preg_replace('/([+-\/\*])/', ' $1 ', $expression);
    $expression = preg_replace('/\s+/', ' ', $expression);
    $expression = trim($expression);

    $operators = explode(' ', $expression);
    $result = $operators[0];

    for ($i = 1; $i < count($operators); $i += 2) {
        $operator = $operators[$i];
        $operand = $operators[$i + 1];

        switch ($operator) {
            case '+':
                $result += $operand;
                break;
            case '-':
                $result -= $operand;
                break;
            case '*':
                $result *= $operand;
                break;
            case '/':
                if ($operand != 0) {
                    $result /= $operand;
                } else {
                    return 'Division by zero error';
                }
                break;
        }
    }

    return $result;
}
?>
