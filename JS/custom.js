var controleCampo = 1;

function adicionarCampo() {
  controleCampo++;
  console.log(controleCampo);

  // Faz a requisição AJAX para obter os produtos
  fetch("getmenucomida.php")
    .then((response) => response.json())
    .then((data) => {
      // Constrói o HTML do select com os dados retornados
      let options = "";
      data.forEach((comidan) => {
        options += `<option value="${comidan.codcomida}">${comidan.Comidan}</option>`;
      });

      const campoHTML = `
                <div class="form-group" id="campo${controleCampo}">
                    <input type="hidden" name='preco[]'">
                    <select  id="menupedido" class="input" name="codcomida[]" id="codcomida">${options}</select>
                    <input  id="menupedido2" class="quantidade" type="text" name="qte[]" id="qte" required>
                </div>
            `;

      document
        .getElementById("formulario")
        .insertAdjacentHTML("beforeend", campoHTML);
    })
    .catch((error) => console.error("Erro ao buscar os produtos:", error));
}


