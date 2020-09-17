<?php

    require 'conctionBD.php';

    class adicionarProduto{
        public $addProduto;
        public $adicionarQuantidade;
        public $addValor;

        public function __setValueAttr($attr, $value){
            $this->$attr = $value;
        }
        
        public function addValorOrQtd(){
            $conect = mysqli_connect('localhost', 'root', '');
            $bd = mysqli_select_db($conect, 'controle_estoque');
            $query = 'SELECT produto FROM tb_produtos WHERE produto = "'. $_POST['produto'].'"';
            //$insert = "INSERT INTO tb_produtos(produto, quantidade, valor) VALUES(".$this->addProduto.", ".$this->adicionarQuantidade.", " .$this->addValor.")";
            $validation = mysqli_query($conect, $query);
            
            if($this->addProduto != '' || $this->adicionarQuantidade != '' || $this->addValor != ''){
                if($validation->num_rows > 0){
                    echo "Produto ja existente!";
                }else{
                    $insert = 'INSERT INTO tb_produtos(produto, quantidade, valor) VALUES("'.$this->addProduto. '",'.$this->adicionarQuantidade.', ' . $this->addValor.')';
                    $dbQuery = mysqli_query($conect, $insert);
                    header('Location: adicionarNew.php?add=yes');
                }
            }else{
                echo "Campos não podem ser vazios!";
            }
        }
    }

    $new = new adicionarProduto();
    $new-> __setValueAttr('addProduto', $_POST['produto']);
    $new-> __setValueAttr('adicionarQuantidade', $_POST['adicionar']);
    $new-> __setValueAttr('addValor', $_POST['valor']);
    $new-> addValorOrQtd();
    
?>