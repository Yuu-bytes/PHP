<?php

    function CriaCombo ($tabela,$campoDescricao,$campoCodigo,$selecionar){
        
        include('conecta.php');
        
        echo '<select name="'.$campoCodigo.'">';
        $consulta = $con->query("select * from $tabela");
        if ($selecionar == "0")
            echo '<option value="0">Selecion um registro</option>';
        while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
            echo '<option value="'.$registro->$campoCodigo.'" ';
            
            if ($registro->$campoCodigo==$selecionar)    
                echo 'selected';
            
            echo     ' >';
                 echo $registro->$campoDescricao;
            echo '</option>';
        }
        
        echo '</select>';
        
    }

?>