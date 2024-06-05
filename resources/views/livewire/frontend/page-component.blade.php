
<div id="top" class="sa-app__body">
    
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">

                        </nav>
                        <h1 class="h3 m-0">Add Product</h1>
                    </div>
                    <div class="col-auto d-flex">
                        <a href="{{route('admin.products')}}" class="btn btn-primary">All Products</a>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="sa-entity-layout">
                        <div class="sa-entity-layout__body">
                            <div class="sa-entity-layout__main">
                                <div class="card">
                                    <div class="card-body p-5">
                                        @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                        @endif
                                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="saveSettings">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                            </div>

                                            <div class="row">
                                                <div class="sa-example__body py-0">
                                                    <div class="mb-4">
                                                        <label class="control-label">Term and Condition<span class="text-danger"> *</span></label>
                                                        <div  wire:ignore>
                                                            <textarea class ="form-control" id="tc" placeholder="Short Description" wire:model="tc">{!! $tc !!}</textarea>
                                                        </div>
                                                            @error('tc') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="control-label">Listing poliyies<span class="text-danger"> *</span></label>
                                                        <div  wire:ignore>
                                                            <textarea class ="form-control" id="lp" placeholder="Description" wire:model="lp">{!! $lp !!}</textarea>
                                                        </div>
                                                            @error('lp') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                    
                                                    <div class="mb-4">
                                                        <label class="control-label">pp<span class="text-danger"> *</span></label>
                                                        <div  wire:ignore>
                                                            <textarea class ="form-control" id="pp" placeholder="Description" wire:model="pp">{!! $pp !!}</textarea>
                                                        </div>
                                                            @error('pp') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="control-label">faq<span class="text-danger"> *</span></label>
                                                        <div  wire:ignore>
                                                            <textarea class ="form-control" id="faq" placeholder="Description" wire:model="faq">{!! $faq !!}</textarea>
                                                        </div>
                                                            @error('faq') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-4 text-center">
                                                        <button  class="btn btn-primary" wire:click.prevent="preview">Preview</button>
                                                        <button type="submit"
                                                            class="btn btn-primary">Submit</button>
                                                    </div>
                                            </div>
                                        </form>
                                        @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    


<!-- sa-app__body / end -->
<!-- sa-app__footer -->

@push('scripts')

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create( document.querySelector( '#tc' ) )
            .then(editor => {
                editor.model.document.on('change:data', () => {
                @this.set('tc', editor.getData());
                })
            })
        .catch( error => {
            console.error( error );
        } );
                    
</script>
<script>
        ClassicEditor
            .create(document.querySelector('#lp'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                @this.set('lp', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#faq'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                @this.set('faq', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#pp'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                @this.set('pp', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush