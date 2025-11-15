<?php
class ProductController {

    // Gọi model
    private $productModel;

    public function __construct() {
        require_once "models/ProductModel.php";
        $this->productModel = new ProductModel();
    }

    // Hiển thị danh sách sản phẩm
    public function index() {
        $products = $this->productModel->getAllProducts();
        include "views/products/list.php";
    }

    // Hiển thị trang thêm
    public function create() {
        include "views/products/add.php";
    }

    // Xử lý thêm sản phẩm
    public function store() {
        $name  = $_POST['name'];
        $price = $_POST['price'];
        $img   = $_POST['img'];

        $this->productModel->addProduct($name, $price, $img);
        header("Location: index.php?controller=product&action=index");
    }

    // Hiển thị trang sửa
    public function edit() {
        $id = $_GET['id'];
        $product = $this->productModel->getProductById($id);
        include "views/products/edit.php";
    }

    // Cập nhật sản phẩm
    public function update() {
        $id    = $_POST['id'];
        $name  = $_POST['name'];
        $price = $_POST['price'];
        $img   = $_POST['img'];

        $this->productModel->updateProduct($id, $name, $price, $img);
        header("Location: index.php?controller=product&action=index");
    }

    // Xóa sản phẩm
    public function delete() {
        $id = $_GET['id'];
        $this->productModel->deleteProduct($id);
        header("Location: index.php?controller=product&action=index");
    }
}
