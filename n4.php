<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>n.4</title>
</head>
<body>
    <pre>
        <?php
        $faturamentoMensal = array("SP" => 6783643, "RJ" => 3667866, "MG" => 2922988, "ES" => 2716548, "Outros" => 1984953);
        $totalFaturamento = 0;

        foreach ($faturamentoMensal as $indice => $valor){
            $totalFaturamento += $valor;
        }

        $porcentagens = [];

        foreach($faturamentoMensal as $indice => $valor){
            if ($valor != end($faturamentoMensal)){
                echo ($indice) ," representa ";
            }
            else{
                echo ($indice) ," representam ";
            }
                $porcentagens = $valor / $totalFaturamento * 100;
                $porcentagens = round($porcentagens);
                print_r($porcentagens);
                echo "% do valor total mensal da distribuidora.<br>";
            
        }
        ?>
    </pre>
</body>
</html>