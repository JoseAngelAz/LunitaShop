<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\Category;

class CategoryComponent extends Component
{
    //propiedades para ordenar productos
    public $sorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug){
        $this->sorting = "default";
        $this->pagesize= 12;
        $this->category_slug = $category_slug;
    }

    public function store($product_id, $product_name,$product_price){
        Cart::add($product_id, $product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Articulo agregado a carrito');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        //category slug
        $category = Category::where('slug',$this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        //lista de categorias desplegable
        if ($this->sorting =='date') {
            //cantidad de productos por paginacion
            $products = Product::where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pagesize);
            
        }
        else if ($this->sorting =='price') {
            //cantidad de productos por precio regular ascendente
            $products = Product::where('category_id',$category_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);
            
        }
        else if ($this->sorting =='price_desc') {
            //cantidad de productos por precio regular descendente
            $products = Product::where('category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);
            
        }
        else{
            $products = Product::where('category_id',$category_id)->paginate($this->pagesize);
        }
        //categorias
        $categories = Category::all();

        return view('livewire.category-component',['products'=>$products,'categories'=>$categories,'category_name'=>$category_name])->layout("layouts.base");
    }
}
