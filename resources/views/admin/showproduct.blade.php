

<!DOCTYPE html>
<html lang="en">
  <head>
    
    @include('admin.css')

  </head>
  
  @include('admin.sidebar')
      <!-- partial -->
     
      @include('admin.navbar')
        <!-- partial -->
        
        {{-- @include('admin.body') --}}
        <div style="padding-bottom:30px;" class="container-fluid page-body-wrapper">
          <div class="container" align="center">

            @if (session()->has('message'))

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
     
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>

             {{ session()->get('message') }}

            </div>
               
           @endif

            <table>

              <tr style = "background-color:grey">

              <td style = "padding:20px">Title</td>
              <td style = "padding:20px">Description</td>
              <td style = "padding:20px">Quantity</td>
              <td style = "padding:20px">Price</td>
              <td style = "padding:20px">Image</td>
              <td style = "padding:20px">Update</td>
              <td style = "padding:20px">Delete</td>

              </tr>

              @foreach ($data as $product)
                  
              
              <tr style = "background-color:black; align-items-center;">

                <td style = "padding:20px">{{ $product->title }}</td>
                <td style = "padding:20px">{{ $product->description }}</td>
                <td style = "padding:20px">{{ $product->quantity }}</td>
                <td style = "padding:20px">{{ $product->price }}</td>
                <td style = "padding:20px">
                  <img height = "100px" width="100px" src="/productimage/{{ $product -> image }}"
                </td>

                <td> 
                  <a class="btn btn-primary" href="{{ url('updateview', $product->id)}}">Update</a>
                </td>
               

                <td> 
                  <a class="btn btn-danger" href="{{ url('deleteproduct', $product->id)}}">Delete</a>
                </td>
  
              </tr>  

              @endforeach

            </table>

          
          </div>
        </div>

          <!-- partial -->
        
        @include('admin.script')

  </body>
</html>