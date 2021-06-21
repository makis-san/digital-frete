window.addEventListener('DOMContentLoaded', event => {
  $.ajax({
    url: 'https://api.digitalfrete.com.br/api/v2/products',
    method: 'GET',
    beforeSend: () => {
      $('#datalistProduto').html('');
    },
    success: (data) => {
      data.forEach(element => {
        $('#datalistProduto').append(`<option value="${element.name}">${element.name}</option>`)
      });
    }
  })
  $('#form-alert').hide();
    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            offset: 74,
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});


$('#TotalNFe').mask('000.000.000.000.000,00', {reverse: true});
/// CEP
$('.cep').mask('00000-000');
if ($('#logisticSwitch').change(function () {
    if ($(this).is(":checked")) {
        $('.logistic-type').addClass('flipped')
    } else {
        $('.logistic-type').removeClass('flipped')
    }
}));
function openInNewTab(url) {
  window.open(url, '_blank').focus();
 }
$(".owl-carousel2").owlCarousel({
    loop: true,
    center: true,
    margin: 12,
    responsiveClass: true,
    nav: false,
    responsive: {
      0: {
        items: 2,
        nav: false
      },
      680: {
        items: 3,
        nav: false
      },
      1000: {
        items: 4,
        nav: true
      }
    }
  });
    $(".owl-carousel1").owlCarousel({
      loop: true,
      center: true,
      margin: 0,
      responsiveClass: true,
      nav: false,
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        680: {
          items: 2,
          nav: false,
          loop: false
        },
        1000: {
          items: 3,
          nav: true
        }
      }
    });

  const ConverterEstados = function(val) {
      var data;
    
      switch (val.toUpperCase()) {
        /* UFs */
        case "AC" :	data = "Acre";					break;
        case "AL" :	data = "Alagoas";				break;
        case "AM" :	data = "Amazonas";				break;
        case "AP" :	data = "Amapá";					break;
        case "BA" :	data = "Bahia";					break;
        case "CE" :	data = "Ceará";					break;
        case "DF" :	data = "Distrito Federal";		break;
        case "ES" :	data = "Espírito Santo";		break;
        case "GO" :	data = "Goiás";					break;
        case "MA" :	data = "Maranhão";				break;
        case "MG" :	data = "Minas Gerais";			break;
        case "MS" :	data = "Mato Grosso do Sul";	break;
        case "MT" :	data = "Mato Grosso";			break;
        case "PA" :	data = "Pará";					break;
        case "PB" :	data = "Paraíba";				break;
        case "PE" :	data = "Pernambuco";			break;
        case "PI" :	data = "Piauí";					break;
        case "PR" :	data = "Paraná";				break;
        case "RJ" :	data = "Rio de Janeiro";		break;
        case "RN" :	data = "Rio Grande do Norte";	break;
        case "RO" :	data = "Rondônia";				break;
        case "RR" :	data = "Roraima";				break;
        case "RS" :	data = "Rio Grande do Sul";		break;
        case "SC" :	data = "Santa Catarina";		break;
        case "SE" :	data = "Sergipe";				break;
        case "SP" :	data = "São Paulo";				break;
        case "TO" :	data = "Tocantíns";				break;
        
        /* Estados */
        case "ACRE" :					data = "AC";	break;
        case "ALAGOAS" :				data = "AL";	break;
        case "AMAZONAS" :				data = "AM";	break;
        case "AMAPÁ" :					data = "AP";	break;
        case "BAHIA" :					data = "BA";	break;
        case "CEARÁ" :					data = "CE";	break;
        case "DISTRITO FEDERAL" :		data = "DF";	break;
        case "ESPÍRITO SANTO" :			data = "ES";	break;
        case "GOIÁS" :					data = "GO";	break;
        case "MARANHÃO" :				data = "MA";	break;
        case "MINAS GERAIS" :			data = "MG";	break;
        case "MATO GROSSO DO SUL" :		data = "MS";	break;
        case "MATO GROSSO" :			data = "MT";	break;
        case "PARÁ" :					data = "PA";	break;
        case "PARAÍBA" :				data = "PB";	break;
        case "PERNAMBUCO" :				data = "PE";	break;
        case "PIAUÍ" :					data = "PI";	break;
        case "PARANÁ" :					data = "PR";	break;
        case "RIO DE JANEIRO" :			data = "RJ";	break;
        case "RIO GRANDE DO NORTE" :	data = "RN";	break;
        case "RONDÔNIA" : 				data = "RO";	break;
        case "RORAIMA" :				data = "RR";	break;
        case "RIO GRANDE DO SUL" :		data = "RS";	break;
        case "SANTA CATARINA" :			data = "SC";	break;
        case "SERGIPE" :				data = "SE";	break;
        case "SÃO PAULO" :				data = "SP";	break;
        case "TOCANTÍNS" :				data = "TO";	break;
      }
    
      return data;
    };

 /// Calculadora
 /// Verificação CEP
