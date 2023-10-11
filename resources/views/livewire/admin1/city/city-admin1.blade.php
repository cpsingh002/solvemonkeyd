
                <!-- sa-app__toolbar / end --><!-- sa-app__body -->
                <div id="top" class="sa-app__body">
                    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                        <div class="container">
                            <div class="py-5">
                                <div class="row g-4 align-items-center">
                                    <div class="col">
                                        <nav class="mb-2" aria-label="breadcrumb">
                                            
                                        </nav>
                                        <h1 class="h3 m-0">Categories</h1>
                                    </div>
                                    <div class="col-auto d-flex"><a href="app-category.html" class="btn btn-primary">New category</a></div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="sa-divider"></div>
                                <table class="sa-datatables-init" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                                    <thead>
                                        <tr>
                                    
                                            <th>Id</th>
                                            <th>City Name</th>
                                            <th>State</th>
                                            <th>Country</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cities as $city)
                                        <tr>
                                            <!-- <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." /></td> -->
                                            <td>{{$city->id}}</td>
                                            <td>{{$city->city}}</td>
                                            <td>{{$city->state->name}}</td>
                                            <td>{{$city->state->country->name}}</td>
                                            <td>
                                            @if($city->status==1)
                                            <a href="#" onclick="confirm('Are you sure, You want to Deactive this City') || event.stopImmediatePropagation()" wire:click.prevent="deactiveCity({{$city->id}})" style="margin-left:10px;"><i class="fa fa-edit"></i></a>
                                            @else
                                            <a href="#" onclick="confirm('Are you sure, You want to Active this City') || event.stopImmediatePropagation()" wire:click.prevent="deleteCity({{$city->id}})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                            @endif
                                        </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sa-app__body / end --><!-- sa-app__footer -->
              