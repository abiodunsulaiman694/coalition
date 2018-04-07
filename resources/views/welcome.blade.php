@extends('layouts.master')

@section('content')
<div id="message"></div>
{!! Form::open(['method'=>'post', 'id' => 'newProd', 'action' => 'ProductController@store']) !!}
  <div class="form-group">
    <label for="name">Product Name</label>
    <input type="name" class="form-control" id="name" placeholder="Enter Product Name" >
  </div>
  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="number" class="form-control" id="quantity" placeholder="Quantity" required="">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="">$</span>
      </div>
      <input type="text" name="price" id="price" class="form-control" placeholder="Price" required="" >
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Add new Product</button>
{!! Form::close() !!}

<h3>Products</h3>
<div id="products"></div>
@stop

@section('footer')
<script>
    jQuery(document).ready( function( $ ) {
        loadProducts();
        $('#newProd').on('submit', function(e) {
           e.preventDefault(); 
           var name = $('#name').val();
           var quantity = $('#quantity').val();
           var price = $('#price').val();
           $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
               type: "POST",
               url: BASE_URL+'/products',
               data: {name:name, quantity:quantity, price:price},
               success: function( response ) {
                $('#message').html('<div class="alert alert-success">New Product created successfully.</div>');
                $('#name').val('')
                $('#quantity').val('');
                loadProducts();
                   //console.log( response.message );
               },
              error: function(data){
                var errors = data.responseJSON;
                console.log(errors);
                // Render the errors with js ...
              }
           });
       });
    });
    function loadProducts() {
        document.getElementById('products').innerHTML = '<div class="text-info text-center">Products loading... Just a moment</div>';
        $('#products').load(BASE_URL + '/products');
    }
    function editProduct(productId, productName) {
        document.getElementById('modal-title').innerHTML = 'Edit '+ productName;
        $('#modal-body').load(BASE_URL + '/products/edit/'+productId);
    }
</script>
@stop