//  function cepCallBack(conteudo) {
//   if (!("erro" in conteudo)) {
//       //Atualiza os campos com os valores.
//       console.log(conteudo.localidade)
//       console.log(ConverterEstados(conteudo.uf))
//   } //end if.
//   else {
//       //CEP não Encontrado.
//       alert("CEP Inválido.");
//   }
// }

  
async function pesquisacep(valor, org) {
  //Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, '');
  
  //Verifica se campo cep possui valor informado.
  if (cep != "") {

      //Expressão regular para validar o CEP.
      var validacep = /^[0-9]{8}$/;

      //Valida o formato do CEP.
      if(validacep.test(cep)) {

          //Preenche os campos com "..." enquanto consulta webservice.

          //Cria um elemento javascript.
          var script = document.createElement('script');

          //Sincroniza com o callback.
          const data = await $.ajax({
           url:  'https://viacep.com.br/ws/'+ cep + '/json',
           method: 'GET',
           success: (e) => {
            $(`#${org}Input`).removeClass('is-invalid');
            $('#form-alert').hide();
             return e;
           },
           error: () => {
          //cep é inválido.
          $('#form-alert').show();
          $(`#${org}Input`).addClass('is-invalid');
          $('#form-alert').html(`CEP de <b>${org}</b> inválido!`);
           }
          });
          return data;
          // script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=cepCallBack';

          //Insere script no documento e carrega o conteúdo.
          // document.body.appendChild(script);

      } //end if.
      else {
          //cep é inválido.
          $('#form-alert').show();
          $(`#${org}Input`).addClass('is-invalid');
          $('#form-alert').html(`CEP de <b>${org}</b> inválido!`);
      }
  } //end if.
  else {
      //cep sem valor, limpa formulário.
  }
};

// End Verificação

$('#formCalculadora').submit(async function(e) {
  e.preventDefault();
  const OrigemCep = $('#OrigemInput').val();
  const DestinoCep = $('#DestinoInput').val();
  const Origem = await pesquisacep(DestinoCep, 'Origem');
  const Destino = await pesquisacep(DestinoCep, 'Destino');
  const data = {
    "origin": {
      "zipCode": OrigemCep.replace('-', ''),
      "city": Origem.localidade,
      "state": Origem.uf
    },
    "destination": {
      "zipCode": DestinoCep.replace('-', ''),
      "city": Destino.localidade,
      "state": Destino.uf
    },
    "products": [
      $('#ProdutoInput').val()
    ],
    "volumes": [
    {
      "qty": "1",
      "height": $('#AlturaInput').val().replace(',', '.'),
      "width": $('#LarguraInput').val().replace(',', '.'),
      "length": $('#ComprimentoInput').val().replace(',', '.'),
      "weight": $('#PesoInput').val().replace(',', '.')
    }
  ],
  "nfeTotal": $('#TotalNFe').val().replace(',','').replace('.','')
  };
  console.log(data)
  $.ajax({
    url: 'https://api.digitalfrete.com.br/api/v2/orders/quotation',
    method: 'POST',
    data: data,
    success: (e) => {
      console.log(e)
      $('#calculadoraResultado').html('');
      e.quotations.forEach(e => {
        console.log(e)
        $('#calculadoraResultado').append(/*html*/`
        <div class="col-lg">
          <div class="card bg-gradient-primary-to-secondary">
              <div class="card-body">
                  <div class="text-white text-center font-width-bold">
                      <h4>${e.modality}</h4>
                  </div>
                  <hr>
                  <div class="quotation-price">
                      <h3>
                          ${e.total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}
                      </h3>
                  </div>
                  <div class="quotation-prize">
                      <span>${e.estimativaEntregaDe} - ${e.estimativaEntregaAte} dias</span>
                  </div>
              </div>
          </div>
        </div>
        `)
      });
      var quotationModal = new bootstrap.Modal(document.getElementById('quotationModal'))
      quotationModal.show();

    }
  })
})


// $('.logistic-type').click(function() {
//     if ($(this).hasClass('flipped')) {
//         $(this).removeClass('flipped');
//         $('#logisticSwitch').attr('checked', false);
//     } else {
//         $(this).addClass('flipped');
//         $('#logisticSwitch').attr('checked', true);
//     }
// });

