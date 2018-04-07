{!! Form::open(['method'=>'patch', 'id' => 'editProd', 'action' => ['ProductController@update', $product->id]]) !!}
  <div class="form-group">
    <label for="name">Product Name</label>
    <input type="text" class="form-control" id="nameUpd" placeholder="Enter Product Name" value="{{$product->name}}" required="">
  </div>
  <div class="form-group">
    <label for="quantityUpd">Quantity</label>
    <input type="number" class="form-control" id="quantityUpd" placeholder="Quantity" value="{{$product->quantity}}" required="">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <div class="input-group mb-3">
	  <div class="input-group-prepend">
	    <span class="input-group-text" id="">$</span>
	  </div>
	  <input type="text" name="price" id="priceUpd" class="form-control" placeholder="Price" value="{{($product->price/100)}}" required="">
    <input type="hidden" id="product_id" value="{{$product->id}}">
	</div>
  </div>
  <button type="submit" class="btn btn-primary">Update Product</button>
{!! Form::close() !!}

<script>
  $('#editProd').on('submit', function(e) {
         e.preventDefault(); 
         var name = $('#nameUpd').val();
         var quantity = $('#quantityUpd').val();
         var price = $('#priceUpd').val();
         var product_id = $('#product_id').val();
         $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
             type: "PATCH",
             url: BASE_URL+'/products/edit/'+product_id,
             data: {name:name, quantity:quantity, price:price, product_id:product_id},
             success: function( response ) {
              $('#message').html('<div class="alert alert-success">Product updated successfully.</div>');
              $('#actionModal').modal('hide');
              loadProducts();
                 //console.log( response.message );
             }
         });
     });
</script>