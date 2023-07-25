<?php


namespace common\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($product , $qty = 1){
        if (isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$product->id] = [

                'name' => $product->name,
                'price' => ($product->sale == 1 ? $product->new_price : $product->price),
                'qty' => $qty,
                'image' => $product->image,

            ];
        }

        if($_SESSION['cart'][$product->id]['qty'] == 0){
            unset($_SESSION['cart'][$product->id]);
        }

        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + ($product->sale == 1 ? $product->new_price : $product->price) * $qty : ($product->sale == 1 ? $product->new_price : $product->price) * $qty;
    }
    // Recalc
    public function recalc($id){
        if (!isset($_SESSION['cart'][$id])){
            return false;
        }else{
            $qtyMinus = $_SESSION['cart'][$id]['qty'];
            $sumMinus = $_SESSION['cart'][$id]['price'] * $qtyMinus;

            $_SESSION['cart.qty'] -=$qtyMinus;
            $_SESSION['cart.sum'] -=$sumMinus;
            unset($_SESSION['cart'][$id]);
        }
    }

    public function addToLike($product,$qty = 1){

            $_SESSION['like'][$product->id] = [
                'name' => $product->name,
                'price' => ($product->sale == 1 ? $product->new_price : $product->price),
                'image' => $product->image,

            ];

            $_SESSION['like.qty'] = isset($_SESSION['like.qty']) ? $_SESSION['like.qty'] + $qty : $qty;

            if(($_SESSION['like.qty'] == 0)){
                unset($_SESSION['like']);
                unset($_SESSION['like.qty']);
            }



    }

    public function recalcLike($id){
        if (!isset($_SESSION['like'][$id])){
            return false;
        }else{
            $_SESSION['like.qty'] -= 1;
            unset($_SESSION['like'][$id]);
            if ($_SESSION['like.qty'] == 0){

                unset($_SESSION['like']);
            }
        }
    }
}