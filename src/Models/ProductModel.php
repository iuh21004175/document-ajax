<?php

namespace App\Models;

use App\Core\Model;

class ProductModel extends Model
{
    public function readAllProducts()
    {
        $sql = "SELECT * FROM product";
        $table = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_assoc($table)) {
            yield $row;
        }
    }
    public function readProductByPage($page, $step){
        $start = ($page - 1) * $step;
        $end = $page * $step;
        $max_end = iterator_count($this->readAllProducts());
        if($end > $max_end){
            $end = $max_end;
            $step = $end - $start;
        }
        $sql = "SELECT * FROM product LIMIT $start, $step";
        $table = mysqli_query($this->conn, $sql);
        $arrProduct = array();
        while ($row = mysqli_fetch_assoc($table)) {
            $arrProduct[] = $row;
        }
        return $arrProduct;
    }
}