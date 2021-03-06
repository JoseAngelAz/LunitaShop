<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\Category;

class ShopComponent extends Component
{
    //propiedades para ordenar productos
    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize= 12;
        $this->min_price = 1;
        $this->max_price = 1000;
    }

    public function store($product_id, $product_name,$product_price){
        Cart::add($product_id, $product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Articulo agregado a carrito');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        if ($this->sorting =='date') {
            //cantidad de productos por paginacion
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
            
        }
        else if ($this->sorting =='price') {
            //cantidad de productos por precio regular ascendente
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pagesize);
            
        }
        else if ($this->sorting =='price_desc') {
            //cantidad de productos por precio regular descendente
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pagesize);
            
        }
        else{
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);
        }
        //categorias
        $categories = Category::all();

        return view('livewire.shop-component',['products'=>$products,'categories'=>$categories])->layout("layouts.base");
    }
}
