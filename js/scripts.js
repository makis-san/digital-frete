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
        case "AP" :	data = "Amap??";					break;
        case "BA" :	data = "Bahia";					break;
        case "CE" :	data = "Cear??";					break;
        case "DF" :	data = "Distrito Federal";		break;
        case "ES" :	data = "Esp??rito Santo";		break;
        case "GO" :	data = "Goi??s";					break;
        case "MA" :	data = "Maranh??o";				break;
        case "MG" :	data = "Minas Gerais";			break;
        case "MS" :	data = "Mato Grosso do Sul";	break;
        case "MT" :	data = "Mato Grosso";			break;
        case "PA" :	data = "Par??";					break;
        case "PB" :	data = "Para??ba";				break;
        case "PE" :	data = "Pernambuco";			break;
        case "PI" :	data = "Piau??";					break;
        case "PR" :	data = "Paran??";				break;
        case "RJ" :	data = "Rio de Janeiro";		break;
        case "RN" :	data = "Rio Grande do Norte";	break;
        case "RO" :	data = "Rond??nia";				break;
        case "RR" :	data = "Roraima";				break;
        case "RS" :	data = "Rio Grande do Sul";		break;
        case "SC" :	data = "Santa Catarina";		break;
        case "SE" :	data = "Sergipe";				break;
        case "SP" :	data = "S??o Paulo";				break;
        case "TO" :	data = "Tocant??ns";				break;
        
        /* Estados */
        case "ACRE" :					data = "AC";	break;
        case "ALAGOAS" :				data = "AL";	break;
        case "AMAZONAS" :				data = "AM";	break;
        case "AMAP??" :					data = "AP";	break;
        case "BAHIA" :					data = "BA";	break;
        case "CEAR??" :					data = "CE";	break;
        case "DISTRITO FEDERAL" :		data = "DF";	break;
        case "ESP??RITO SANTO" :			data = "ES";	break;
        case "GOI??S" :					data = "GO";	break;
        case "MARANH??O" :				data = "MA";	break;
        case "MINAS GERAIS" :			data = "MG";	break;
        case "MATO GROSSO DO SUL" :		data = "MS";	break;
        case "MATO GROSSO" :			data = "MT";	break;
        case "PAR??" :					data = "PA";	break;
        case "PARA??BA" :				data = "PB";	break;
        case "PERNAMBUCO" :				data = "PE";	break;
        case "PIAU??" :					data = "PI";	break;
        case "PARAN??" :					data = "PR";	break;
        case "RIO DE JANEIRO" :			data = "RJ";	break;
        case "RIO GRANDE DO NORTE" :	data = "RN";	break;
        case "ROND??NIA" : 				data = "RO";	break;
        case "RORAIMA" :				data = "RR";	break;
        case "RIO GRANDE DO SUL" :		data = "RS";	break;
        case "SANTA CATARINA" :			data = "SC";	break;
        case "SERGIPE" :				data = "SE";	break;
        case "S??O PAULO" :				data = "SP";	break;
        case "TOCANT??NS" :				data = "TO";	break;
      }
    
      return data;
    };

 /// Calculadora
 /// Verifica????o CEP
//  function cepCallBack(conteudo) {
//   if (!("erro" in conteudo)) {
//       //Atualiza os campos com os valores.
//       console.log(conteudo.localidade)
//       console.log(ConverterEstados(conteudo.uf))
//   } //end if.
//   else {
//       //CEP n??o Encontrado.
//       alert("CEP Inv??lido.");
//   }
// }

  
async function pesquisacep(valor, org) {
  //Nova vari??vel "cep" somente com d??gitos.
  var cep = valor.replace(/\D/g, '');
  
  //Verifica se campo cep possui valor informado.
  if (cep != "") {

      //Express??o regular para validar o CEP.
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
          //cep ?? inv??lido.
          $('#form-alert').show();
          $(`#${org}Input`).addClass('is-invalid');
          $('#form-alert').html(`CEP de <b>${org}</b> inv??lido!`);
           }
          });
          return data;
          // script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=cepCallBack';

          //Insere script no documento e carrega o conte??do.
          // document.body.appendChild(script);

      } //end if.
      else {
          //cep ?? inv??lido.
          $('#form-alert').show();
          $(`#${org}Input`).addClass('is-invalid');
          $('#form-alert').html(`CEP de <b>${org}</b> inv??lido!`);
      }
  } //end if.
  else {
      //cep sem valor, limpa formul??rio.
  }
};

// End Verifica????o

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

