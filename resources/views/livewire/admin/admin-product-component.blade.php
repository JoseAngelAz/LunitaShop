<div>
    <style>
        nav svg {height: 20px;}
        nav .hidden {display: block !important}
    </style>
    <div class="container admin_products"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="text-info">Productos</h2>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success pull-right" href="{{route('admin.addproduct')}}">Agregar Nuevo</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>                        
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Precio</th>
                                <th>Precio de venta</th>
                                <th>Categoria</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product ->id}}</td>
                                    <td><img class="img_p_admin" src="{{asset('assets/images/products')}}/{{$product->image}}" alt="productos"></td>
                                    <td>{{$product ->name}}</td>
                                    <td>{{$product ->stock_status}}</td>
                                    <td>{{$product ->regular_price}}</td>
                                    <td>{{$product ->sale_price}}</td>
                                    <td>{{$product ->category->name}}</td>
                                    <td>{{$product ->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                        <a href="#" wire:click.prevent="deleteProduct({{$product->id}})"><i class="fa fa-times fa-2x text-danger borrar_P"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$products ->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
