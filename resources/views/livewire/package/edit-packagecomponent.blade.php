<div>
    <div class= "container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Package
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.packages')}}" class="btn btn-success"> All Package</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updatePacakge">
                        <div class="form-group">
                                <label class="col-md-4 control-label">Package Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Package Name" class="form-control input-md" wire:model="pname" />
                                    @error('pname') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Package Type</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Package Type" class="form-control input-md"  wire:model="ptype"/>
                                    @error('ptype') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Package Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Package Price" class="form-control input-md"  wire:model="price"/>
                                    @error('price') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">PAckage Validity</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Package Validity" class="form-control input-md"  wire:model="validity"/>
                                    @error('validity') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Package Upto</label>
                                <div class="col-md-4">
                                    <input type="text" id="sale-date" placeholder="YYYY/MM/DD hh:mm:ss" class="form-control input-md" wire:model="up_to">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
            format : 'Y-MM-DD hh:mm:ss',
        })
        .on('dp.change',function(ev){
            var data= $('#sale-date').val();
            @this.set('sale_date',data);
        });
    });
</script>
@endpush