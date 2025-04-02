var controleCampo3 = 1;

function adicionarCampo3() {
    controleCampo3++;
    console.log('adicionarCampo2 chamado, controleCampo2:', controleCampo3);

    // Faz a requisição AJAX para obter os produtos
    fetch('php/mesa/getmenubebida.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro na resposta da rede');
            }
            return response.json();
        })
        .then(data => {
            console.log('Dados recebidos:', data);

            // Constrói o HTML do select com os dados retornados
            let options = '';
            data.forEach(comidan => {
                options += `<option value="${comidan.codcomida}">${comidan.Comidan}</option>`;
            });

            const campoHTML = `
                <div class="form-group" id="campo${controleCampo3}">
                    <input type="hidden" name='preco[]'">
                    <select class="input" name="codcomida[]" id="codcomida">${options}</select>
                    <input class="quantidade" type="text" name="qte[]" id="qte" required>
                </div>
            `;

            document.getElementById('formulario3').insertAdjacentHTML('beforeend', campoHTML);
        })
        .catch(error => console.error('Erro ao buscar os produtos:', error));
}