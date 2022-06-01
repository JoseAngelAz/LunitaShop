<div>
    <div class="container slider_contenerdor">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Editar Slide
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-success pull-right" href="{{route('admin.homeslider')}}">Todos los Slides</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form wire:submit.prevent="updateSlide" class="form-horizontal">

                            <!--Campo formulario-->
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Titulo</label>
                                <div class="col-md-4">
                                    <input wire:model = "title" placeholder="Titulo" type="text" class="form-control input-md">
                                </div>
                            </div>
                            <!--Campo formulario-->
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Subtitulo</label>
                                <div class="col-md-4">
                                    <input wire:model = "subtitle" placeholder="Sub titulo" type="text" class="form-control input-md">
                                </div>
                            </div>
                            <!--Campo formulario-->
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Precio</label>
                                <div class="col-md-4">
                                    <input wire:model = "price" placeholder="Precio" type="text" class="form-control input-md">
                                </div>
                            </div>
                            <!--Campo formulario-->
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Link</label>
                                <div class="col-md-4">
                                    <input wire:model = "link" placeholder="Link" type="text" class="form-control input-md">
                                </div>
                            </div>
                            <!--Campo formulario-->
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Imagen</label>
                                <div class="col-md-4">
                                    <input wire:model = "newimage" placeholder="Imagen" type="file" class="input-file">
                                    @if ($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" alt="imagen" width="120">
                                        @else
                                        <img width="120" src="{{asset('assets/images/sliders')}}/{{$image}}" alt="nueva imagen">
                                    @endif
                                </div>
                            </div>
                            <!--Campo formulario-->
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select wire:model = "status" name="" id="" class="form-control">
                                        <option value="0">Inactivo</option>
                                        <option value="1">Activo</option>
                                    </select>
                                </div>
                            </div>
                            <!--Campo formulario-->
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-block">Actualizar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>