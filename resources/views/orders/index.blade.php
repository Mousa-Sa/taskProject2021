@extends('MasterDashBoard')
@section('content')

    <div class="content">
        <button class="btn btn-primary btn-block" style="
    left: 20px;width:auto;" onclick="window.location.href = '{{route("order.create")}}';">Add New Record<div class="ripple-container"></div></button>
        <button class="btn btn-success btn-block" style="
    left: 20px;width:auto;" onclick="ExportToExcel('xlsx')">Export To Excel<div class="ripple-container"></div></button>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Orders</h4>
                            <p class="card-category"> Here is a subtitle for this table</p>
                        </div>
                        <div style="width: 25%; margin-right: 3%; margin-top: 1%">

                                <div class="input-group no-border">
                                    <input type="text" value="" style="margin-left: 23px;" id="search" name="search" onkeyup="searchFunction()" class="form-control" placeholder="Search...">

                                </div>

                        </div>
                        <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table" id="OrdersTable">
                                        <thead class=" text-primary">


                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Number
                                        </th>
                                        <th>
                                            Customer
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th style="    width: 20px;">
                                            update
                                        </th>
                                        <th style="    width: 20px;">
                                            delete
                                        </th>

                                        </thead>
                                        <tbody>

                                        @foreach($orders as $order)
                                            <tr  class="thisroute trid{{$order->id}}">

                                                <td>
                                                    {{$order->name}}
                                                </td>
                                                <td>
                                                    {{$order->number}}
                                                </td>

                                                <td>
                                                    {{$order->customers->name}}
                                                </td>
                                                <td>
                                                    {{$order->created_at}}
                                                </td>




                                                <td class="td-actions text-right">
                                                    <a  href='{{url("order/".$order->id."/edit")}}' style="color: #fff;">
                                                        <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div></button></a>
                                                </td>

                                                    <td class="td-actions text-right">
                                                        <form action="{{route('order.destroy',[$order->id])}}" method="post" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick = "return confirm('Are you sure?')" rel="tooltip" title="" value="{{$order->id}}" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                                <i class="material-icons">close</i>
                                                                <div class="ripple-container"></div></button>
                                                        </form>

                                                    </td>


                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>



                                </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $('.sidebar2').addClass('active');

    </script>
{{--    //export to excel--}}
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

    <script>
        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('OrdersTable');
            var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
            return dl ?
                XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
                XLSX.writeFile(wb, fn || ('OrderTable.' + (type || 'xlsx')));
        }
</script>

{{--    search function--}}
    <script>
        function searchFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("OrdersTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                td1 = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                td3 = tr[i].getElementsByTagName("td")[3];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    txtValue1 = td1.textContent || td1.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;
                    if ((txtValue.toUpperCase().indexOf(filter)> -1
                        || txtValue1.toUpperCase().indexOf(filter)> -1
                        ||txtValue2.toUpperCase().indexOf(filter)> -1
                        ||txtValue3.toUpperCase().indexOf(filter)> -1)) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    @endsection
