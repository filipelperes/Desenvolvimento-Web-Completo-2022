<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprendendo PHP</title>
</head>
<body>
    <!-- Tipos de tags -->
    <?php echo "utilizando a tag padrão <br>"; ?>
    <? echo "utilizando a tag curta <br>"; ?>
    <?= "utilizando a tag de impressão <br>" ?>

    <?php

    //echo e print
    echo 'Comando echo <br>';
    print 'Comando print <br>';

    //tipos de comentários
    //modo1 - de uma linha
    #modo2 - de uma linha
    /*
    * comentário de MÚLTIPLAS LINHAS
    * Este tipo de comentário permite que várias linhas sejam comentadas ao mesmo tempo
    */

    //Variaveis
    //tipagem dinamica

    //string
    $str = "string";
    echo $str . '<br>';
    echo "$str <br>";

    //int
    $int = 9;
    echo $int . '<br>';
    echo "$int <br>";

    //float
    $floa = 2.5;
    echo $floa . '<br>';
    echo "$floa <br>";

    //boolean
    $bool = true;
    echo $bool . '<br>';
    echo "$bool <br>";

    //constantes
    define('TESTE', 'const');
    define('CONSTANTE', 'constante');

    echo TESTE . '<br>';
    echo CONSTANTE . '<br>';

    /*
    Operadores condicionais
    o único diferente é o de diferente,
    tendo o tradicional != e <>
    */

    /*
        Operadores ternários
        Igual javascript
        condição ? sim : não
    */

    //gettype() => retorna o tipo da variavel

    /*
    casting de tipos
    (tipo) $variavel
    tipo = float, double, integer, int, string, boolean, bool
     */


    function teste() {
        echo "Teste <br>";
    }
    teste();

    //funções nativas PHP

    //Imprimir arrays no navegador
    //var_dump
    //print_r

    /*
    Para indices associativos
    JS
    ['a': 1]
    PHP
    ['a' => 1]
    */

    /*
     * in_array("valor", $arr) -> return true or false
     * array_search("valor", $arr) -> return index of occurrence or null
     * 
     * 
     * is_null();
     * empty();
     * 
     * 
     * foreach ($variable as $key => $value) {
        # code...
     *   }
     * 
     */

    

    ?>

</body>
</html>