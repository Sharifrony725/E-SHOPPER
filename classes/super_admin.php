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
    //select_all_category_info
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
    //unpublished_category_by_id
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

    //published_category_by_id

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

    //select_all_manufacture_info

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
    //unpublished_manufacture_by_id

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

    //published_manufacture_by_id

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

    //select_category_info_by_id 

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
    //update_category_info

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

    //delete_category_by_id

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
    //select_manufacture_info_by_id

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
    //update_manufacture_info

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
    //delete_manufacture_by_id
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
    //add product
    public function save_product_info($data)
    {
        $directory = '../assets/upload_image/';
        $target_file = $directory . $_FILES['product_image']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['product_image']['size'];
        $image = getimagesize($_FILES['product_image']['tmp_name']);
        if ($image) {
            if (file_exists($target_file)) {
                die('This is image already exists');
            } else {
                if ($file_size > 5242800) {
                    die('File size is too large ');
                } else {
                    if ($file_type != 'jpg' && $file_type != 'png') {
                        die('File type is not valid');
                    } else {
                        $sql = "INSERT INTO tbl_product(product_name, category_id, manufacturer_id, product_price, stock_amount, minimum_stock_amount, product_short_description, product_long_description, product_image, publication_status) VALUES ('$data[product_name]','$data[category_id]','$data[manufacturer_id]','$data[product_price]','$data[stock_amount]','$data[minimum_stock_amount]','$data[product_short_description]','$data[product_long_description]','$target_file','$data[publication_status]')";

                        if (mysqli_query($this->db_connect, $sql)) {
                            move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                            $message = ' Product Info Add Successfully!';
                            return $message;
                        } else {
                            die('Query problem' . mysqli_error($this->db_connect));
                        }
                    }
                }
            }
        } else {
            die('This upload file is not an image.Please use a image file');
        }
    }
    //read
    public function select_all_product_info()
    {
        $sql = "SELECT p.*,c.category_name,m.manufacturer_name  FROM tbl_product as p ,tbl_category as c, tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    //select_product_info_by_id
    public function select_product_info_by_id($product_id)
    {
        $sql = "SELECT p.*,c.category_name,m.manufacturer_name  FROM tbl_product as p ,tbl_category as c, tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND p.product_id='$product_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    //Unpublished
    public function unpublished_product_by_id($product_id)
    {
        $sql = "UPDATE tbl_product SET publication_status=0 WHERE product_id = '$product_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Product Info Unpublished successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    //Publiashed
    public function published_product_by_id($product_id)
    {
        $sql = "UPDATE tbl_product SET publication_status=1 WHERE product_id = '$product_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Product Info Published successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    //select_product_info_by_id
    // public function select_product_info_by_id($product_id)
    // {
    //     $sql = "SELECT p.product_name,p.category_id,p.manufacturer_id,p.product_price,p.stock_amount,c.category_name,m.manufacturer_name  FROM tbl_product as p ,tbl_category as c, tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id";
    //     if (mysqli_query($this->db_connect, $sql)) {
    //         $query_result = mysqli_query($this->db_connect, $sql);
    //         return $query_result;
    //     } else {
    //         die('Query problem' . mysqli_error($this->db_connect));
    //     }
    // }
    //update_product_info
    public function update_product_info($data)
    {
        $sql = "UPDATE tbl_product SET product_name='$data[product_name]',product_price='$data[product_price]',
        stock_amount='$data[stock_amount]',minimum_stock_amount = '$data[minimum_stock_amount]',publication_status='$data[publication_status]' WHERE product_id='$data[product_id]'";
        if (mysqli_query($this->db_connect, $sql)) {
            $_SESSION['message'] = 'Product Info Update Successfully!';
            header('location:manage_product.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    //delete_product_by_id

    public function delete_product_by_id($product_id)
    {
        $sql = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = 'Product Info Delete  Successfully!';
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }










    //Logot

    public function logout()
    {
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_id']);
        header('location:index.php');
    }
}
