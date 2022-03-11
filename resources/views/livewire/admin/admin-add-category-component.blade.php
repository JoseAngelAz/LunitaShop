<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Agregar Nueva Categoria
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">Categorias</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="storeCategory">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Nombre de la Categoria</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Nombre de la Categoria" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Slug de la Categoria</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Slug de la Categoria" class="form-control input-md" wire:model="slug"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Nombre de la Categoria</label>
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
