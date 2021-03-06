<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manejar Categorias en Home
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form wire:submit.prevent="updateHomeCategory" class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Nada de Productos</label>
                                <div class="col-md-4" wire:ignore>                                    
                                    <select name="categories[]" multiple="multiple" wire:model="selected_categories" class="sel_categories form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">N° de Productos</label>
                                <div class="col-md-4">                                    
                                    <input type="text" class="form-control input-md" wire:model="numberofproducts">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Nada de Productos</label>
                                <div class="col-md-4">                                    
                                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
		$(document).ready(function(){
			$('.sel_categories').select2();
			$('.sel_categories').on('change', function(e){
                var data = $('.sel_categories').select2("val");
                @this.set('selected_categories',data);
            });
		});
    </script>
@endpush