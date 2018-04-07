
@if(!$products->isEmpty())
<table class="table">
	<thead>
		<tr>
			<th>Product name</th>
			<th>Quantity in stock</th>
			<th>Price per item(USD)</th>
			<th>Datetime submitted</th>
			<th>Total value number(USD)</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@php $total = 0; @endphp
		@foreach($products as $product)
		@php $value = ($product->price/100)*$product->quantity; $total+=$value; @endphp
		<tr>
			<td>{{$product->name}}</td>
			<td>{{$product->quantity}}</td>
			<td>{{number_format(($product->price/100), 2)}}</td>
			<td>{{date('d F, Y h:i:s a', strtotime($product->created_at))}}</td>
			<td align="right">{{number_format($value, 2)}}</td>
			<td>
				<button onclick="editProduct('{{$product->id}}', '{{$product->name}}')" 
					data-toggle="modal" data-target="#actionModal"
					class="btn btn-info">Edit</button>
			</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="3" class="lead">
				TOTAL
			</td>
			<td colspan="3" align="right" class="lead">
				<strong>
					{{number_format($total, 2)}}
				</strong>
			</td>
		</tr>
	</tbody>
</table>
@else
	<div class="text-danger">No product found in database</div>
@endif
