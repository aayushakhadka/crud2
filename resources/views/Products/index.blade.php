<div>
    <table>
        <a href="/products">All</a><br>
        @foreach($categories as $category)
        <a href="/products?category={{$category->id}}">{{ $category->name}}</a><br>
        @endforeach

        <a href="/products?pricefilter=100-900">200-800 Filter</a>
        @foreach ($products as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->category->name }}</td>
            <td><a href="/products/edit/{{$item->id}}">Edit</a></td>
            <td>
                <img src="{{$item->photo}}" alt="">
            </td>
        </tr>
        @endforeach
    </table>
    <a href="/products/create">Add New Product</a>

</div>