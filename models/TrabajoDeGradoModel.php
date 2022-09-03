<?php
require("DataBaseModel.php");

class TrabajoDeGrado
{
    public $db;

    public function __construct() 
    {
        $this->db = new DataBase();
    }


    public function insert ($carrera,$linea_investigacion, $autor, $titulo, $fecha, $url){
        
        $sql = "INSERT INTO `trabajos_de_grado`(`carrera`,`linea_investigacion`, `autor`, `titulo`, `fecha`, `url`) 
                                        VALUES (:carrera,:linea_investigacion,:autor,:titulo,:fecha,:url)";

        $sth = $this->db->prepare($sql);

        $sth->bindParam(':carrera', $carrera);
        $sth->bindParam(':linea_investigacion', $linea_investigacion);
        $sth->bindParam(':autor', $autor);
        $sth->bindParam(':titulo', $titulo);
        $sth->bindParam(':fecha', $fecha);
        $sth->bindParam(':url', $url);

        $result=$sth->execute();

        return $result;
    }

    public function select ($start,$end,$carrera="",$linea_investigacion="",$autor="",$titulo="",$fecha="")
    {
        $sql= "SELECT * FROM `trabajos_de_grado`";

        $where=false;

        if(strlen($carrera)>0 && $carrera!=null){
            $sql .= " WHERE carrera=:carrera";
            $where=true;
        }

        if(strlen($linea_investigacion)>0 && $linea_investigacion!=null){

            if($where){
                $sql .= " AND linea_investigacion=:linea_investigacion";
            }else{
                $sql .= " WHERE linea_investigacion=:linea_investigacion";
                $where=true;
            }

        }

        if(strlen($autor)>0 && $autor!=null) {
            if($where){
                $sql .= " AND autor=:autor";
            }else{
                $sql .= " WHERE autor=:autor";
                $where=true;
            }
        }

        if(strlen($titulo)>0 && $titulo!=null){
            if($where){
                $sql .= " AND titulo=:titulo";
            }else{
                $sql .= " WHERE titulo=:titulo";
                $where=true;
            }
        }

        if(strlen($fecha)>0 && $fecha!=null){
            if($where){
                $sql .= " AND fecha=:fecha";
            }else{
                $sql .= " WHERE fecha=:fecha";
                $where=true;
            }
        }

        $sql.=" ORDER BY id DESC LIMIT :start,:end";

        $sth = $this->db->prepare($sql);

        if(strlen($carrera)>0 && $carrera!=null){
            $sth->bindParam(':carrera', $carrera);
        }


        if(strlen($linea_investigacion)>0 && $linea_investigacion!=null){
            $sth->bindParam(':linea_investigacion', $linea_investigacion);
        }

        if(strlen($autor)>0 && $autor!=null){
            $sth->bindParam(':autor', $autor);
        }

        if(strlen($titulo)>0 && $titulo!=null){
            $sth->bindParam(':titulo', $titulo);
        }

        if(strlen($fecha)>0 && $fecha!=null){
            $sth->bindParam(':fecha', $fecha);
        }

        $sth->bindParam(':start', $start, PDO::PARAM_INT);
        $sth->bindParam(':end', $end, PDO::PARAM_INT);
        
        $sth->execute();

        /*$result = $sth->setFetchMode(PDO::FETCH_ASSOC);
        $result=$sth->fetchAll();*/

        $result=$sth;

        return $result;
    }

    public function count ($carrera="",$linea_investigacion="",$autor="",$titulo="",$fecha="")
    {
        $sql= "SELECT count(*) FROM `trabajos_de_grado`";

        $where=false;

        if(strlen($carrera)>0 && $carrera!=null){
            $sql .= " WHERE carrera=:carrera";
            $where=true;
        }

        if(strlen($linea_investigacion)>0 && $linea_investigacion!=null){

            if($where){
                $sql .= " AND linea_investigacion=:linea_investigacion";
            }else{
                $sql .= " WHERE linea_investigacion=:linea_investigacion";
                $where=true;
            }

        }

        if(strlen($autor)>0 && $autor!=null) {
            if($where){
                $sql .= " AND autor=:autor";
            }else{
                $sql .= " WHERE autor=:autor";
                $where=true;
            }
        }

        if(strlen($titulo)>0 && $titulo!=null){
            if($where){
                $sql .= " AND titulo=:titulo";
            }else{
                $sql .= " WHERE titulo=:titulo";
                $where=true;
            }
        }

        if(strlen($fecha)>0 && $fecha!=null){
            if($where){
                $sql .= " AND fecha=:fecha";
            }else{
                $sql .= " WHERE fecha=:fecha";
                $where=true;
            }
        }

        $sth = $this->db->prepare($sql);

        if(strlen($carrera)>0 && $carrera!=null){
            $sth->bindParam(':carrera', $carrera);
        }


        if(strlen($linea_investigacion)>0 && $linea_investigacion!=null){
            $sth->bindParam(':linea_investigacion', $linea_investigacion);
        }

        if(strlen($autor)>0 && $autor!=null){
            $sth->bindParam(':autor', $autor);
        }

        if(strlen($titulo)>0 && $titulo!=null){
            $sth->bindParam(':titulo', $titulo);
        }

        if(strlen($fecha)>0 && $fecha!=null){
            $sth->bindParam(':fecha', $fecha);
        }
        
        $sth->execute();

        $result = $sth->setFetchMode(PDO::FETCH_ASSOC);
        $result=$sth->fetchColumn();

        return $result;
    }

    /*public function delete ($id)
    {
        $sql= "DELETE FROM `trabajos_de_grado` WHERE id=:id";

        $sth = $this->db->prepare($sql);
        $sth->bindParam('id',$id);
        $sth->execute();

        $result=$sth->execute();

        return $result;
        
    }

    /*public function update ($id)
    {
        $sql= "UPDATE `trabajos_de_grado` 
                  SET
                      `linea_de_investigacion`='[value-2]',
                      `autor`='[value-3]',
                      `titulo`='[value-4]',
                      `fecha`='[value-5]',
                      `clave`='[value-7]'
                WHERE id=:id";

        $sth = $this->db->prepare($sql);
        $sth->bindParam('id',$id);
        $sth->execute();

        $result=$sth->execute();

        return $result;
        
    }*/




}
?>