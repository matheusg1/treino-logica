<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N.5</title>
</head>
<body>
    <pre>
        <?php
            invertePalavra("jamelao");

            function invertePalavra($var){
                $var = str_split($var, 1);
                print_r($var);
    
                for ($diminui = count($var) - 1; $diminui >= 0 ; $diminui--) { 
                    echo $var[$diminui];
                }
            }
        ?>
    </pre>
</body>
</html>