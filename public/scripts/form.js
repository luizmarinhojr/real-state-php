const address = document.getElementById('address');
const addressGroup = document.getElementById('address-group');

const street = document.getElementById('street');
const neighborhood = document.getElementById('neighborhood');
const city = document.getElementById('city');
const state = document.getElementById('state');

if (address.checked) {
    addressGroup.classList.toggle("hide");
}

function toogleAddressGroup() {
    addressGroup.classList.toggle("hide");
}

function fillAddressByCep(e) {
    if (e.value.length === 8) {
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
