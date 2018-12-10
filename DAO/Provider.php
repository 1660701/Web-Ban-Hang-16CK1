<?php
    class DataProvider
    
    {
        var $db_host = 'localhost';
        var $db_username ='root';
        var $db_password ='';
        var $db_dbname ='doancuoiky';
        public static function ExecuteQuery($query)
        {
            $con = mysqli_connect(this->db_host,this->db_username,this->db_password,this->db_dbname) or die ("cannot connet DB");
            mysqli_query($con,"set name 'utf8'");
            $result=mysqli_query($con,$query);
            mysqli_close($con);
            return $result;
        }
    }
?>