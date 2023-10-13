<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
        .sclist{
            list-style:none;
        }
        .sclist li{
            line-height:33px;
            border-bottom: 1px solid #ccc;
        }
        .slink i{
            font-size:16px;
            margin-left:12px;
        }
    </style>
    <div class="container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Product
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-success pull-right">Add New Product</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Gallery Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Gallery Image</th>
                                    <th>Action</th>
                                </tr>
                            </tbody>

                        </table>
                       

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>