@extends('layouts.admin')

@section('content')

<div id="top" class="sa-app__body">
     <div class="mx-xxl-3 px-4 px-sm-5">
         <div class="py-5">
             <div class="row g-4 align-items-center">
                 <div class="col">
                     <nav class="mb-2" aria-label="breadcrumb">

                     </nav>
                     <h1 class="h3 m-0">Product Import  </h1>
                 </div>
                 <div class="col-auto d-flex">
                     <a href="#" class="btn btn-primary">Download sample file</a>
                 </div>
             </div>
         </div>
     </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-hrader"></div>
                    <div class="card-body">
                        @if(Session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status')}}
                            </div>
                        @endif
                        @if(isset($errors) && $errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                {{$error}}
                                @endforeach
                            </div>
                        @endif

                        @if(session()->has('failures'))
                        <table class="table table-danger">
                            <tr>
                                <th>Row</th>
                                <th>Attribute</th>
                                <th>Error</th>
                            </tr>
                            @foreach(session()->get('failures') as $validation)
                                <tr>
                                    <td>{{$validation->row()}}</td>
                                    <td>{{$validation->attribute()}}</td>
                                    <td>
                                        <ul>
                                            @foreach($validation->errors() as $e)
                                                <li>{{$e}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        @endif
                       
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="container" style="margin-bottom:26px;">
    <div class="row" style="margin-bottom:4%;">
      <div class="col-md-8 m-auto">
       <div class="sa-entity-layout">
        <div class="sa-entity-layout__body">
            <div class="sa-entity-layout__main">
              <div class="card">
                 <div class=" card-body m-auto">
                   <div class="row"> 
                    <div class=" col-xl-12">
                     <div>
                         <div >
                             @if(session('status'))
                             <div class="alert alert-success">
                                 {{ session('status') }}
                             </div>
                             @endif
                             <form class="needs-validation" method="post" action="{{route('upload.file')}}" novalidate enctype="multipart/form-data">
                                 @csrf
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="mb-3">
                                             <label class="form-label" for="productionName">Upload CSV File</label>
                                             <p>Download a <a href="{{asset('files/CSV Uploading Format File.csv')}}">sample CSV template</a> to see an example of the format required.</p>
                                             <input type="file" class="form-control @error('file') is-invalid @enderror" id="productionName" name="file" placeholder="csv" value="" required>
                                             @error('file')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                         </div>
                                     </div>
                            <!-- end col -->
                                 </div>
                                 <button class="btn btn-primary" type="submit">Submit</button>
                             </form>
                         </div>
                     </div>
                     <!-- end card -->
                    </div> <!-- end col -->
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
@endsection

    
