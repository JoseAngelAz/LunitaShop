<div class="wrap-search center-section">
    <div class="wrap-search-form">
        <form action="#" id="form-search-top" name="form-search-top">
            <input type="text" name="search" value="" placeholder="Search here...">
            <button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
            <div class="wrap-list-cate">
                <input type="hidden" name="product_cat" value="{{$product_cat}}" id="product-cate">
                <input type="hidden" name="product_id" value="{{$product_cat_id}}" id="product-cate">
                <a href="#" class="link-control">{{str_split($product_cat,12)[0]}}</a>
                <ul class="list-cate">
                    <li class="level-0">Categorias</li>
                    @foreach ($categories as $category )
                    <li class="level-1" data-id="{{$category->id}}">{{$category->name}}</li>                        
                    @endforeach                    
                </ul>
            </div>
        </form>
    </div>
</div>