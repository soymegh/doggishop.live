@extends('layouts.app')

@section('content')
    <style>
        .blog:hover {
            background-color: #343a40;

            border-radius: 20px;
        }

        .active {
            display: block;
        }

        .inactive {
            display: none;
        }
        .cart-empty{
            height: 240px;
            width: auto;
            max-width: fit-content;
        }
    </style>

    <div class="container">
        <x-title-admin title="Mi carrito" route="gues" />
        @if (@session('cart') !== null)
            <div class="row mb-4">
                @foreach (@session('cart') as $id => $item)
                    <div class="col-12 col row  border-top blog">
                        <div class=" col-md-10 ">
                            <a href="#" class="btn p-0" style="width:100%;">
                                <div class="card border-0">
                                    <div class="card-body ">
                                        <div class="row ">
                                            <div class="col-sm-2 my-auto">
                                                <!-- IMAGEN AQUI -->
                                                <img height="120" width="120"

                                                @if ($item['product']['picture'])
                                                    src="{{ asset('images/product/' . $item['product']['picture']) }}"
                                                @else
                                                    src="{{ asset('images/sinfoto.png') }}"
                                                @endif
                                                     alt="">
                                            </div>
                                            <div class="col-md col-sm-10 ml-3">
                                                <h5 class="card-title text-left">{{ $item['product']['name'] }}</h5>
                                                <div class="row">
                                                    <b class="card-text text-left col-md-auto">Precio:</b>
                                                    {{ $item['product']['price'] }}
                                                </div>
                                                <div class="row">
                                                    <b class="card-text text-left col-md-auto">Cantidad:</b>
                                                    {{ $item['quantity'] }}
                                                </div>
                                                <div class="row">
                                                    <b class="card-text text-left col-md-auto">Descripción:</b>
                                                    <p class="text-left ml-3">{{ $item['product']['description'] }}</p>

                                                </div>
                                                <div class="row">
                                                    <b class="card-text text-left col-md-auto">Fecha:</b>
                                                    {{ $item['date'] }}
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm my-auto">
                            <div class="d-flex justify-content-evenly">
                                <form method="POST" class="fm-inline" action="{{ route('inventary.destroy', $id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger h-150 rounded-circle" style="height: 3pc;"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                                        <i class="fa-solid fa-xmark fa-xl  "></i>
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>
                @endforeach

                <a href="#" class="mt-3 btn btn-success " data-toggle="modal" data-target="#modalBill"><i
                    class="fa-solid fa-basket-shopping fa-lg mr-2"></i>Realizar Factura</a>
            </div>
            @else
            <div class="row mb-4">
                <img  class="cart-empty rounded mx-auto d-block" src="{{ asset('images/cartempty.png') }}" alt="El carrito está vacio"/>
                <b class="fs-5 text-danger text-center">No tienes productos comprados, ve al dashboard y compra productos</b>
            </div>

        @endif


        <!-- MODAL -->
        <div class="modal fade text-left p-2" id="modalBill" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Información de factura</h2>
                    </div>

                    <div class="modal-body">

                    <form action="{{ route('home.store') }}" method="POST" class="mb-4 mx-3 needs-validation" id="multiStepForm">
                    @csrf
                        <!-- Step 1 -->
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="container mt-3">
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        
                        
                            <div class="form-step active">
                                <h3>Datos del cliente</h3>
                                <div class="border mt-2 mb-4"></div>
                        
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-3">
                                            <label for="username">Nombre de usuario</label>
                                            <input type="text" name="username" id="username" class="form-control" required
                                                value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <!-- Telefono -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="phone">Telefono</label>
                                            <input type="text" maxlength="8"  name="phone" id="phone" class="form-control" required>
                                        </div>
                                    </div>
                        
                                    <!-- Cedula -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="warrant">Cedula</label>
                                            <input type="text" name="warrant" id="warrant" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary next-step">Siguiente</button>
                            </div>
                        
                            <div class="form-step inactive">
                                <h3>Información de pago</h3>
                                <div class="border mt-2 mb-4"></div>
                                <!-- Tipo de pago -->
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="payment_type">Tipo de Pago</label>
                                        <select class="form-control" id="payment_type" name="payment_type" required>
                                            <option value="">Seleccionar Tipo de pago</option>
                                            @foreach ($payment_types as $payment_type)
                                                <option value="{{ $payment_type->id }}">{{ $payment_type->name }}
                                                </option>
                                            @endforeach
                        
                                        </select>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary prev-step">Anterior</button>
                                <button type="button" class="btn btn-primary next-step">Siguiente</button>
                            </div>
                        
                            <div class="form-step inactive">
                                <h3 class="mt-4">Información de envio</h3>
                                <div class="border mt-2 mb-4"></div>
                                <div class="row">
                                    <label for="">Requiere envio: </label>
                                    <div class="col-md-1">
                                        <div class="form-check">
                                            <input onclick="toggleDiv()" class="form-check-input" type="radio" value="show" name="option"
                                                id="rbl1" checked >
                                            <label class="form-check-label" for="rbl1">
                                                Si
                                            </label>
                                        </div>
                        
                                    </div>
                        
                                    <div class="col-md-1">
                                        <div class="form-check">
                                            <input onclick="toggleDiv()" class="form-check-input" type="radio" value="hide" name="option"
                                                id="rbl2">
                                            <label class="form-check-label" for="rbl2">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="row mb-3" id="myDiv">
                                    <!--- Direccion --->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="address">Dirección</label>
                                            <input type="text" name="address" id="address" class="form-control if-required" required>
                                        </div>
                                    </div>
                                    <!--Dropdowns de departmentos y municipios -->
                                    <livewire:dropdowns-bills />
                                </div>

                                <button type="button" class="btn btn-secondary prev-step">Anterior</button>

                                <button  class="btn btn-success" type="submit">Finalizar Compras</button>
                            </div>
                        
                        
                        
                        
                        </div>


                        
                        <div class="border mt-2 mb-4"></div>

                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                <h4>Subtotal: {{ $subtotal }}</h4>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="total" value="{{ $totalPaid }}">
                                <h4>Total: {{ $totalPaid }}</h4>
                            </div>
                        </div>
                        <div class="row">
                        
                            <div class="col-md-6">
                                @if($discounts)
                                    <label for="">Descuento aplicado: {{ $discounts->name }}</label>
                                @endif
                            </div>
                        
                        
                            <div class="col-md-6">
                                <label for="">Subtotal + IVA ({{ bcmul($iva, "100", 0) }}%)</label>
                            </div>
                        
                        </div>
                                                                

                        </form>
                    </div>

                    <div class="modal-footer">
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function toggleDiv() {
            const conditional_required = document.querySelectorAll(".if-required");

            // Obtener el radio button seleccionado
            var selectedOption = document.querySelector('input[name="option"]:checked');

            // Verificar si se seleccionó alguna opción antes de acceder a 'value'
            if (selectedOption) {
                var showDiv = selectedOption.value;
                var div = document.getElementById('myDiv');

                // Mostrar u ocultar el div según el valor del radio button
                if (showDiv === 'show') {
                    //Cambiar inputs / selects a required
                    conditional_required.forEach((input)=>{
                        input.setAttribute('required', '');
                    });

                    div.style.display = '';                    
                } else {
                    //Quitar en inputs / selects el required
                    conditional_required.forEach((input)=>{
                        input.removeAttribute('required', '');
                    });
                    div.style.display = 'none';

                    
                }
            }
        }

        document.onload(toggleDiv())
    </script>



