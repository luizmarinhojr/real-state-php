const address = document.getElementById('address');
const addressGroup = document.getElementById('address-group');
address.checked = false;

function dosomething() {
    console.log(address.checked);
    addressGroup.classList.toggle("hide");
}
