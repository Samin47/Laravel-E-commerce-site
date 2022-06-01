<!DOCTYPE html>
<html lang="en">
  <head>
    
    @include('admin.css')

    <style type="text/css">

    .title{
      color:white;
      padding-top: 25px;
      font-size: 25px;
    }

    label{
      display: inline-block;
      width: 200px;
    }

    </style>

  </head>
  
  @include('admin.sidebar')
      <!-- partial -->
     
      @include('admin.navbar')
        <!-- partial -->
        
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
            <h1 class="title">Add Product</h1>
            
            @if (session()->has('message'))

             <div class="alert alert-warning alert-dismissible fade show" role="alert">
      
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>

              {{ session()->get('message') }}

             </div>
                
            @endif
            
            <form action='{{ url('uploadproduct') }}' method='post' enctype="multipart/form-data">

              @csrf

                <div style="padding:15px;">
                    <label>Product title</label>
                    <input style="color:black" type="text" name="title" placeholder="Product Title" required="">
                </div>

                <div style="padding:15px;">
                    <label>Price</label>
                    <input style="color:black" type="number" name="price" placeholder="Price" required="">
                </div>

                <div style="padding:15px;">
                    <label>Description</label>
                    <input style="color:black" type="text" name="description" placeholder="Description" required="">
                </div>

                <div style="padding:15px;">
                    <label>Quantity</label>
                    <input style="color:black" type="number" name="quantity" placeholder="Quantity" required="">
                </div>

                <div style="padding:15px;">
                    <input type="file" name="file">
                </div>

                <div style="padding:15px;">
                    <input class="btn btn-success" type="submit">
                </div>

            </form>


           </div>
        </div>

          <!-- partial -->
        
        @include('admin.script')

  </body>
</html>