@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    const steps = document.querySelectorAll(".form-step");
    const nextBtns = document.querySelectorAll(".next-step");
    const prevBtns = document.querySelectorAll(".prev-step");
    const progressBar = document.querySelector(".progress-bar");

    let currentStep = 0;

    nextBtns.forEach((button) => {
    button.addEventListener("click", () => {
        const currentInputs = steps[currentStep].querySelectorAll("input");
        const currentSelects = steps[currentStep].querySelectorAll("select");

        let valid = true;

        currentInputs.forEach((input) => {
        if (!input.checkValidity()) {
          input.classList.add("is-invalid");
          valid = false;
        } else {
          input.classList.remove("is-invalid");
          input.classList.add("is-valid");
        }
        });

        currentSelects.forEach((input) => {
        if (!input.checkValidity()) {
          input.classList.add("is-invalid");
          valid = false;
        } else {
          input.classList.remove("is-invalid");
          input.classList.add("is-valid");
        }
        });

        if(valid){
            steps[currentStep].classList.remove("active");
            steps[currentStep].classList.add("inactive");
            currentStep++;
            steps[currentStep].classList.remove("inactive");
            steps[currentStep].classList.add("active");
            updateProgressBar();
        }       
        
    });
    });

    prevBtns.forEach((button) => {
    button.addEventListener("click", () => {
        steps[currentStep].classList.remove("active");
        steps[currentStep].classList.add("inactive");
        currentStep--;
        steps[currentStep].classList.remove("inactive");
        steps[currentStep].classList.add("active");
        updateProgressBar();
    });

    });
    
    function updateProgressBar() {
    const progress = ((currentStep + 1) / steps.length) * 100;
    progressBar.style.width = `${progress}%`;
    progressBar.setAttribute("aria-valuenow", progress);
    }


});

</script>
