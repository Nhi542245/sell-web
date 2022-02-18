<?php
include ("database.php");
?>

<?php
class category{
    private $db;

    public function __construct(){
        $this -> db = new Database();
    }

    public function insertCategory($TenHH){
        $query = "INSERT INTO HangHoa (TenHH) VALUES ('$TenHH')";
        $result = $this ->db->insert($query);
        return $result;
    }
}
?>