



<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')    
</head>
  <body>
 
      <!-- partial -->
      @include('admin.sidebar')
      @include('admin.navbar')

      <div style="padding-bottom: 30px;" class="container-fluid page-body-wrapper">

        <div class="container" align="center">

            @if (session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">X</button>
              {{ session()->get('message') }}
            </div>
                
            @endif
            <table>
                <tr style="background-color: gray">
                    <td style="padding: 20px;">Title</td>
                    <td style="padding: 20px;">Description</td>
                    <td style="padding: 20px;">Quantity</td>
                    <td style="padding: 20px;">Price</td>
                    <td style="padding: 20px;">Image</td>
                    <td style="padding: 20px;">Update</td>
                    <td style="padding: 20px;">Delete</td>
                    
                </tr>
                     @foreach ($data as $product)
                         
                <tr align="center" style="background-color: black;">
                    <td >{{ $product->title }}</td>
                    <td >{{ $product->description }}</td>
                    <td >{{ $product->quantity }}</td>
                    <td >{{ $product->price }}</td>
                    <td >
                        <img width="100 px" height="100px" src="/productimage/{{ $product->image }}" alt="">
                    </td>
                    <td>
                        <a href="" class="btn btn-primary">Update</a>
                    </td>
                    <td>
                        <a href="{{ url('deleteproduct',$product->id) }}" class="btn btn-danger">Delete</a>
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