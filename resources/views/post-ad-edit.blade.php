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
                        <h4 class="priceTittle pt-20 pb-20">Edit your ad</h4>
                    </nav>


                    <div class="card">
                        <div class="card-body">
                        <div class="listingDetails-Wrapper">
                        <div class="listingDetails">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="select-itms">
                                        <label class="infoTitle">Item category</label>
                                        <select name="select" class="niceSelect">
                                            <option value>Electronics</option>
                                            <option value>Food</option>
                                            <option value>Cloth</option>
                                            <option value>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="select-itms">
                                        <label class="infoTitle">Item subcategory</label>
                                        <select name="select" class="niceSelect">
                                            <option value>Subcategory</option>
                                            <option value>Subcategory 1</option>
                                            <option value>Subcategory 2</option>
                                            <option value>Subcategory 3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="condition">
                                        <h6 class="infoTitle">Item Condition</h6>
                                        <div class="cs_radio_btn">
                                            <div class="radio">
                                                <input id="radio-1" name="radio" type="radio" tabindex="0">
                                                <label for="radio-1" class="radio-label">Pre-Loved</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio-2" name="radio" type="radio" tabindex="0">
                                                <label for="radio-2" class="radio-label">New</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="condition">
                                        <h6 class="infoTitle">Authenticity</h6>
                                        <div class="cs_radio_btn">
                                            <div class="radio">
                                                <input id="radio-3" name="radio" type="radio" tabindex="0">
                                                <label for="radio-3" class="radio-label">Pre-Loved</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio-4" name="radio" type="radio" tabindex="0">
                                                <label for="radio-4" class="radio-label">New</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <label class="infoTitle">Title</label>
                                    <div class="input-form input-form2">
                                        <input type="text" placeholder="Rs 430">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <label class="infoTitle">Description</label>
                                    <div class="input-form">
                                        <textarea name="message " id="message"
                                            placeholder="About your project"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <label class="infoTitle">Price</label>
                                    <div class="input-form">
                                        <input type="text" placeholder="Rs 430">
                                        <div class="icon"><i class="las la-calendar-week"></i></div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label class="checkWrap2">Negotiable
                                        <input class="effectBorder" type="checkbox" value>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-sm-12">
                                    <div class="btn-wrapper mb-10">
                                        <a href="#" class="cmn-btn4 w-100">Continue</a>
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