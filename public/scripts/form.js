// const address = document.getElementById('address');
// const addressGroup = document.getElementById('address-group');

// const street = document.getElementById('street');
// const neighborhood = document.getElementById('neighborhood');
// const city = document.getElementById('city');
// const state = document.getElementById('state');

// if (address.checked) {
//     addressGroup.classList.toggle("hide");
// }

// function toogleAddressGroup() {
//     addressGroup.classList.toggle("hide");
// }

function fillAddressByCep(e) {
    if (e.value.length === 9) {
        endereco = fetchAddressByCep(e.value).then(endereco => {
            if (endereco) {
                street.value = endereco.street;
                neighborhood.value = endereco.neighborhood;
                city.value = endereco.city;
                state.value = endereco.state;
            } else {
                console.log("Endereço não encontrado.");
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    
    const cpfInput = document.getElementById('cpf');
    const cepInput = document.getElementById('cep');
    const cellphoneInput = document.getElementById('cellphone');

    if (cpfInput) {
        IMask(cpfInput, {
            mask: '000.000.000-00'
        });
    }

    if (cepInput) {
        IMask(cepInput, {
            mask: '00000-000'
        });
    }

    if (cellphoneInput) {
        IMask(cellphoneInput, {
            mask: [
                // Máscara para números de 8 dígitos (sem o 9) - opcional para DDDs
                { mask: '(00) 0000-0000' }, 
                // Máscara para números de 9 dígitos (9 na frente)
                { mask: '(00) 00000-0000' } 
            ]
        });
    }

    const address = document.getElementById('address');
    const addressGroup = document.getElementById('address-group');
    
    if (address && addressGroup) {
        // Inicializa o estado visual
        if (address.checked) {
             addressGroup.classList.remove("hide");
        } else {
             addressGroup.classList.add("hide");
        }

        // Define o listener de forma programática
        address.addEventListener('change', function() {
            addressGroup.classList.toggle("hide");
        });
    }
});
