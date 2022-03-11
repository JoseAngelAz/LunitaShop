<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\Category;

class SearchComponent extends Component
{
    //propiedades para ordenar productos
    public $sorting;
    public $pagesize;
    //para search component
    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize= 12;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
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
            $products = Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);
            
        }
        else if ($this->sorting =='price') {
            //cantidad de productos por precio regular ascendente
            $products = Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','ASC')->paginate($this->pagesize);
            
        }
        else if ($this->sorting =='price_desc') {
            //cantidad de productos por precio regular descendente
            $products = Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','DESC')->paginate($this->pagesize);
            
        }
        else{
            $products = Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->paginate($this->pagesize);
        }
        //categorias
        $categories = Category::all();

        return view('livewire.search-component',['products'=>$products,'categories'=>$categories])->layout("layouts.base");
    }
}
