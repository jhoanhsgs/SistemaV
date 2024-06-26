@extends('layouts.admin')
@section('content')
<h4>Registro de una nueva compra
</h4>
<div class="row">
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos con cuidado</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>

            <div class="card-body" style="display: block;">

                <div style="display: flex">
                    <h5>Datos del producto </h5>
                    <div style="width: 20px"></div>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-buscar_producto">
                        <i class="fa fa-search"></i>
                        Buscar producto
                    </button>
                    <!-- modal para visualizar datos de los productos -->
                    <div class="modal fade" id="modal-buscar_producto">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #1d36b6;color: white">
                                    <h4 class="modal-title">Busqueda del producto</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table table-responsive">
                                        <table id="example1" class="table table-bordered table-striped table-sm">
                                            <thead>
                                            <tr>
                                                <th><center>Nro</center></th>
                                                <th><center>Selecionar</center></th>
                                                <th><center>Código</center></th>
                                                <th><center>Categoría</center></th>
                                                <th><center>Imagen</center></th>
                                                <th><center>Nombre</center></th>
                                                <th><center>Descripción</center></th>
                                                <th><center>Stock</center></th>
                                                <th><center>Precio compra</center></th>
                                                <th><center>Precio venta</center></th>
                                                <th><center>Fecha compra</center></th>
                                                <th><center>Usuario</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($productos as $producto)

                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <button class="btn btn-info btn-seleccionar"
                                                            data-id="{{ $producto->id }}"
                                                            data-codigo="{{ $producto->codigo }}"
                                                            data-categoria="{{ $producto->categoria->nombre }}"
                                                            data-nombre="{{ $producto->nombre }}"
                                                            data-usuario="{{ $producto->user->name }}"
                                                            data-descripcion="{{ $producto->descripcion }}"
                                                            data-stock="{{ $producto->stock }}"
                                                            data-stock_minimo="{{ $producto->stock_minimo }}"
                                                            data-stock_maximo="{{ $producto->stock_maximo }}"
                                                            data-precio_compra="{{ $producto->precio_compra }}"
                                                            data-precio_venta="{{ $producto->precio_venta }}"
                                                            data-fecha_ingreso="{{ $producto->fecha_ingreso }}"
                                                            data-imagen="{{ asset('storage/productos/'.$producto->imagen) }}"
                                                            >Selecionar
                                                            </button>



                                                        </td>
                                                        <td>{{ $producto->codigo }}</td>
                                                        <td>{{ $producto->categoria->nombre }}</td>
                                                        <td>
                                                            <img src="{{ asset('storage/productos/'.$producto->imagen) }}" width="50px" alt="">
                                                        </td>
                                                        <td>{{ $producto->nombre }}</td>
                                                        <td>{{ $producto->descripcion }}</td>
                                                        <td>{{ $producto->stock }}</td>
                                                        <td>{{ $producto->precio_compra }}</td>
                                                        <td>{{ $producto->precio_venta }}</td>
                                                        <td>{{ $producto->fecha_ingreso }}</td>
                                                        <td>{{ $producto->user->email}}</td>
                                                    </tr>
                                                @endforeach

                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        var botonesSeleccionar = document.querySelectorAll('.btn-seleccionar');
                                                        botonesSeleccionar.forEach(function(boton) {
                                                            boton.addEventListener('click', function() {
                                                                var id_producto = this.getAttribute('data-id');
                                                                console.log('Producto seleccionado - ID: ' + id_producto);
                                                                document.getElementById('id_producto').value = id_producto;

                                                                var codigo = this.getAttribute('data-codigo');
                                                                document.getElementById('codigo').value = codigo;

                                                                var categoria = this.getAttribute('data-categoria');
                                                                document.getElementById('categoria').value = categoria;

                                                                var nombre = this.getAttribute('data-nombre');
                                                                document.getElementById('nombre').value = nombre;

                                                                var usuario = this.getAttribute('data-usuario');
                                                                document.getElementById('usuario').value = usuario;

                                                                var descripcion = this.getAttribute('data-descripcion');
                                                                document.getElementById('descripcion').value = descripcion;

                                                                var stock = this.getAttribute('data-stock');
                                                                document.getElementById('stock').value = stock;
                                                                document.getElementById('stock_actual').value = stock;

                                                                var stock_minimo = this.getAttribute('data-stock_minimo');
                                                                document.getElementById('stock_minimo').value = stock_minimo;

                                                                var stock_maximo= this.getAttribute('data-stock_maximo');
                                                                document.getElementById('stock_maximo').value = stock_maximo

                                                                var precio_compra= this.getAttribute('data-precio_compra');
                                                                document.getElementById('precio_compra').value = precio_compra

                                                                var precio_venta= this.getAttribute('data-precio_venta');
                                                                document.getElementById('precio_venta').value = precio_venta

                                                                var fecha_ingreso= this.getAttribute('data-fecha_ingreso');
                                                                document.getElementById('fecha_ingreso').value = fecha_ingreso

                                                                var imagen= this.getAttribute('data-imagen');
                                                                document.getElementById('imagen').src = imagen

                                                                $('#modal-buscar_producto').modal('toggle');
                                                            });
                                                        });
                                                    });
                                                </script>




                                            </tbody>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>

                <hr>
                <div class="row" style="font-size: 12px">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Código:</label>
                                    <input type="text" id="id_producto" hidden>
                                    <input type="text" class="form-control" id="codigo" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Categoría:</label>
                                    <div style="display: flex">
                                        <input type="text" class="form-control"  id="categoria" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre del producto:</label>
                                    <input type="text" name="nombre" id="nombre" value="" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" class="form-control" id="usuario" value="" disabled>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Descripción del producto:</label>
                                    <textarea name="" id="descripcion" cols="30" rows="2" class="form-control" disabled> </textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock:</label>
                                    <input type="number" name="" id="stock" value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock mínimo:</label>
                                    <input type="number" name="" id="stock_minimo" value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock máximo:</label>
                                    <input type="number" name="" id="stock_maximo" value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Precio compra:</label>
                                    <input type="number" name="" id="precio_compra" value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Precio venta:</label>
                                    <input type="number" name="" id="precio_venta" value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Fecha ingreso:</label>
                                    <input type="date" name="" id="fecha_ingreso" value="" class="form-control" disabled>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Imagen del producto</label>
                            <center>
                                <img src="" id="imagen" width="90%" alt="">
                            </center>
                        </div>
                    </div>
                </div>
                <div style="display: flex">
                    <h5>Datos del proveedor </h5>
                    <div style="width: 20px"></div>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-buscar_proveedor">
                        <i class="fa fa-search"></i>
                        Buscar producto
                    </button>
                    <!-- modal para visualizar datos de los proveedor -->
                    <div class="modal fade" id="modal-buscar_proveedor">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #1d36b6;color: white">
                                    <h4 class="modal-title">Busqueda del producto</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table table-responsive">
                                        <table id="example1" class="table table-bordered table-striped table-sm">
                                            <thead>
                                            <tr>
                                                <th><center>Nro</center></th>
                                                <th><center>Selecionar</center></th>
                                                <th><center>Nombre del proveedor</center></th>
                                                <th><center>Celular</center></th>
                                                <th><center>Telefono</center></th>
                                                <th><center>Empresa</center></th>
                                                <th><center>Email</center></th>
                                                <th><center>Direccion</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($proveedores as $proveedor)

                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <button class="btn btn-info btn-seleccionp"
                                                            data-id_p="{{ $proveedor->id }}"
                                                            data-nombre_p="{{ $proveedor->nombre }}"
                                                            data-celular="{{ $proveedor->celular }}"
                                                            data-telefono="{{ $proveedor->telefono }}"
                                                            data-empresa="{{ $proveedor->empresa }}"
                                                            data-email="{{ $proveedor->email }}"
                                                            data-direccion="{{ $proveedor->direccion }}"
                                                            >Selecionar
                                                            </button>



                                                        </td>
                                                        <td>{{ $proveedor->nombre }}</td>
                                                        <td>{{ $proveedor->celular }}</td>
                                                        <td>{{ $proveedor->telefono }}</td>
                                                        <td>{{ $proveedor->empresa }}</td>
                                                        <td>{{ $proveedor->email }}</td>
                                                        <td>{{ $proveedor->direccion }}</td>
                                                    </tr>
                                                @endforeach

                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        var botonesSeleccionar = document.querySelectorAll('.btn-seleccionp');
                                                        botonesSeleccionar.forEach(function(boton) {
                                                            boton.addEventListener('click', function() {
                                                                var id_p = this.getAttribute('data-id_p');
                                                                console.log('Proveedor seleccionado - ID: ' + id_p);
                                                                document.getElementById('id_proveedor').value = id_p;

                                                                var nombre = this.getAttribute('data-nombre_p');
                                                                document.getElementById('nombre_proveedor').value = nombre;

                                                                var celular = this.getAttribute('data-celular');
                                                                document.getElementById('celular').value = celular;

                                                                var telefono = this.getAttribute('data-telefono');
                                                                document.getElementById('telefono').value = telefono;

                                                                var celular = this.getAttribute('data-celular');
                                                                document.getElementById('celular').value = celular;

                                                                var empresa = this.getAttribute('data-empresa');
                                                                document.getElementById('empresa').value = empresa;

                                                                var email = this.getAttribute('data-email');
                                                                document.getElementById('email').value = email;

                                                                var direccion = this.getAttribute('data-direccion');
                                                                document.getElementById('direccion').value = direccion;

                                                                $('#modal-buscar_proveedor').modal('toggle');
                                                            });
                                                        });
                                                    });
                                                </script>




                                            </tbody>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <hr>

                <div class="container-fluid" style="font-size: 12px">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" id="id_proveedor" hidden>
                                <label for="">Nombre del proveedor </label>
                                <input type="text" id="nombre_proveedor" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="number" id="celular" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="number" id="telefono" value="" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Empresa </label>
                                <input type="text" id="empresa" value="" class="form-control" disabled>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" id="email" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <textarea name="" id="direccion" cols="30" rows="3" class="form-control" disabled>  </textarea>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>
    <div class="col-md-3">

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Detalle de la compra</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    @php
                                        $contador_pro= 1;
                                    @endphp
                                    @foreach ($compras as $compra)
                                        @php $contador_pro++ @endphp
                                    @endforeach
                                    <label for="">Número de la compra</label>
                                    <input type="text" value="{{ $contador_pro }}" style="text-align: center" class="form-control" disabled>
                                    <input type="text" value="{{ $contador_pro }}" id="nro_compra" hidden>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Fecha de la compra</label>
                                    <input type="date" value="" class="form-control" id="fecha_compra">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Comprobante de la compra</label>
                                    <input type="text" value="" class="form-control" id="comprobante" >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Precio de la compra</label>
                                    <input type="text" value="" class="form-control" id="precio_compra_controlador" disabled>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Stock actual</label>
                                    <input type="text" style="background-color: #fff819;text-align: center" id="stock_actual" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Stock Total</label>
                                    <input type="text" style="text-align: center" id="stock_total" class="form-control" disabled>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Cantidad de la compra</label>
                                    <input type="number" value="" id="cantidad_compra" style="text-align: center" class="form-control">
                                </div>
                            </div>
                            <script>
                                // Esperar a que el DOM esté completamente cargado
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Obtener el input de cantidad_compra
                                    var inputCantidadCompra = document.getElementById('cantidad_compra');

                                    // Agregar un evento de escucha para el evento input
                                    inputCantidadCompra.addEventListener('input', function() {
                                        // Mostrar una alerta cuando se presiona una tecla dentro del input
                                        //alert('Estamos presionando el input');
                                        var stock_actual = $('#stock_actual').val();
                                        var stock_compra = $('#cantidad_compra').val();
                                        var precio_compra = $('#precio_compra').val();

                                        var total = parseInt(stock_actual)+ parseInt(stock_compra);
                                        var total_compra = parseInt(precio_compra)* parseInt(stock_compra);
                                        $('#stock_total').val(total);
                                        $('#precio_compra_controlador').val(total_compra);
                                    });
                                });
                            </script>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" id="id_seccion" value="{{ Auth::user()->id }}" hidden>
                                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" id="btn_guardar_compra">Guardar compra</button>
                            </div>
                        </div>


                        <script>
                                // Esperar a que el DOM esté completamente cargado
                                $(document).ready(function() {
                                    // Obtener el input de cantidad_compra
                                    var btnGuardarCompra = $('#btn_guardar_compra');

                                    // Agregar un evento de escucha para el evento input
                                    btnGuardarCompra.on('click', function() {
                                        // Mostrar una alerta cuando se presiona una tecla dentro del input
                                        //alert('Estamos presionando el btn guardar');
                                        console.log('Botón Guardar Compra clickeado');

                                    var id_producto = document.getElementById('id_producto').value.trim();
                                    var fecha_compra = document.getElementById('fecha_compra').value.trim();
                                    var nro_compra = document.getElementById('nro_compra').value.trim();
                                    var id_proveedor = document.getElementById('id_proveedor').value.trim();
                                    var comprobante = document.getElementById('comprobante').value.trim();
                                    var id_user = document.getElementById('id_seccion').value.trim();
                                    var precio_compra = document.getElementById('precio_compra_controlador').value.trim();
                                    var cantidad = document.getElementById('cantidad_compra').value.trim();
                                    var stock_total = document.getElementById('stock_total').value.trim();

                                        alert(stock_total);
                                    if (id_producto === '') {
                                        alert('Debe selecionar un producto.');
                                        $('#id_producto').focus();
                                        return;
                                    }
                                    if (nro_compra === '') {
                                        alert('Se vulnero el numero de compra, por favor refrescar la pagina');
                                        $('#nro_compra').focus();
                                        return;
                                    }
                                    if (fecha_compra === '') {
                                        alert('Debe llenar el campo Fecha de la compra');
                                        $('#fecha_compra').focus();
                                        return;
                                    }
                                    if (id_proveedor === '') {
                                        alert('Debe selecionar un proveedor.');
                                        $('#id_proveedor').focus();
                                        return;
                                    }
                                    if (comprobante === '') {
                                        alert('Debe llenar el campo Comprobante.');
                                        $('#comprobante').focus();
                                        return;
                                    }
                                    if (id_user === '') {
                                        alert('Se vulnero el usuario, por favor refrescar la pagina');
                                        $('#id_seccion').focus();
                                        return;
                                    }
                                    if (precio_compra === '') {
                                        alert('Debe llenar el campo Cantidad.');
                                        $('#cantidad_compra').focus();
                                        return;
                                    }
                                    if (cantidad === '') {
                                        alert('Debe llenar el campo cantidad de la compra.');
                                        $('#cantidad_compra').focus();
                                        return;
                                    }

                                    $.ajax({
                                        url: '{{ url("admin/store/compras") }}',
                                        method: 'get',
                                        data:{
                                            _token: '{{ csrf_token() }}',
                                            id_producto: id_producto,
                                            fecha_compra: fecha_compra,
                                            nro_compra: nro_compra,
                                            id_proveedor: id_proveedor,
                                            comprobante: comprobante,
                                            id_user: id_user,
                                            precio_compra: precio_compra,
                                            cantidad: cantidad,
                                            stock_total: stock_total
                                        },
                                        success: function(response) {
                                        // Manejar la respuesta del servidor
                                        //console.log(response);
                                        // Mostrar el mensaje y el icono usando SweetAlert
                                        Swal.fire({
                                                icon: response.icono,
                                                title: response.mensaje
                                            });

                                        setTimeout(function() {
                                            window.location.href = '{{ url("admin/compras") }}';
                                        }, 1000); // 1000 milisegundos = 1 segundo
                                        },
                                        error: function(xhr, status, error) {
                                            // Manejar errores de la solicitud
                                            console.error(error);
                                            alert('Ocurrió un error al guardar la compra.');
                                        }
                                    });

                                    });
                                });
                            </script>



                    </div>

                </div>

            </div>


        </div>


    </div>
</div>
@endsection
