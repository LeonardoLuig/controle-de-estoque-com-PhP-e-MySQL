<?php
    require 'conctionBD.php';

    class adicionarEstoque{
        public $produto;
        public $adicionarQuantidade;
        public $alterarValor;

        public function __setValueAttr($attr, $value){
            $this->$attr = $value;
        }
        public function addValorOrQtd(){
            $conect = mysqli_connect('localhost', 'root', '');
            $db = mysqli_select_db($conect, 'controle_estoque');
            //$query = 'UPDATE tb_produtos SET quantidade =' . $this->adicionarQuantidade . 'WHERE produto =' . $_POST['produtos'];

            
            if($this->adicionarQuantidade != ''){
                if(is_numeric($this->adicionarQuantidade)){
                    $update = 'UPDATE tb_produtos SET quantidade = quantidade +' . $this->adicionarQuantidade. ' WHERE produto = "'. $this->produto . '"';
                    $queryUpadate = mysqli_query($conect, $update);
                    /*
                    echo 'Quantidade alterada com sucesso!<br>';
                    echo '<pre>';
                    print_r($update);
                    echo '</pre>';
                    */
                    header('Location: adicionar.php?add=yes');
                }else{
                    echo 'O valor inserido não é um número inteiro';
                }
            }else{
                echo 'A quantidade não foi alterada<br>';
            }
        
        if($this->alterarValor != ''){
            if(is_numeric($this->alterarValor)){
                $updateValor = 'UPDATE tb_produtos SET valor = '. $this->alterarValor . ' WHERE produto = "' . $this->produto . '"';
                $queryUpadateValor = mysqli_query($conect, $updateValor);
                header('Location: adicionar.php?add=yes');
            }else{
                echo 'A coluna valor não foi alterada<br>';
            }
    }else{
        echo 'Não alterado<br>';
    }
}
    }


        $alterar = new adicionarEstoque();
        $alterar->__setValueAttr('produto', $_POST['produtos']);
        $alterar->__setValueAttr('adicionarQuantidade', $_POST['adicionar']);
        $alterar->__setValueAttr('alterarValor', $_POST['updateValue']);
        $alterar->addValorOrQtd();


?>