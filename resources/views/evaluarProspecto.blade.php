<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluar Prospecyo</title>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="contenedor ">
       @include('layouts.header')
       @include('layouts.sidebar')
       @include('layouts.modalCaptura')
<div class="contenido ">
<p></p>
<p class="evaluar">Evaluar Prospecto</p><br>
  <div class="row justify-content-center align-items-center text-align-center">
    <div class="form-group col-md-4">
      <label for="nombre_prospecto_x">Nombre Prospecto</label>
      <input  id="id" name="id"  type="hidden" class="form-control" >
      <input  id="nombre_prospecto_x" name="nombre_prospecto_x"  type="text" class="form-control" placeholder="Nombre del Prospecto" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="primer_Apellido">Primer Apellido</label>
      <input type="text" class="form-control" id="primer_apellido_x" name="primer_apellido_x" placeholder="Primer Apellido" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="primer_Apellido">Segundo Apellido</label>
      <input type="text" class="form-control" id="segundo_apellido_x" name="segundo_apellido" placeholder="Segundo Apellido" readonly>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="calle">Calle</label>
      <input type="text" class="form-control" id="calle_x" name="calle"placeholder="Calle" readonly>
    </div>
    <div class="form-group col-md-4">
    <label for="colonia">Colonia</label>
    <input type="text" class="form-control" id="colonia_x" name="colonia"placeholder="Colonia" readonly>
  </div>
    <div class="form-group form-group col-md-2">
    <label for="numero">Numero</label>
    <input type="text" class="form-control" id="numero_x" name="numero" placeholder="Numero int." readonly>
  </div>
  </div>
  
  <div class="form-row">
  <div class="form-group col-xs-6 col-md-4">
      <label for="telefono">Telefono</label>
      <input type="text" class="form-control" id="telefono_x" name="telefono" readonly>
  </div>
  <div class="form-group col-md-4">
      <label for="rfc">RFC</label>
      <input type="text" class="form-control" id="rfc_x" name="rfc" readonly >
  </div>
<div class="form-group col-md-4">
      <label for="cp">Codigo Postal</label>
      <input type="text" class="form-control" id="cp_x" name="cp" readonly >
</div>
</div>

 
   
<div class="col-md-13">
<div id="accordion"  id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-default" id="btncolapsar" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Documentos
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      
        <div class="form-row">
           <div class="form-group col-md-6 ">
      <img id="ine_x"  src=""  width="150px" heigth="10px">
    </div>
    <div class="form-group col-md-6">
    <img src="" id="comprobante_pago_x"   width="150px" heigth="10px">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6 ">
  <img src=""  id="acta_nacimiento_x"  width="150px" heigth="10px">
    </div>
</div>
      </div>
    </div>
  </div>
  <div class="form-group col-md-13">
      <label for="estado_x">Estado</label>
      <select name="estado_x" id="estatus" onchange="getEstado(this)";  class="form-control">
      <option value="">Elija una opcion:</option>
      <option value="2">ACEPTADO</option>
     <option value="3">RECHAZADO</option>
</select>
    </div>
  <div class="form-group col-md-13">
      <label for="observaciones_x">Observaciones</label>
      <textarea type="text" class="form-control" id="observacion" name="observaciones_x"  rows="4" cols="50" disabled></textarea>
    </div>
    <div class="form-group col-md-13 justify-self">
     <button id="btn_evaluar" class="btn btn-outline-success" onclick="updateEvaluar();">Guardar</button>
     <a href="/listaProspecto" id="btn_cancelar" class="btn btn-outline-dark">Cancelar</a>
    </div>
</div>
   
   </div>
      </div>
</div>

    </div>
   
<script>
$(document).ready(function() {
  var url=window.location.href;
   var id=url.substring(url.lastIndexOf('/') + 1);
   detalleProspecto(id);
   $("#id").val=id;

});

</script>
<script src="{{asset('js/funciones.js')}}"></script>
</body>
</html>