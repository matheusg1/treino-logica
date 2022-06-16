<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N.3</title>
</head>
<body>
    <pre>
        <?php
            //$xml = simplexml_load_file("dados.xml") or die("Erro com o XML");
            $json1 =  file_get_contents("dados.json") or die("Erro com o Json");
            $json2 = json_decode($json1, true);

            $dia = $valor = $indiceMenorValor = $indicesAcimaMedia = [];
            $somaDosValores = $contaDias = 0;

            foreach($json2 as $indice => $dados){
                foreach($dados as $indices => $valores){
                    if ($indices == "dia"){                             //Caso os índices sejam "dia"
                        array_push($dia, $valores);
                        $contaDias++;                                   //Variável para posterior cálculo da média
                    }
                    else{                                               //Caso os índices sejam "valor"
                        $somaDosValores += $valores;                    //Variável para posterior cálculo da média
                        array_push($valor, $valores);
                        if ($indice == 0){                              //Quando o array começa a ser lido, o primeiro valor é adicionado como maior e menor
                            $menorValor = $valores;
                            $maiorValor = $valores;
                            $indiceMaiorValor = $indice + 1;
                        }
                        else{
                            if($valores > $maiorValor){                //Quando o valor que está sendo lido é maior que o maiorValor, ele se torna o maiorValor
                                $maiorValor = $valores;
                                if ($valores == $maiorValor){
                                    $indiceMaiorValor = $indice + 1;    //O índice do maior valor é salvo
                                }
                            }
                            else if ($valores <= $menorValor){
                                $menorValor = $valores;
                                array_push($indiceMenorValor, $indice + 1);
                            }
                        }
                    }
                }
            }

            $faturamentoMedio = ($somaDosValores / $contaDias);

            foreach($json2 as $indice => $dados){                       //Comparo os valores com o faturamento médio
                foreach($dados as $indices => $valores){
                    if ($indices != "dia"){
                        if ($valores > $faturamentoMedio){
                            array_push($indicesAcimaMedia, $indice + 1);
                        }

                    }
                }
            }

            echo "O maior valor de faturamento foi de " . formataValorMonetario($maiorValor) . " no dia " . ($indiceMaiorValor). ".<br>";

            if (count($indiceMenorValor) > 1){
                echo "O menor valor de faturamento foi de " . formataValorMonetario($menorValor) . " nos dias: " , diasComValor($indiceMenorValor) , "<br>";
            }
            else{
                echo "O menor valor de faturamento foi de " . formataValorMonetario($menorValor) . " no dia " , diasComValor($indiceMenorValor) , "<br>";

            };

            echo "A média mensal foi ". formataValorMonetario($faturamentoMedio) ." e os dias com faturamento acima dela foram " , diasComValor($indicesAcimaMedia) . "<br>";

            function formataValorMonetario($valor){
                return "R$" . number_format((float)$valor, 2, ',', '.');
            }

            function diasComValor($indiceValor){    

                foreach ($indiceValor as $index){

                    echo $index;
                    if ($index != (end($indiceValor))){
                        echo ", ";
                    }
                    else{
                        echo ".";
                    }
                }
            }
        ?>
    </pre>
</body>
</html>