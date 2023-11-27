 @extends('layouts/base')
@section('container')
<main> 

<style>
    .btn-tabs {
        border-radius: 6px;
        border: 1px solid gray;
        padding: 10px 20px;
        margin: 5px;
    }

    /* .btn-tabs.active{
    border:1px solid red
} */
    </style>

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
                                    <!-- <div class="tabs my-3"> -->
                                        <!-- <a href="#basic" class="btn-tabs mx-2">Basic</a>
                                            <a href="#details" class="btn-tabs mx-2">Details</a>
                                            <a href="#location" class="btn-tabs mx-2">Location</a>
                                            <a href="#photos" class="btn-tabs mx-2">Photos/Videos</a>
                                            <a href="#tag" class="btn-tabs mx-2">Tag</a>
                                            <a href="#contact" class="btn-tabs mx-2">Contact</a> -->


                                        <!-- <div class="view">
                                                <button class="customTab btn-tabs active" data-toggle-target=".customTab-content-1">Basic</button>
                                                <button class="customTab btn-tabs" data-toggle-target=".customTab-content-2">Details</button>
                                                <button class="customTab btn-tabs" data-toggle-target=".customTab-content-3">Location</button>
                                                <button class="customTab btn-tabs" data-toggle-target=".customTab-content-4">Photos/Videos</button>
                                                <button class="customTab btn-tabs" data-toggle-target=".customTab-content-5">Tag</button>
                                                <button class="customTab btn-tabs" data-toggle-target=".customTab-content-6">Contact</button>
                                            </div> -->

                                        <!-- </div> -->

                                        <!-- <div class="customTab-content customTab-content-1 active">
                                            <p>hello</p>
                                        </div> -->
                                        <!-- <div class="customTab-content customTab-content-2">
                                            <p>hello4545</p>
                                        </div> -->

                                        <!-- <div  class="tab"> -->
                                        <!-- <div id="basic" class="tab-content customTab-content customTab-content-1 active"> -->
                                    
                                    {{$slot}}
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
<!-- @endsection -->

<script>
// $('.customTab').click(function() {
//     // alert("hhjj")
//     $('.btn-tabs').css({
//         'color',
//         'orange'
//     })
// })
</script>