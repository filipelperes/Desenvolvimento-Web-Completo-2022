<?php 
    /*
     * throw pode ser de Error, Exception, customizadas
     */

    class MeuErro {
        public $err = null;

        public function __construct($err) {
            $this->err = $err;
        }

        public function renderCustomErr() {
            echo '<div style="border: 1px solid #000; padding: 15px; background-color: red; color: white;">';
                echo $this->err;
            echo '</div>';
        }
    }

    try {
        $sql = 'SELECT * FROM clientes';
        mysql_query($sql);
        if(!file_exists('require_arquivo.php')) throw new MeuErro("error");
        //if(!file_exists('require_arquivo.php')) throw new Exception();
        //if(!file_exists('require_arquivo.php')) throw new Error();
    } catch (MeuErro $err) {
        $err->renderCustomErr();
    } catch (Exception $exception) {

    }
    finally {

    }