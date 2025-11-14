async function fetchAddressByCep(cep) {
    const cepLimpo = cep.replace(/\D/g, ''); 
    const url = `https://viacep.com.br/ws/${cepLimpo}/json/`;

    try {
        const response = await fetch(url);
        const data = await response.json();

        if (data.erro || !response.ok) {
            console.error(`CEP ${cep} não encontrado ou inválido.`);
            return null;
        }

        const enderecoPadrao = {
            cep: data.cep.replace('-', ''),
            street: data.logradouro,
            neighborhood: data.bairro,
            city: data.localidade,
            state: data.uf,
            complement: data.complemento || ""
        };

        return enderecoPadrao;

    } catch (error) {
        console.error("Erro de rede ou conexão com a API ViaCEP:", error);
        return null;
    }
}