@extends('layouts/base')
@section('container')
<main>



    <div class="addList-Details section-padding2">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-12">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Properties</a></li>
                            <li class="breadcrumb-item"><a href="#">Post ad</a></li>
                        </ol>
                        <h4 class="priceTittle pt-20 pb-20">Post your ad</h4>
                    </nav>


                    <div class="card">
                        <div class="card-body">
                            <div class="listingDetails-Wrapper">
                                <div class="listingDetails">






                                    <div class="row">
                                        <style>
                                        .tabs {
                                            display: flex;
                                        }

                                        .tab {
                                            display: none;
                                        }

                                        .tab:target,
                                        .tab:first-child {
                                            display: block;
                                        }

                                        .tab-content {
                                            padding: 10px;
                                            border: 1px solid #ccc;
                                        }

                                        .btn-tabs {
                                            border-radius: 6px;
                                            border: 1px solid;
                                            padding: 10px 20px;
                                            /* margin: 10px; */
                                        }
                                        </style>



                                        <div class="tabs my-3 justify-content-center">
                                            <a href="#basic" class="btn-tabs mx-2">Basic</a>
                                            <a href="#details" class="btn-tabs mx-2">Details</a>
                                            <a href="#location" class="btn-tabs mx-2">Location</a>
                                            <a href="#photos" class="btn-tabs mx-2">Photos/Videos</a>
                                            <a href="#tag" class="btn-tabs mx-2">Tag</a>
                                            <a href="#contact" class="btn-tabs mx-2">Contact</a>


                                            <!-- <div class="view">
                                                <button class="customTab active" data-toggle-target=".customTab-content-1"><i
                                                        class="las la-th-large"></i></button>
                                                <button class="customTab "
                                                    data-toggle-target=".customTab-content-2"><i
                                                        class="las la-bars"></i></button>
                                            </div> -->

                                        </div>

                                        <!-- <div class="customTab-content customTab-content-1 active">
                                            <p>hello</p>
                                        </div>
                                        <div class="customTab-content customTab-content-2">
                                            <p>hello4545</p>
                                        </div> -->

                                        <div id="basic" class="tab">
                                            <div class="tab-content">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Title</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="Product Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Description</label>
                                                        <div class="input-form input-form2">
                                                            <textarea placeholder="Description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="details" class="tab">
                                            <div class="tab-content">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Product Specification</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="Product Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Product Price</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="Product Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">How many year Old</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="Product Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Condition</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="Product Title">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="location" class="tab">

                                            <div class="tab-content">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">City</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="Product Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Address</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="Product Title">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="photos" class="tab">

                                            <div class="tab-content">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Thumbnail Image</label>
                                                        <div class="input-form input-form2">
                                                            <input type="file" placeholder="Product Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Featured Image</label>
                                                        <div class="input-form input-form2">
                                                            <input type="file" placeholder="Product Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle"> Image</label>
                                                        <div class="input-form input-form2">
                                                            <input type="file" placeholder="Product Title">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="tag" class="tab">

                                            <div class="tab-content">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Meta Tag</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="Product Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Meta Description</label>
                                                        <div class="input-form input-form2">
                                                            <textarea placeholder="Meta Description"></textarea>
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


                </div>
            </div>
        </div>
    </div>

</main>
@endsection