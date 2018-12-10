<?php
class DAO_DanhMuc extends Provider
{
   
    public function GetAll()
    {
        $sql="select TenDM From danhmuc";
        $result = $this->ExecuteQuery($sql);
        $listDanhMuc = array();
        while($row = mysqli_fetch_array($result))
        {
                  $danhmuc = new DanhMuc();
                  
        }
    }
}

?>