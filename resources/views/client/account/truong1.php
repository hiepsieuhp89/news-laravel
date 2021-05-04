<?php 
    include "models/CartModel.php";
    class CartController extends Controller{
        use CartModel;
        //ham tao
        public function __construct(){
            //kiem tra neu gio hang chua ton tai thi khoi tao no
            if(!isset($_SESSION["cart"]))
                $_SESSION["cart"] = array();
        }
        //ham hien thi gio hang
        public function index(){
            $this->loadView("CartView.php");
        }
        //them san pham vao gio hang
        public function create(){
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
            $size = isset($_GET["size"]) ? $_GET["size"] : 0;
            //goi ham cartAdd tu model de them phan tu vao session array
            $this->cartAdd($id,$size);
            //quay lai trang gio hang
            header("location:index.php?controller=cart");
        }
        
        //them san pham vao gio hang
        public function createWithNumber(){
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
            $quantity = isset($_GET["quantity"]) ? $_GET["quantity"] : 0;
            $size = isset($_GET["size"]) ? $_GET["size"] : 0;
            //goi ham cartAdd tu model de them phan tu vao session array
            $this->cartAddWithNumber($id,$quantity,$size);
            //quay lai trang gio hang
            header("location:index.php?controller=cart");
        }
    
        //xoa phan tu khoi gio hang
        public function delete(){
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
            //goi ham cartDelete tu model de xoa phan tu khoi session array
            $this->cartDelete($id);
            //quay lai trang gio hang
            header("location:index.php?controller=cart");
        }
        //update so luong san pham trong gio hang
        public function update(Request $req){
            $cart = Session('cart') ? Session::get('cart') : null;
            foreach($cart as $rows){
                $product_id = $rows["id"];
                $quantity = $req->quantity;
                //goi ham update so luong san pham
                $this->cartUpdate($product_id,$quantity);
            }
            //quay lai trang gio hang
            return redirect()->route('gio hang');
        }
        //thanh toan gio hang
            //thanh toan gio hang
        public function checkOut(){
            //kiem tra neu user chua dang nhap thi di chuyen den trang login, nguoc lai thi thanh toan gio hang
            if(Session('customer_id'))
              {
                if(Session("customer_phone")==0)
                {
                    header("location:index.php?controller=process&action=personalinfor");
                    
                }

                else{
                    $this->cartCheckOut();
                    //huy gio hang
                    $_SESSION["cart"] = array();
                    header("location:index.php?controller=account&action=notify&message=checkOutSuccess");
                }
            }
            else{
                return redirect()->route('login');
            }
        }
        //xoa gio hang
        public function destroy(){
            $this->cartDestroy();
            //quay lai trang gio hang
            return redirect()->route('gio hang');
        }
    }
 ?>


Model

<?php
    trait CartModel{        
        public function cartAdd($id){
            if(isset($_SESSION['cart'][$id])){
                //nếu đã có sp trong giỏ hàng thì số lượng lên 1
                $_SESSION['cart'][$id]['number']++;
            } else {
                //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
                //$product = db::get_one("select * from products where id=$id");
                //---
                //PDO
                $conn = Connection::getInstance();
                $query = $conn->prepare("select * from products where id=:id");
                $query->execute(array("id"=>$id));
                $query->setFetchMode(PDO::FETCH_OBJ);
                $product = $query->fetch();
                //---
                
                $_SESSION['cart'][$id] = array(
                    'id' => $id,
                    'name' => $product->name,
                    'photo' => $product->photo,
                    'number' => 1,

                    'giamoi' => $product->giamoi
                );
            }
        }
         
        public function cartAddWithNumber($id,$quantity,$size){
            if(isset($_SESSION['cart'][$id]) && $_SESSION['cart'][$id]["size"] == $size){
                
                $_SESSION['cart'][$id]['number'] += $quantity;
                $_SESSION['cart'][$id]['size'] += $size;
            }
                
           
            else {
                //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
                //$product = db::get_one("select * from products where id=$id");
                //---
                //PDO
                $conn = Connection::getInstance();
                $query = $conn->prepare("select * from products where id=:id");
                $query->execute(array("id"=>$id));
                $query->setFetchMode(PDO::FETCH_OBJ);
                $product = $query->fetch();
                //---
                
                $_SESSION['cart'][$id] = array(
                    'id' => $id,
                    'name' => $product->name,
                    'photo' => $product->photo,
                    'number' => $quantity,
                    'size' => $size,
                    'giamoi' => $product->giamoi
                );
            }
        }
        
        /**
         * Cập nhật số lượng sản phẩm
         * @param int
         * @param int
         */
        public function cartUpdate($id, $number){
            if($number==0){
                //xóa sp ra khỏi giỏ hàng
                unset($_SESSION['cart'][$id]);
            } else {
                $_SESSION['cart'][$id]['number'] = $number;
            }
        }
        /**
         * Xóa sản phẩm ra khỏi giỏ hàng
         * @param int
         */
        public function cartDelete($id){
            unset($_SESSION['cart'][$id]);
        }
        /**
         * Tổng giá trị giỏ hàng
         */
        public function cartTotal(){
            $total = 0;
            foreach($_SESSION['cart'] as $product){
                $total += ($product['giamoi']) * $product['number'];
            }
            return $total;
        }
        /**
         * Số sản phẩm có trong giỏ hàng
         */
        public function cartNumber(){
            $number = 0;
            foreach($_SESSION['cart'] as $product){
                $number += $product['number'];
            }
            return $number;
        }
        /**
         * Danh sách sản phẩm trong giỏ hàng
         */
        public function cartList(){
            return $_SESSION['cart'];
        }
        /**
         * Xóa giỏ hàng
         */
        public function cartDestroy(){
            $_SESSION['cart'] = array();
        }
        //=============
        //checkout
        public function cartCheckOut(){
            $conn = Connection::getInstance();          
            //lay id vua moi insert
            $customer_name = $_SESSION["customer_name"];
            $customer_id = $_SESSION["customer_id"];
            //---
            //---
            //insert ban ghi vao orders, lay order_id vua moi insert
            //lay tong gia cua gio hang
              $queryPhone = $conn->query("SELECT OCTET_LENGTH(phone) as phone FROM customers WHERE id = '$customer_id'");
             $result = $queryPhone->fetch();
                $_SESSION["customer_phone"] = $result->phone;
                
            if($_SESSION["customer_phone"] == 0)
            {
                header("location:index.php?controller=process&action=personalinfor");
            }

            else
            {
            $price = $this->cartTotal();
            $query = $conn->prepare("insert into orders set customer_id=:customer_id, customer_name=:customer_name, date=now(),price=:price");
            $query->execute(array("customer_id"=>$customer_id,"customer_name"=>$customer_name,"price"=>$price));
            //lay id vua moi insert
            $order_id = $conn->lastInsertId();
            //---
            //duyet cac ban ghi trong session array de insert vao orderdetails
            foreach($_SESSION["cart"] as $product){
                $query = $conn->prepare("insert into orderdetails set order_id=:order_id, product_id=:product_id, giamoi=:giamoi,size=:size, quantity=:quantity");
                $query->execute(array("order_id"=>$order_id,"product_id"=>$product["id"],"giamoi"=>$product["giamoi"],"size"=>$product["size"],"quantity"=>$product["number"]));
        
            }
        }
            //xoa gio hang
            unset($_SESSION["cart"]);
        }
        //=============
    }   
?>
