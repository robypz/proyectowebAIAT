<?php
require_once("DataBaseModel.php");

class Noticia
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function insert ($titulo,$contenido,$img,$archivo)
    {
           
        $sql = "INSERT INTO `noticias`(`titulo`, `contenido`, `img`, `fecha`,`archivo`) VALUES (:titulo,:contenido,:img,NOW(),:archivo)";

        $sth = $this->db->prepare($sql);

        $sth->bindParam(':titulo', $titulo);
        $sth->bindParam(':contenido', $contenido);
        $sth->bindParam(':img', $img);
        $sth->bindParam(':archivo', $archivo);

        $result=$sth->execute();
        return $result;
    }

    public function select ($start,$end)
    {
        $sql= "SELECT * FROM `noticias` ORDER BY id DESC LIMIT :start,:end";

        $sth = $this->db->prepare($sql);

        /*$result = $sth->setFetchMode(PDO::FETCH_ASSOC);
        $result=$sth->fetchAll();*/

        $sth->bindParam(':start', $start, PDO::PARAM_INT);
        $sth->bindParam(':end', $end, PDO::PARAM_INT);

        $sth->execute();

        $result=$sth;

        return $result;
    }

    public function count ()
    {
        $sql= "SELECT count(*) FROM `noticias`";

        $sth = $this->db->prepare($sql);
        
        $sth->execute();

        $result = $sth->setFetchMode(PDO::FETCH_ASSOC);
        $result=$sth->fetchColumn();

        return $result;
    }
       
}
?>