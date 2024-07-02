<?php

/**
 * @author Lauro Pereira
 * @copyright 2014
 */
 function conectaDb(){
    //Conecta no banco
        mysql_select_db("scs", mysql_connect("localhost","root","Emprez@sVs20"));
 }
 
function pegaCabecalhos($tabela){

    //Inicia a montagem da SQL
        $sql = "SELECT * FROM $tabela";
    
    //Conecta no banco
        conectaDb();
                
    //Realiza consulta
        $consulta = mysql_query($sql);
        
    //Captura o numero de cabeçalhos
        $num_campos = mysql_num_fields($consulta);
    
    //Cria array de consulta com valores '%'
        for($i=0;$i<$num_campos;$i++)
        {
            $cabecalhos[$i] = mysql_field_name($consulta, $i);
        }
        
    //Retorna o resultado
        return $cabecalhos;
}

function montaSqlSelect($array, $tabela){
    
    //Captura cabeçalhos
        $cabecalhos = pegaCabecalhos($tabela);
       
    //Verifica os campos que não foram solicitados
        foreach($array as $idx => $vlr)
        {
            if(in_array($idx,$cabecalhos)){
                if($vlr !== ''){
                    $consulta[$idx] = "%".$vlr."%";
                }else{
                    $consulta[$idx] = '%';
                }
            }
        }
        if(!isset($consulta)){
            return "SELECT * FROM $tabela";
        }
            
        $num_campos = count($consulta);
    //Monta consulta SQL com criterios
        $i=0;
        $sql = "SELECT * FROM $tabela WHERE";
        foreach($consulta as $idx => $vlr)
        {
            $sql .= " `$idx` LIKE '$vlr'";
            if($i<$num_campos-1){
                $sql .= " AND";  
            }
            $i++;
        }
        
    //Retorna o resultado
        return $sql;
}

function montaSqlInsert($array, $tabela){
    
    //Captura cabeçalhos
        $cabecalhos = pegaCabecalhos($tabela);
        $num_campos = count($cabecalhos);
        
    //Inicia SQL
        $sql = "INSERT INTO $tabela (";
        
    //Incrementa sql de inserção de valores com os cabeçalhos
        $i = 0;
        foreach($cabecalhos as $idx => $vlr)
        {
            $sql .= "`$idx`";
            if($i<$num_campos-1){
                $sql .= ", ";  
            }else{
                $sql .= ") ";
            }
            $i++;
        }

    //Incrementa sql de inserção de valores com os valores
        $i=0;
        $sql .= "VALUES (";
        foreach($array as $idx => $vlr)
        {
            if(array_key_exists($idx,$cabecalhos)){
                $sql .= "'$vlr'";
                if($i<$num_campos-1){
                    $sql .= ", ";  
                }else{
                    $sql .= ") ";
                }
                $i++;
            }else{
                $sql .= "''";
                if($i<$num_campos-1){
                    $sql .= ", ";  
                }else{
                    $sql .= ") ";
                }
                $i++;
            }
        }
    
    //Retorna o resultado
        return $sql;
}

function montaSqlUpdate($atualizacoes, $criterios, $tabela){
    
    //Captura cabeçalhos
        $n_crit = count($criterios);
        $n_att = count($atualizacoes);
        
    //Inicia SQL
        $sql = "UPDATE $tabela SET ";
        
    //Incrementa sql de ataulização de valores com os dados que serão atualizados
        $i = 0;
        foreach($atualizacoes as $idx => $vlr)
        {
            $sql .= "`$idx` = '$vlr'";
            if($i<$n_att-1){
                $sql .= ", ";  
            }else{
                $sql .= " ";
            }
            $i++;
        }

    //Incrementa sql de atualização de valores com os critérios
        $i = 0;
        $sql .= "WHERE ";
        foreach($criterios as $idx => $vlr)
        {
            $sql .= "`$idx` = '$vlr'";
            if($i<$n_crit-1){
                $sql .= " AND ";  
            }else{
                $sql .= ";";
            }
            $i++;
        }

    //Retorna o resultado
        return $sql;
}
?>