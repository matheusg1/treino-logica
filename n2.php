<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci</title>
</head>
<body>
<?php
    $ant=0; 
    $atual = 1;
    $prox = 1;
    $num = 13;
    $pertence = false;
    for ($cont=1; $prox <= $num ; $cont++) { 
        echo $prox . "<br>";
        $prox = $atual + $ant;
        $ant = $atual;
        $atual = $prox;
        if ($num == $prox){
            $pertence = true;
        }
    }
    if ($pertence){
        echo "O número pertence à sequência.";
    }
    else{
        echo "O número não pertence à sequência.";
    }
?>

</body>
</html>