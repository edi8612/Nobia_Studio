<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 16px;
        }

        .table_deg {
            border: 2px solid #23272b;
        }

        th {
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
            border: 1px solid #23272b;
        }

        td {
            color: white;
            padding: 10px;
            border: 1px solid #23272b;
            text-align: center;
        }


    </style>

</head>
<body>
@include('admin.header')



<!-- Sidebar Navigation-->

@include('admin.sidebar')





<!-- Sidebar Navigation end-->
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            
            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category ID</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>

                    @foreach($product as $products)
                        <tr>
                            <td>{{$products->title}}</td>
                            <td>{!!Str::limit($products->description,20)!!}</td>
                            <td>{{$products->category_id}}</td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->quantity}}</td>
                            <td><img height="70" width="100" src="products/{{$products->image_url}}"></td>
                            <td>
                                <form action="{{ url('delete_product',$products->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>

                                <a class="btn btn-success mt-2"  href="#">Edit</a>

                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
            <div class="div_deg">
                {{$product->links()}}
            </div>

        </div>
    </div>
</div>
<!-- JavaScript files-->
<script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
<script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
<script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('admincss/js/charts-home.js')}}"></script>
<script src="{{asset('admincss/js/front.js')}}"></script>
</body>
</html>
