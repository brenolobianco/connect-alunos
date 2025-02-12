<?php

include 'controllers/matricula/ControllerSelect.php';

$price = str_replace(",",".",$valor_desc_est);
$transactionAmount = $price;
$cpf = str_replace(array('.','-','/','(',')',' '), '', $cpf_acad);

if($acad_id_mat != $idLog){
    echo 'Acesso indeferido, contate o suporte...';
}else{
    
?>
<section class="form3 cid-tc0bT9FsJh" id="form3-3r" style="margin-top: 100px;">

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <center>
                <h3 style="color: #fff;">Ambiente de Teste</h3><br>
                <p style="color: #fff;">
                   Mastercard	5031 4332 1540 6351 | cod	123 - Data	11/25<br>
                    Visa	  4235 6477 2802 5682  | cod	123	- Data  11/25<br>
                    American Express 	3753 651535 56885 | cod	1234  - Data	11/25 
                    
                </p>
            </center>
        </div>
        
  
        <div class="col-lg-7" data-form-type="formoid" style="margin-top: 40px;">
                            <img src="assets/images/mercado-pago.png" width="50%">
                    <!--Start Pagamento-->
                    <div class="card bg-dark">

                        <div class="card-header" style="color: #fff;">
                            <p>Pagamento seguro com Mercado Pago no valor de R$ <?= $valor_desc_est?></p>
                        </div>

                        <!--Start Total a pagar-->
                        <div class="card-body">

                            <form id="form-checkout" action="https://medhub.app.br/payment/mercadopago/src/processPaymentTest.php" method="POST">

                                <input id="token" name="token" type="hidden"/>
                                <input id="paymentMethodId" name="paymentMethodId" type="hidden"/>
                                <input id="transactionAmount" name="transactionAmount" type="hidden" value="<?=$transactionAmount?>"/>
                                <input id="matriculaId" name="matriculaId" type="hidden" value="<?=$id_mat?>" />
                                <input id="produtoId" name="produtoId" type="hidden" value="<?=$id_curso?>" />
                                <input id="produtoDescription" name="produtoDescription" type="hidden" value="<?=$nome_curso?>"/>
                                <input id="academicoId" name="academicoId" type="hidden" value="<?=$idLog?>"/>

                                <input type="hidden" id="deviceId">

                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            
                                            <div id="form-checkout__cardNumber" class="form-control form-control-sm" style="height: 14px"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <select id="form-checkout__issuer" name="issuerId" class="form-control form-control-sm" >
                                                <option value="" disabled selected>Banco emissor</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div id="form-checkout__expirationDate" class="form-control form-control-sm" style="height: 14px"></div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div id="form-checkout__securityCode" class="form-control form-control-sm" style="height: 14px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" id="form-checkout__cardholderName" placeholder="Nome igual esta no cartão" name="name" class="form-control form-control-sm"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <select id="form-checkout__identificationType" name="identificationType" class="form-control form-control-sm">
                                                <option value="" disabled selected>Tipo de documento</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <input type="text" id="form-checkout__identificationNumber" name="identificationNumber" placeholder="Somente Números" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="email" id="form-checkout__cardholderEmail" name="email" placeholder="E-mail" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <select id="form-checkout__installments" name="installments" class="form-control form-control-sm">
                                                <option value="" disabled selected>Parcelas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div id="msg"></div>
                                    </div>
                                    <div class="col-12" id="preloaderPagamento">
                                        <!--                                <div class="form-group">-->
                                        <button type="submit" id="form-checkout__submit" class="btn btn-success btn-block">Pagar</button>
                                        <!--                                </div>-->
                                    </div>
                                </div>
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-success"
                                         style="width: 0%">
                                    </div>
                                </div>
                            </form>
                            <img src="assets/images/site-blindado.png" width="50%">
                        </div>
                    </div>
                    <!--End Pagamento-->
        </div>
       
        <div style="width: 100%; height:250px;"></div>
        <div class="offset-lg-1"></div>
    </div>
</div>
</section>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script src="https://www.mercadopago.com/v2/security.js" view="checkout" output="deviceId"></script>
<script>
    const mp = new MercadoPago("TEST-aeb00ca9-2563-4dc4-a2c8-74f0ab1d33fa");

    const cardNumberElement = mp.fields.create('cardNumber', {
        placeholder: "Número do cartão"
    }).mount('form-checkout__cardNumber');
    const expirationDateElement = mp.fields.create('expirationDate', {
        placeholder: "MM/YY",
    }).mount('form-checkout__expirationDate');
    const securityCodeElement = mp.fields.create('securityCode', {
        placeholder: "Código de segurança"
    }).mount('form-checkout__securityCode');

    //obter tipo de documentos
    (async function getIdentificationTypes() {
        try {
            const identificationTypes = await mp.getIdentificationTypes();
            const identificationTypeElement = document.getElementById('form-checkout__identificationType');

            createSelectOptions(identificationTypeElement, identificationTypes);
        } catch (e) {
            return console.error('Error getting identificationTypes: ', e);
            errorPayment();
        }
    })();

    function createSelectOptions(elem, options, labelsAndKeys = { label: "name", value: "id" }) {
        const { label, value } = labelsAndKeys;

        elem.options.length = 0;

        const tempOptions = document.createDocumentFragment();

        options.forEach(option => {
            const optValue = option[value];
            const optLabel = option[label];

            const opt = document.createElement('option');
            opt.value = optValue;
            opt.textContent = optLabel;

            tempOptions.appendChild(opt);
        });

        elem.appendChild(tempOptions);
    }

    //obter metodos de pagamento do cartão
    const paymentMethodElement = document.getElementById('paymentMethodId');
    const issuerElement = document.getElementById('form-checkout__issuer');
    const installmentsElement = document.getElementById('form-checkout__installments');

    const issuerPlaceholder = "Banco emissor";
    const installmentsPlaceholder = "Parcelas";

    let currentBin;
    cardNumberElement.on('binChange', async (data) => {
        const { bin } = data;
        try {
            if (!bin && paymentMethodElement.value) {
                clearSelectsAndSetPlaceholders();
                paymentMethodElement.value = "";
            }

            if (bin && bin !== currentBin) {
                const { results } = await mp.getPaymentMethods({ bin });
                const paymentMethod = results[0];

                paymentMethodElement.value = paymentMethod.id;
                updatePCIFieldsSettings(paymentMethod);
                updateIssuer(paymentMethod, bin);
                updateInstallments(paymentMethod, bin);
            }

            currentBin = bin;
        } catch (e) {
            console.error('error getting payment methods: ', e);
            errorPayment();
        }
    });

    function clearSelectsAndSetPlaceholders() {
        clearHTMLSelectChildrenFrom(issuerElement);
        createSelectElementPlaceholder(issuerElement, issuerPlaceholder);

        clearHTMLSelectChildrenFrom(installmentsElement);
        createSelectElementPlaceholder(installmentsElement, installmentsPlaceholder);
    }

    function clearHTMLSelectChildrenFrom(element) {
        const currOptions = [...element.children];
        currOptions.forEach(child => child.remove());
    }

    function createSelectElementPlaceholder(element, placeholder) {
        const optionElement = document.createElement('option');
        optionElement.textContent = placeholder;
        optionElement.setAttribute('selected', "");
        optionElement.setAttribute('disabled', "");

        element.appendChild(optionElement);
    }

    // Esta etapa melhora as validações cardNumber e securityCode
    function updatePCIFieldsSettings(paymentMethod) {
        const { settings } = paymentMethod;

        const cardNumberSettings = settings[0].card_number;
        cardNumberElement.update({
            settings: cardNumberSettings
        });

        const securityCodeSettings = settings[0].security_code;
        securityCodeElement.update({
            settings: securityCodeSettings
        });
    }

    //obter banco emissor
    async function updateIssuer(paymentMethod, bin) {
        const { additional_info_needed, issuer } = paymentMethod;
        let issuerOptions = [issuer];

        if (additional_info_needed.includes('issuer_id')) {
            issuerOptions = await getIssuers(paymentMethod, bin);
        }

        createSelectOptions(issuerElement, issuerOptions);
    }

    async function getIssuers(paymentMethod, bin) {
        try {
            const { id: paymentMethodId } = paymentMethod;
            return await mp.getIssuers({ paymentMethodId, bin });
        } catch (e) {
            console.error('error getting issuers: ', e);
            errorPayment();
        }
    };

    //Obter quantidade de parcelas
    async function updateInstallments(paymentMethod, bin) {
        try {
            const installments = await mp.getInstallments({
                amount: document.getElementById('transactionAmount').value,
                bin,
                paymentTypeId: 'credit_card'
            });
            const installmentOptions = installments[0].payer_costs;
            const installmentOptionsKeys = { label: 'recommended_message', value: 'installments' };
            createSelectOptions(installmentsElement, installmentOptions, installmentOptionsKeys);
        } catch (error) {
            console.error('error getting installments: ', e);
            errorPayment();
        }
    }

    //Criar token do cartão
    const formElement = document.getElementById('form-checkout');
    formElement.addEventListener('submit', createCardToken);

    async function createCardToken(event) {
        event.preventDefault();
        try {
            const tokenElement = document.getElementById('token');
            if (!tokenElement.value) {
                // event.preventDefault();
                const token = await mp.fields.createCardToken({
                    cardholderName: document.getElementById('form-checkout__cardholderName').value,
                    identificationType: document.getElementById('form-checkout__identificationType').value,
                    identificationNumber: document.getElementById('form-checkout__identificationNumber').value,
                });
                tokenElement.value = token.id;
                // formElement.requestSubmit();
            }

            let formData = new FormData(formElement);
            
            $('#preloaderPagamento').attr("style","display:none");

            fetch(formElement.action, {
                method: 'POST',
                body: formData,
            })
                .then(r => r.json())
                .then(data => {
                    $(".progress-bar").animate({
                        width: "100%",
                    }, 3000);
                    if (data.id){
                        if (data.status==='approved') {
                            $('#msg').html('<img src="assets/images/loading-gif.gif" width="50%">');
                            setTimeout('window.location.href = "https://medhub.app.br/home.php?acao=aprovado"', 1000);
                        } else {
                            $('#msg').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">x</button><strong> Erro ao realizar o pagamento!</strong></div>');
                            //setTimeout('window.location.href = "https://medhub.app.br/home.php?acao=erro-no-processo"', 10000);
                        }
                        // window.location.href()
                    } else {
                        errorPayment();
                    }
                })
            // .finally(() => progressBar.setAttribute("value", "0"));

        } catch (e) {
            errorPayment();
            console.error('error creating card token: ', e)
        }
    }
    function errorPayment(text = null){
        $('#msg').html('<div class="btn text-danger">Erro ao processar o pagamento, confira os dados e tente novamente.</div>');
        setTimeout('document.location.reload(true)', 5000);
    }
</script>
<?php } ?>
