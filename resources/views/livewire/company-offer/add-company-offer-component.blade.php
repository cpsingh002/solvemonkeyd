 <!-- sa-app__toolbar / end -->
 <!-- sa-app__body -->
<div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">
    
                        </nav>
                        <h1 class="h3 m-0">Add Company Offer</h1>
                    </div>
                    <div class="col-auto d-flex">
                        <a href="{{route('admin.company-offer')}}" class="btn btn-primary">All Company Offer</a>
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
                                        <form class="form-horizontal" wire:submit.prevent="storeOffer" enctype="multipart/form-data">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-category/name" class="form-label">Company Name<span class="text-danger"> *</span></label>
                                                <input type="text" placeholder="Company Name" class="form-control"  wire:model="company_name"/>
                                                @error('company_name') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-product/icon" class="form-label">Comapny Logo<span class="text-danger"> *</span></label>
                                                <div class="input-group input-group--sa-slug">
                                                    <input type="file" placeholder="Category Logo" class="input-file"   wire:model="company_logo" />
                                                    @if($company_logo)
                                                        <img src="{{$company_logo->temporaryUrl()}}" width="120" /> 
                                                    @endif
                                                     
                                                </div>
                                                @error('company_logo') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-category/slug" class="form-label">Offer Link<span class="text-danger"> *</span></label>
                                                <div class="input-group input-group--sa-slug">
                                                    <input type="text" placeholder="Offer link" class="form-control" wire:model="offer_link" />
                                                </div>
                                                @error('offer_link') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-product/icon" class="form-label">Offer Template<span class="text-danger"> *</span></label>
                                                <div class="input-group input-group--sa-slug">
                                                    <input type="file" placeholder="Offer Template" class="input-file"   wire:model="offer_template" />
                                                    @if($offer_template)
                                                        <img src="{{$offer_template->temporaryUrl()}}" width="120" /> 
                                                    @endif
                                                </div>
                                                @error('offer_template') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-category/slug" class="form-label">Offer Heading<span class="text-danger"> *</span></label>
                                                <div class="input-group input-group--sa-slug">
                                                    <input type="text" placeholder="Offer Heading" class="form-control" wire:model="heading" wire:keyup="generateslug"/>
                                                </div>
                                                @error('heading') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-category/slug" class="form-label">Slug<span class="text-danger"> *</span></label>
                                                <div class="input-group input-group--sa-slug">
                                                    <input type="text" placeholder="Slug" class="form-control" wire:model="slug" />
                                                </div>
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                             
                                            <div class="mb-4">
                                                <label class="control-label form-label">Offer Details<span class="text-danger"> *</span></label>
                                                <div class="input-group" wire:ignore>
                                                    <textarea class ="form-control" id="description" placeholder="Description" wire:model="offer_details">{!! $offer_details !!}</textarea>
                                                </div>
                                                    @error('offer_details') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                             

                                            
                                            <div class="mb-4">
                                                <div>
                                                    <label for="form-category/parent-category" class="form-label">Status</label>

                                                    <select class="form-select" wire:model="status">
                                                        <option value="">Select</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                                @error('status') <p class="text-danger">{{$message}}</p>@enderror
                                            </div>

                                            <div class="mb-4 text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                        </form>

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
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                @this.set('offer_details', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
 <!-- sa-app__body / end -->
 <!-- sa-app__footer -->