@extends('layout')

@section('title','Preguntas Frecuentes')

@section('content')

<div class="mx-auto rounded-sm">

  <div class="row">
    <div class="col">
      <h2 class="display-4 text-center">
        Preguntas Frecuentes
      </h2>
    </div>
  </div>

  <div class="row p-2">

    <div class="col-12">

      <h2 class="ml-4"><i class="fas fa-user mr-2"></i> Sobre tu cuenta</h2>
    </div>

    <div class="col-12">

      <div class="accordion">

        <div class="card">
          <div class="card-header" id="headingOne">
            <h3 class="mb-0">
              <button class="btn btn-link text-reset" type="button" data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                ¿Cómo creo una cuenta?
              </button>
            </h3>
          </div>

          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              Haz clic en botón de Registro que se encuentra en la pate superior de la pantalla.<br>
              Completa el formulario de registro.<br>
              Luego vas a recibir un mail con la confirmación.<br>
              Listo ya estas registrado
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header m" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link text-reset collapsed" type="button" data-toggle="collapse"
                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Tengo problemas para acceder a mi cuenta. ¿Qué hago?
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              Hay varias razones por las que puedes tener problemas al iniciar sesión.<br>
              <br>
              Veo un mensaje de "información de inicio de sesión incorrecta. Vuelve a intentarlo"<br>
              1. Recuerde que la contraseña es sensible a mayúsculas. Asegúrate de que la tecla Bloq Mayús está
              desactivada<br>
              2. Crea una nueva Contraseña.<br>
              3. Si sigues teniendo problemas, borra todas las contraseñas guardadas automáticamente. Esto garantizará
              que tu computadora o tu navegador no introduzcan de forma automática unas credenciales no válidas.<br>
              <br>
              Veo un mensaje de “no se pudo crear una cuenta nueva con esta información. Si ya tienes una cuenta, inicia
              sesión”.<br>
              Si recibes este error, significa que estás usando la página de creación de una cuenta en vez de la página
              de iniciar sesión.<br>
              <br>
              Olvidé mi contraseña<br>
              <br>
              Seleccione loguearse y luego ¿Olvidaste tu contraseña?<br>
              Ingrese la dirección de correo electrónico asociada a tu cuenta.<br>
              Un correo electrónico será enviado a su bandeja de entrada - asegúrese de comprobar su carpeta de correo
              no deseado y las "Promociones" y pestañas 'sociales', si utiliza Gmail.<br>
              Haga clic en el enlace del correo electrónico. Cuando lo hayas hecho, por favor siga las instrucciones
              para crear una nueva contraseña.<br>
              <br>
              Recuerde que la contraseña es sensible a mayúsculas, por lo que si utilizas letras en mayúscula, debes
              utilizar letras mayúsculas al iniciar sesión en futuras ocasiones.<br>
              Además, recuerda, no dar ninguna información personal, como tu contraseña.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingThree">
            <h3 class="mb-0">
              <button class="btn btn-link text-reset" type="button" data-toggle="collapse" data-target="#collapseThree"
                aria-expanded="true" aria-controls="collapseThree">
                ¿Como me inscribo para recibir ofertas y recomendaciones de productos?
              </button>
            </h3>
          </div>

          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              Si querés recibir información y promociones de forma exclusiva no dudes en inscribirte en nuestro
              Newsletter!<br>
              El envío de emails promocionales será realizado solo con tu consentimiento y podrás desactivar esta opción
              en cualquier momento.
            </div>
          </div>
        </div>



      </div>
    </div>

    <div class="col-12">
      <h2 class="mt-2 ml-4"><i class="fas fa-shopping-bag mr-2"></i>Compras</h2>
    </div>

    <div class="col-12">
      <div class="accordion">

        <div class="card">
          <div class="card-header" id="headingfour">
            <h3 class="mb-0">
              <button class="btn btn-link text-reset" type="button" data-toggle="collapse" data-target="#collapsefour"
                aria-expanded="true" aria-controls="collapsefour">
                ¿Tengo que registrarme para realizar una compra?
              </button>
            </h3>
          </div>

          <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionExample">
            <div class="card-body">
              Sí, para realizar una compra es necesario que estés registrado. Podés hacerlo una vez que ya hayas llenado
              tu carrito!
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingfive">
            <h3 class="mb-0">
              <button class="btn btn-link text-reset" type="button" data-toggle="collapse" data-target="#collapsefive"
                aria-expanded="true" aria-controls="collapsefive">
                ¿Cómo efectúo una compra?
              </button>
            </h3>
          </div>

          <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionExample">
            <div class="card-body">
              Paso 1: Para cargar los productos en tu carrito hacé click en el botón que dice “Comprar” , que aparece
              debajo de cada uno.<br>
              Para eliminar productos de tu carrito, podes hacerlo clickeando en la “X” que figura al lado del detalle
              de compra.<br>
              Para cambiar las cantidades del producto elegido, hacelo directamente desde el carrito de compras,
              clickeando en “+” o “-” según lo que desees.<br>
              Una vez que hayas seleccionado todos los que desees, clickeá en “Finalizar compra” para avanzar en tu
              pedido.<br>
              <br>
              Paso 2: Seleccionas el domicilio de entrega<br>
              <br>
              Paso 3: Realizas el Pago<br>
              Clickeando en “Ir a Pagar” vas a ser re-direccionado a la página de Mercado Pago para realizar de forma
              segura el pago.<br>
              <br>
              Paso 4: Confirmación de compra<br>
              Vas a estar recibiendo un mail con la confirmación de tu compra y datos para el seguimiento de tu
              pedido.<br>
              <br>
              Paso 5: Confirmación de despacho<br>
              Una vez que tu compra sea despachada, vas a recibir un mail con el número de seguimiento.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingsix">
            <h3 class="mb-0">
              <button class="btn btn-link text-reset" type="button" data-toggle="collapse" data-target="#collapsesix"
                aria-expanded="true" aria-controls="collapsesix">
                ¿Hay un mínimo o maximo de productos para comprar?
              </button>
            </h3>
          </div>

          <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordionExample">
            <div class="card-body">
              No, podés elegir la cantidad que quieras y combinarlos como prefieras!
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingSeven">
            <h3 class="mb-0">
              <button class="btn btn-link text-reset" type="button" data-toggle="collapse" data-target="#collapseSeven"
                aria-expanded="true" aria-controls="collapseSeven">
                ¿Puedo modificar mi compra una vez finalizada?
              </button>
            </h3>
          </div>

          <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
            <div class="card-body">
              No, una vez que tu orden está terminada ya no es posible sumarle más productos.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingEight">
            <h3 class="mb-0">
              <button class="btn btn-link text-reset" type="button" data-toggle="collapse" data-target="#collapseEight"
                aria-expanded="true" aria-controls="collapseEight">
                ¿Puedo cambiar el domicilio de entrega?
              </button>
            </h3>
          </div>

          <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
            <div class="card-body">
              No es posible cambiar la dirección una vez finalizada la compra.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingNine">
            <h3 class="mb-0">
              <button class="btn btn-link text-reset" type="button" data-toggle="collapse" data-target="#collapseNine"
                aria-expanded="true" aria-controls="collapseNine">
                ¿Qué opciones tengo para pagar?
              </button>
            </h3>
          </div>

          <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
            <div class="card-body">
              Vos elegís con qué medio de pago hacerlo, dentro de las opciones que ofrezca la empresa proveedora del
              servicio.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingTen">
            <h3 class="mb-0">
              <button class="btn btn-link text-reset" type="button" data-toggle="collapse" data-target="#collapseTen"
                aria-expanded="true" aria-controls="collapseTen">
                ¿Qué pasa si no puedo ir a retirar el pedido?
              </button>
            </h3>
          </div>

          <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
            <div class="card-body">
              En el caso de que sea otra la persona que retire tu compra, deberá contar con una autorización del titular
              y fotocopia del DNI del titular. ¿Qué debe decir la autorización?<br>
              - Nombre y Apellido del titular<br>
              - DNI del titular<br>
              - Nombre y Apellido del autorizado<br>
              - DNI del autorizado<br>
              - Número/s de envío que autoriza a retirar
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <h2 class="mt-2 ml-4"><i class="fas fa-gifts mr-2"></i> Envío y retiro de productos</h2>
    </div>

    <div class="col-12">

      <div class="accordion">

        <div class="card">
          <div class="card-header" id="headingEleven">
            <h3 class="mb-0">
              <button class="btn btn-link text-reset" type="button" data-toggle="collapse" data-target="#collapseEleven"
                aria-expanded="true" aria-controls="collapseEleven">
                ¿Cuál es el plazo, lugar y horario que puedo retirar mi compra?
              </button>
            </h3>
          </div>

          <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
            <div class="card-body">
              En al seccion de domicilio de entrega usted podra configurar todos los detalles necesarios para recibir su
              pedido
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingTwelve">
            <h2 class="mb-0">
              <button class="btn btn-link text-reset collapsed" type="button" data-toggle="collapse"
                data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                ¿Cómo coordino el envío de mi producto?
              </button>
            </h2>
          </div>
          <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionExample">
            <div class="card-body">
              Una vez confirmado el pago, el vendedor se contactara con usted para confirmar los datos de envio de los
              productos.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingThirteen">
            <h2 class="mb-0">
              <button class="btn btn-link text-reset collapsed" type="button" data-toggle="collapse"
                data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                Mis productos no me llegaron. ¿Que hago?
              </button>
            </h2>
          </div>
          <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordionExample">
            <div class="card-body">
              Si usted realizo el pago y sus productos no le llegan se le reintegrara a su cuenta el saldo.<br>
              Tenga en cuenta que el pago no se libera hasta que usted no reciba el producto y confirme su recepcion.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingFourteen">
            <h2 class="mb-0">
              <button class="btn btn-link text-reset collapsed" type="button" data-toggle="collapse"
                data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                Me llegaron mi productos, pero no confirme recepcion.
              </button>
            </h2>
          </div>
          <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordionExample">
            <div class="card-body">
              Si no pudo confirmar la rececpcion de los productos y no realizo un reclamo sobre la compra.<br>
              Al vendedor se le acreditara el pago 24hs luego de la fecha en la que este confirmo haberlo entregado.
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <h2 class="mt-2 ml-4"><i class="fas fa-phone mr-2"></i> Atención al cliente</h2>
    </div>

    <div class="col-12">

      <div class="accordion">

        <div class="card mb-2 rounded">
          <div class="card-header" id="headingFiveteen">
            <h3 class="mb-0">
              <button class="btn btn-link text-reset" type="button" data-toggle="collapse"
                data-target="#collapseFiveteen" aria-expanded="true" aria-controls="collapseFiveteen">
                Contactenos
              </button>
            </h3>
          </div>

          <div id="collapseFiveteen" class="collapse" aria-labelledby="headingFiveteen" data-parent="#accordionExample">
            <div class="card-body">
              Si querés contactarnos completa el formulario de contacto, estamos para vos!
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

</div>
@endsection