@extends('layouts.app')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Convertion</h1>
<p class="mb-4">Avec ConvertWAY vous pouvez choisir et convertir vers type de comptes !</p>
<form action="{{ route("panel_convert_callback") }}" method="POST">
    @csrf
    @method("POST")
    <div class="form-group">
      <label for="exampleFormControlSelect1">Valeur de la carte</label>
      <select class="form-control" name="valueCard" id="valueCard">
        <option value="10">10€</option>
        <option value="25">25€</option>
        <option value="50">50€</option>
        <option value="100">100€</option>
      </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Paysafecard</label>
        <input type="text" class="form-control" placeholder="Veuillez entrer la Paysafecard" name="psc" id="psc">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Adresse de paiement</label>
        <input type="text" class="form-control" placeholder="Veuillez entrer l'adresse de paiement, votre iban etc... en fonction de votre choix." name="payment">
    </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Convertion choisie :</label>
        <select class="form-control" name="convertionTaxes" id="convertionTaxes">
          <option value="1">Paysafecard vers Iban</option>
          <option value="2">Paysafecard vers BTC</option>
          <option value="3">Paysafecard vers LTC</option>
          <option value="4">Paysafecard vers ETH</option>
          <option value="5">Paysafecard vers Paypal</option>
        </select>
        <small class="form-text text-muted">Vous recevrez <span id="text-taxes"><b>en attente...</b></span></small>
      </div>

      <button type="submit" class="btn btn-success btn-icon-split float-right">
        <span class="icon text-white-50">
            <i class="fa-solid fa-check"></i>
        </span>
        <span class="text">Envoyer le formulaire</span>
    </button>
  </form>
@endsection

@section('js')
    <script>
        function priceTaxes(price, taxes) {
            switch(taxes) {
                case "1": {
                    taxes = 25;
                    break;
                }
                case "2": {
                    taxes = 30;
                    break;
                }
                case "3": {
                    taxes = 25;
                    break;
                }
                case "4": {
                    taxes = 25;
                    break;
                }
                case "5": {
                    taxes = 20;
                    break;
                }
            }
            return `<span class="badge badge-primary">${price - (price * taxes / 100)}€</span>`;
        }

        function space(el, after) {
            after = after || 4;

            var v = el.value.replace(/[^\dA-Z]/g, ''),
            reg = new RegExp(".{" + after + "}","g")
            el.value = v.replace(reg, function (a, b, c) {
                return a + ' ';
            });
        }

        $( document ).ready(function() {
            $("#psc").keydown(function() {
                space(this,4)
            })
            $("select").change(function() {
                $("#text-taxes").html(priceTaxes($("#valueCard").val(), $("#convertionTaxes").val()));
            })
        });
    </script>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'error',
                    title: '{{ $error }}'
                    })
            </script>
        @endforeach
    @endif

    @if(session("success.form_sended"))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'success',
                title: '{{ session("success.form_sended") }}'
                })
        </script>
    @endif
@endsection