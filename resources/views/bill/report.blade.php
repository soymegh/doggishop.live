<link href="../../css/app.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    body{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    h2{
        bottom: 0;
    }
    
    p{
        font-size: 18px;
        text-align: center;
    }

    b{
        font-size: 16px;
        
    }
    span{
        padding: 0;
        font-size: x-small;
    }
    .row{
        text-align: start;
    }

    .col {
        display: inline-block;
        border: 5pc;
        border-color: red;
        padding: 1rem 1rem;
        vertical-align: middle;
        width: 25%;
        text-align: center;
    }
    .divider{
        border: 1px solid black;
        margin-bottom: 3pc;
    }

    table{
        width: 100%;
        border-collapse: collapse;
    }
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

</style>



<div class="">
    <div class="">
        <h2>Reporte de facturas</h2>
        
        <div class="row">
            <div class="col" style="width: fit-content;">
                <b>Mes </b>
                <p>{{today()->localeMonth}}</p>
            </div> 

            <div class="col" style="width: fit-content;">
                <b>Total de {{today()->localeMonth}} </b>
                <p> ${{$bill->sum('total')}}</p>
                
            </div> 

            <div class="col" style="width: 25%; text-align:right;">
                <img height="120" src="https://doggishop.live/Logo.png"  class="text-left" >
            </div>
        </div>

    </div> 
    <div class="divider"></div>
    <div class="">
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>    
                    <th>Factura ID</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
                
            </thead>

            <tbody>
            {{$last = $billdetails->first()}}
            {{$previousGeneral = $bill->first()}}

                @foreach ($billdetails as $bd)
                {{$current_bill = $bill->where('id','==',$bd->bill_id)->first()}}

                <tr>
                    <td> {{date("d-m-Y", strtotime($current_bill->bill_date))}} </td>        
                    
                    @if ($last->bill_id != $bd->bill_id or $bd == $billdetails->first())
                    <td rowspan=" {{$billdetails->where('bill_id','==',$bd->bill_id)->count()}}">{{$bd->bill_id}}</td>
                    @endif
                    
                    <td>{{$user->where('id','==', $current_bill->user_id)->first()->name}}</td>
                    <td>{{$products->firstWhere('id','==',$bd->product_id )->name}}</td>
                    <td>{{$bd->amount}}</td>
                    <td>{{$bd->subtotal}}</td>
                </tr>
                {{$last = $bd}}
                {{$previousGeneral = $current_bill}}
                @endforeach
                
            </tbody>
        </table>
        
    </div>
</div>



