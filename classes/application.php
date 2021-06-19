<?php
class Application
{
    private $db_connect;
    public function __construct()
    {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_eshopper';
        $this->db_connect = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$this->db_connect) {
            die('Connection Fail' . mysqli_error($this->db_connect));
        }
    }
    //select_all_published_category

    public function select_all_published_category()
    {
        $sql = "SELECT * FROM tbl_category WHERE publication_status = 1";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
    }
    //select_all_published_manufacture

    public function select_all_published_manufacture()
    {
        $sql = "SELECT * FROM tbl_manufacturer WHERE publication_status = 1";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
    }
    //select_latest_product_info
    public function select_latest_product_info()
    {
        $sql = "SELECT * FROM tbl_product WHERE publication_status = 1 ORDER BY product_id DESC LIMIT(5)";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
    }













    //apllication clss end bracket
}
