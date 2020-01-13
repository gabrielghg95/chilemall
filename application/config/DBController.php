<?php
// La clase BDController
class DBController {
	private $hostname = "localhost";
	private $userDB = "root";
	private $nombreDB = "mall";
	private $conexion;
	
        function __construct() {
        $this->conexion = $this->connectDB();
	}	
	function connectDB() {
		$conexion = mysqli_connect($this->hostname,$this->userDB,"",$this->nombreDB);
		return $conexion;
	}
        function runQuery($query) {
                $result = mysqli_query($this->conexion,$query);
                while($row=mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
                }		
                if(!empty($resultset))
                return $resultset;
	}
}
?>