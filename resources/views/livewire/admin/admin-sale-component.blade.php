<div>
    <div class="container container_sale" >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Configuracion de Venta
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form  class="form-horizontal">

                            <div class="form-group" wire:submit.prevent="updateSale">                                
                                    <label class="col-md-4 control-label">Status</label>
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="status">
                                            <option value="0">Inactivo</option>
                                            <option value="1">Activo</option>
                                        </select>                                
                                    </div>
                            </div>

                            <div class="form-group">                                
                                    <label class="col-md-4 control-label">Fecha de Venta</label>
                                    <div class="col-md-4">
                                        <input id="sale-date" placeholder="Dia/Mes/Año H:M:S" type="text" class="form-control input-md" wire:model="sale_date">                                
                                    </div>
                            </div>

                            <div class="form-group">                                
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-primary">Actualizar</button>
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
        $(function(){
            $('#sale-date').datetimepicker({
                format : 'YY-MM-DD h:m:s',                
            })
            .on('dp.hide',function(ev){
                var data = $('#sale-date').val();
                @this.set('sale_date',data)
            });
            console.log('Esta funcionando el datetimepicker');
        });
        /* 
            $("#sale-date").datetimepicker({
                format: 'yyyy-mm-dd hh:ii',
                autoclose: true
            });
        });*/
    </script>

@endpush