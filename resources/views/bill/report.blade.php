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
        font-size: 14px;
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
                <p>[Mes]</p>
            </div> 

            <div class="col" style="width: fit-content;">
                <b>Total de [mes] </b>
                <p>{{$billdetails->sum('subtotal')}}</p>
                
            </div> 

            <div class="col" style="width: 20%; text-align:right;">
                <img src="../../../public/Logo.png"  class="text-left" >
            </div>
        </div>

    </div> 
    <div class="divider"></div>
    <div class="">
        <table>
            <thead>
                <tr>
                    <th>Factura ID</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
                
            </thead>

            <tbody>
                
                @foreach ($billdetails as $bd)
                <tr>
                    <td>{{$bd->bill_id}}</td>
                    <td>{{$bd->bill_id}}</td>
                    <td>{{$bd->bill_id}}</td>
                    <td>{{$bd->product_id}}</td>
                    <td>{{$bd->amount}}</td>
                    <td>{{$bd->subtotal}}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        
    </div>
</div>



