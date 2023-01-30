



<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')    

   <style>

   .title
   {
    color: white;
    padding:25px;
    font-size:25px;

   }

   label
   {
    display: inline-block;
    width: 200px;
   }
   </style>

</head>
  <body>
 
      <!-- partial -->
      @include('admin.sidebar')
      @include('admin.navbar')


      <div class="container-fluid page-body-wrapper">

        <div class="container" align="center">
            <h1 class="title">Add Products</h1>

            @if (session()->has('message'))
            <div class="alert alert-success">
               <button type="button" class="close" data-dismiss="alert">X</button>
               {{ session()->get('message') }}
            </div>
                
            @endif

          <form action="{{ url('uploadproduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="padding: 15px">
                <label for="">Product Title</label>
                <input style="color: black" type="text" name="title" placeholder="Give a product title" required="">
            </div>

            <div style="padding: 15px">
                <label for="">Price</label>
                <input style="color: black" type="number" name="price" placeholder="Give a product price" required="">
            </div>

            <div style="padding: 15px">
                <label for="">Description</label>
                <input style="color: black" type="text" name="des" placeholder="Give a product description" required="">
            </div>

            <div style="padding: 15px">
                <label for="">Quantity</label>
                <input style="color: black" type="text" name="quantity" placeholder="Give a product quantity" required="">
            </div>

            <div style="padding: 15px">
                <input type="file" name="file">
            </div>

            <div style="padding: 15px">
                <input class="btn btn-success" type="submit">
            </div>

        </form>

        </div>
        
      </div>
        <!-- partial -->
     @include('admin.script')
       
  </body>
</html>