<div>
    <div class="container admin_add_product_container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Agregar Nuevo Producto
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">Productos</a>
                            </div>
                        </div>
                        <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                            <form enctype="multipart/form-data" wire:submit.prevent="addProduct" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Nombre del Producto</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Nombre del Producto" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Product Slug</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Descripción corta</label>
                                    <div class="col-md-4">                                        
                                        <textarea placeholder="Descripción corta" class="form-control" wire:model="short_description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Descripción</label>
                                    <div class="col-md-4">
                                        <textarea placeholder="Descripción" class="form-control" wire:model="description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Precio Regular</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Precio Regular" class="form-control input-md" wire:model="regular_price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Precio de venta</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Precio de venta" class="form-control input-md" wire:model="sale_price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">SKU</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Stock</label>
                                    <div class="col-md-4">
                                        <select  class="form-control" wire:model="stock_status">
                                            <option value="instock">En Stock</option>
                                            <option value="outofstock">Fuera de Stock</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Destacado</label>
                                    <div class="col-md-4">
                                        <select  class="form-control" wire:model="featured">
                                            <option value="0">No</option>
                                            <option value="1">Si</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">cantidad</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Cantidad" class="form-control input-md" wire:model="quantity">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Imagen</label>
                                    <div class="col-md-4">
                                        <input type="file" class="input-file" wire:model="image">
                                        @if($image)
                                        <img src="{{$image->temporaryUrl()}}" width="120"/>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Categoria</label>
                                    <div class="col-md-4">
                                        <select  class="form-control" wire:model="category_id">
                                            <option value="">Seleccionar Categoria</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
