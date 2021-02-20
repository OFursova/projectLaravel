@if (session('cart'))
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach (session('cart') as $product)
            <tr>
                <td><img src="{{$product['img']}}" style="width:70%"></td>
                <td>{{$product['name']}}</td>
                <td>{{$product['price']}}</td>
                <td><input type="number" value="{{$product['qty']}}" data-id="{{$product['id']}}" class="qty-item"></td>
                <td><button class="btn btn-danger remove-item" data-id="{{$product['id']}}">Remove</button></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan='4'>Total:</td>
                <td>{{session('totalSum')}}</td>
            </tr>
        </tfoot>
    </table>
@else
    <p>Cart is empty</p>
@endif