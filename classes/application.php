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
        $sql = "SELECT * FROM tbl_product WHERE publication_status = 1 ORDER BY product_id DESC LIMIT 6";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
    }
    //select_product_info_by_id
    public function select_product_info_by_id($product_id)
    {
        $sql = "SELECT p.*,c.category_name,m.manufacturer_name FROM tbl_product as p,tbl_category as c,tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id
        AND product_id='$product_id' ";

        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
    }
    //add_to_cart
    public function add_to_cart($data)
    {
        $product_id = $data['product_id'];
        $sql = "SELECT product_name,product_price,product_image FROM tbl_product WHERE product_id='$product_id' ";
        $query_result = mysqli_query($this->db_connect, $sql);
        $product_info = mysqli_fetch_assoc($query_result);
        session_start();
        $session_id = session_id();
        $sql = "INSERT INTO tbl_temp_cart(session_id,product_id, product_name, product_price, product_quantity, product_image) VALUES ('$session_id','$product_id','$product_info[product_name]','$product_info[product_price]','$data[product_quantity]','$product_info[product_image]')";
        mysqli_query($this->db_connect, $sql);
        header('location:cart.php');
    }

    //select_cart_product_by_session_id
    public function select_cart_product_by_session_id($session_id)
    {
        $sql = "SELECT * FROM tbl_temp_cart WHERE session_id ='$session_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
    }
    //upate_cart_product_info
    public function upate_cart_product_info($data)
    {
        $sql = "UPDATE tbl_temp_cart SET product_quantity='$data[product_quantity]'WHERE temp_cart_id='$data[temp_cart_id]'";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Cart Product Info Upate Successfully";
            return $message;
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
    }
    //delete_cart_product_info
    public function delete_cart_product_info($cart_product_id)
    {
        $sql = "DELETE FROM tbl_temp_cart WHERE temp_cart_id ='$cart_product_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Cart Product Info Delete Successfully";
            return $message;
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
    }
    //select_published_product_by_category_id
    public function select_published_product_by_category_id($category_id)
    {
        $sql = "SELECT * FROM tbl_product  WHERE category_id='$category_id' AND publication_status = 1 ORDER BY product_id DESC ";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
    }
    //save_customer_info
    public function save_customer_info($data)
    {
        $password = md5($data['password']);
        $sql = "INSERT INTO tbl_customer(first_name,last_name, email, password, phone_number, blood_group, address, city, district) VALUES ('$data[first_name]','$data[last_name]','$data[email]','$password','$data[phone_number]','$data[blood_group]','$data[address]','$data[city]','$data[district]')";
        if (mysqli_query($this->db_connect, $sql)) {
            $customer_id = mysqli_insert_id($this->db_connect);
            session_start();
            $_SESSION['customer_id'] = $customer_id;
            $_SESSION['customer_name'] = $data['first_name'] . ' ' . $data['last_name'];
            header('location:shipping.php');
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
    }

    //select_customer_info_by_id
    public function select_customer_info_by_id($customer_id)
    {
        $sql = "SELECT * FROM tbl_customer WHERE customer_id='$customer_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
    }
    //save_shipping_info
    public function save_shipping_info($data)
    {
        $sql = "INSERT INTO tbl_shipping(full_name, email, phone_number, address, city, district) VALUES ('$data[full_name]','$data[email]','$data[phone_number]','$data[address]','$data[city]','$data[district]')";
        if (mysqli_query($this->db_connect, $sql)) {
            $shipping_id = mysqli_insert_id($this->db_connect);
            session_start();
            $_SESSION['shipping_id'] = $shipping_id;
            header('location:payment.php');
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
    }
    //save_order_info============
    public function save_order_info($data)
    {
        $payment_type = $data['payment_type'];
        if ($payment_type == 'cash_on_delivery') {
            session_start();
            $customer_id = $_SESSION['customer_id'];
            $shipping_id = $_SESSION['shipping_id'];
            $order_total = $_SESSION['order_total'];
            $sql = "INSERT INTO tbl_order(customer_id, shipping_id,order_total) VALUES ('$customer_id','$shipping_id','$order_total')";
        }
        if (mysqli_query($this->db_connect, $sql)) {
            $order_id = mysqli_insert_id($this->db_connect);
            $sql = "INSERT INTO tbl_payment(order_id, payment_type) VALUES ('$order_id','$payment_type')";
            if (mysqli_query($this->db_connect, $sql)) {
                // session_start();
                $session_id = session_id();
                $sql = "SELECT * FROM tbl_temp_cart WHERE session_id='$session_id'";
                $query_result = mysqli_query($this->db_connect, $sql);
                while ($product_info = mysqli_fetch_assoc($query_result)) {
                    $sql = "INSERT INTO tbl_order_details(order_id, product_id, product_name, product_price, product_quantity, product_image) VALUES ('$order_id','$product_info[product_id]','$product_info[product_name]','$product_info[product_price]','$product_info[product_quantity]','$product_info[product_image]')";
                    mysqli_query($this->db_connect, $sql);
                }
                $sql = "DELETE FROM tbl_temp_cart WHERE session_id='$session_id'";
                mysqli_query($this->db_connect, $sql);
                header('location:customer_home.php');
            } else {
                die('Query Problem' . mysqli_error($this->db_connect));
            }
        } else {
            die('Query Problem' . mysqli_error($this->db_connect));
        }
    }




    //apllication clss end bracket
}
