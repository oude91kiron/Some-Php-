<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order PDF</title>

	<style>
		.table_deg {
			border: 2px solid black;
			width: 100%;
			text-align: center;
		}

		th{
			font-size: 1em;
		}

		.img_deg {
			width:50px;
			hight:50px;
		}

	</style>
</head>
<body>
	<h1>Order Details </h1>
	
	<table class="table_deg">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>

			<th>Product</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Status</th>
			<th>Product ID</th>
			<th>Image</th>
		</tr>
		<tr>
			<td>{{$order->user_id}}</td>
			<td>{{$order->name}}</td>
			<td>{{$order->email}}</td>
			<td>{{$order->phone}}</td>
			<td>{{$order->address}}</td>

			<td>{{$order->product_title}}</td>
			<td>{{$order->price}}</td>
			<td>{{$order->quantity}}</td>
			<td>{{$order->payment_status}}</td>
			<td>{{$order->product_id}}</td>
			<td>
				<img class="img_deg" src="{{ public_path("product/".$order->image)}}" alt="">
			</td>
		</tr>


	</table>
</body>
</html>