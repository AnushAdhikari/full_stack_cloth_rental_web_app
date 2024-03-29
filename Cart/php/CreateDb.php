<?php


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;
        public $categorytable;

        // class constructor
    public function __construct(
        $dbname = "logindb",
        $tablename = "product_table",
        $categorytable = "category_table",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->categorytable = $categorytable;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             product_name VARCHAR (100) NOT NULL,
                             product_price FLOAT,
                             product_image VARCHAR (100)
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }

    // get product from the database
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

    // get women product from the database
    public function getwomenproductData($product_type){
        $sql = "SELECT * FROM $this->tablename  WHERE product_type = 'women'";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

    // get men product from the database
    public function getmensproductData($product_type){
        $sql = "SELECT * FROM $this->tablename  WHERE product_type = 'men'";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

    // get product data from the database
    public function getproductData($product_id){
        $sql = "SELECT * FROM $this->tablename  WHERE product_id=".$product_id."";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
    //get related products from the database
    public function getrelatedproduct($product_id,$tag,$product_type){
        $sql = "SELECT * FROM $this->tablename WHERE tag = '$tag'And product_type = '$product_type' And Not product_id = '$product_id'  LIMIT 3";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }else{
            return $result;
        }
    }
    public function getrelatedcategory($tag,$product_type){
        $sql = "SELECT * FROM $this->tablename WHERE tag = '$tag'And product_type = '$product_type' And NOT status='unpublish' ";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }else{
            return $result;
        }
    }

    public function getrelatedcategorytype($product_type){
        $sql = "SELECT * FROM $this->categorytable WHERE  product_type = '$product_type' ";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }else{
            return $result;
        }
    }
}







