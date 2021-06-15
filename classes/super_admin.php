<?php
//session_start();
class Super_admin
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
    //category data insert
    public function save_category_info($data)
    {
        $sql = "INSERT INTO tbl_category(category_name,category_description,publication_status)VALUES('$data[category_name]','$data[category_description]','$data[publication_status]')";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = 'Congratulation!category info create successfully';
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    //catagory data pickup
    public function select_all_category_info()
    {
        $sql = "SELECT * FROM tbl_category";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    //category publication status 
    public function unpublished_category_by_id($category_id)
    {
        $sql = "UPDATE tbl_category SET publication_status=0 WHERE category_id = '$category_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Category Info Unpublished successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function published_category_by_id($category_id)
    {
        $sql = "UPDATE tbl_category SET publication_status=1 WHERE category_id='$category_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Category Info Published successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    //manufacturer data insert
    public function save_manufacture_info($data)
    {
        $sql = "INSERT INTO tbl_manufacturer (manufacturer_name,manufacturer_description,publication_status)VALUES('$data[manufacturer_name]','$data[manufacturer_description]','$data[publication_status]')";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = 'Congratulation!Manufacturer info create successfully';
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }


    public function select_all_manufacture_info()
    {
        $sql = "SELECT * FROM tbl_manufacturer";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function unpublished_manufacture_by_id($manufacturer_id)
    {
        $sql = "UPDATE tbl_manufacturer SET publication_status=0 WHERE manufacturer_id = '$manufacturer_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Manufacture Info Unpublished successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }


    public function published_manufacture_by_id($manufacturer_id)
    {
        $sql = "UPDATE tbl_manufacturer SET publication_status=1 WHERE manufacturer_id='$manufacturer_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Manufacture Info Published successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function select_category_info_by_id($category_id)
    {
        $sql = "SELECT * FROM tbl_category WHERE category_id='$category_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function update_category_info($data)
    {
        $sql = "UPDATE tbl_category SET category_name='$data[category_name]',category_description='$data[category_description]',publication_status='$data[publication_status]' WHERE category_id='$data[category_id]'";
        if (mysqli_query($this->db_connect, $sql)) {
            // $message = 'Category Info Update Successfully';
            $_SESSION['message'] = 'Category Info Update Successfully!';
            header('location:manage_category.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function delete_category_by_id($category_id)
    {
        $sql = "DELETE FROM tbl_category WHERE category_id = '$category_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = ' Category Info Delete  Successfully!';
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function select_manufacture_info_by_id($manufacture_id)
    {
        $sql = "SELECT * FROM tbl_manufacturer WHERE manufacturer_id='$manufacture_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function update_manufacture_info($data)
    {
        $sql = "UPDATE tbl_manufacturer SET manufacturer_name='$data[manufacturer_name]',manufacturer_description='$data[manufacturer_description]',publication_status='$data[publication_status]' WHERE manufacturer_id='$data[manufacture_id]'";
        if (mysqli_query($this->db_connect, $sql)) {
            // $message = 'Category Info Update Successfully';
            $_SESSION['message'] = 'Manufacturer Info Update Successfully!';
            header('location:manage_manufacture_content.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function delete_manufacture_by_id($manufacture_id)
    {
        $sql = "DELETE FROM tbl_manufacturer WHERE manufacturer_id = '$manufacture_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = ' Manufacturer Info Delete  Successfully!';
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }







    public function logout()
    {
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_id']);
        header('location:index.php');
    }
}
