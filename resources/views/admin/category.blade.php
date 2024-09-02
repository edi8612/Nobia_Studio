<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style>
        input[type = 'text'] {
            width: 300px;
            height: 40px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        .table_deg {
            text-align: center;
            margin: auto;
            border: 3px solid #23272b;
            margin-top: 50px;
            width: 500px;
        }

        th {
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: white;
            border: 1px solid #23272b;
        }

        td {
            color: white;
            padding: 10px;
            border: 1px solid #23272b;


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

            <h1 class="text-white">Add Category</h1>

            <div class="div_deg">

                <form action="{{url('add_category')}}" method="POST">
                    @csrf


                    <div>
                        <input type="text" name="category">

                        <input class="btn btn-primary ml-1" type="submit" value="Add Category">
                    </div>
                </form>

            </div>

            <div>
                <table class="table_deg">
                    <tr>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach($data as $category_data)
                        <tr>
                            <td>{{$category_data->name}}</td>
                            <td><a class="btn btn-success" href="{{url('edit_category',$category_data->id)}}">Edit</a></td>
                            <td><a class="btn btn-danger" onclick="confirmation(event)"
                                   href="{{url('delete_category',$category_data->id)}}">Delete</a></td>
                        </tr>
                    @endforeach

                </table>
            </div>


        </div>
    </div>


</div>
<!-- JavaScript files-->
<script type="text/javascript">
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
            title: "Are you sure you want to delete this category",
            icon: "warning",
            buttons: true,
            dangerMode: true
        })

            .then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }


            });
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
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
