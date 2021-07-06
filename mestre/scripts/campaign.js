let rotaApi = "http://192.168.100.13";

document.getElementById("player-AB")
    .addEventListener("keyup", keyEnter);
document.getElementById("player-AI")
    .addEventListener("keyup", keyEnter);
document.getElementById("monsters-AB")
    .addEventListener("keyup", keyEnter);
document.getElementById("monsters-AI")
    .addEventListener("keyup", keyEnter);

function keyEnter(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        addAtribute(event.target.id)
    }
}

function loadingData() {
    dataPlayerAB()
    dataPlayerAI()
    dataMonstersAB()
    dataMonstersAI()
}

async function dataPlayerAB() {
    await fetch(rotaApi + '/RPG/api/campaign/campaign.php?GET=player-AB')
        .then(response => response.json())
        .then(result => {
            var attribute = "";
            let rota_img = document.getElementById('ROTA_IMAGES').value;

            for (var i = 0; i < result.length; i++) {
                attribute += "<p>";
                attribute += "  <span>";
                attribute += result[i].nomeAtributo;
                attribute += "  </span>";
                attribute += "  <button onclick='deleteAttribute(" + result[i].id_AtributoCampanha + ")'>";
                attribute += "      <img src=" + rota_img + "/trash.svg >";
                attribute += "  </button>";
                attribute += "</p>";
            }
            document.getElementById("content-player-AB").innerHTML = attribute;
            document.getElementById("player-AB").value = ""
        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function dataPlayerAI() {
    await fetch(rotaApi + '/RPG/api/campaign/campaign.php?GET=player-AI')
        .then(response => response.json())
        .then(result => {
            var attribute = "";
            let rota_img = document.getElementById('ROTA_IMAGES').value;

            for (var i = 0; i < result.length; i++) {
                attribute += "<p>";
                attribute += "  <span>";
                attribute += result[i].nomeAtributo;
                attribute += "  </span>";
                attribute += "  <button onclick='deleteAttribute(" + result[i].id_AtributoCampanha + ")'>";
                attribute += "      <img src=" + rota_img + "/trash.svg >";
                attribute += "  </button>";
                attribute += "</p>";
            }
            document.getElementById("content-player-AI").innerHTML = attribute;
            document.getElementById("player-AI").value = ""
        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function dataMonstersAB() {
    await fetch(rotaApi + '/RPG/api/campaign/campaign.php?GET=monster-AB')
        .then(response => response.json())
        .then(result => {
            var attribute = "";
            let rota_img = document.getElementById('ROTA_IMAGES').value;

            for (var i = 0; i < result.length; i++) {
                attribute += "<p>";
                attribute += "  <span>";
                attribute += result[i].nomeAtributo;
                attribute += "  </span>";
                attribute += "  <button onclick='deleteAttribute(" + result[i].id_AtributoCampanha + ")'>";
                attribute += "      <img src=" + rota_img + "/trash.svg >";
                attribute += "  </button>";
                attribute += "</p>";
            }
            document.getElementById("content-monsters-AB").innerHTML = attribute;
            document.getElementById("monsters-AB").value = ""
        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function dataMonstersAI() {
    await fetch(rotaApi + '/RPG/api/campaign/campaign.php?GET=monster-AI')
        .then(response => response.json())
        .then(result => {
            var attribute = "";
            let rota_img = document.getElementById('ROTA_IMAGES').value;

            for (var i = 0; i < result.length; i++) {
                attribute += "<p>";
                attribute += "  <span>";
                attribute += result[i].nomeAtributo;
                attribute += "  </span>";
                attribute += "  <button onclick='deleteAttribute(" + result[i].id_AtributoCampanha + ")'>";
                attribute += "      <img src=" + rota_img + "/trash.svg >";
                attribute += "  </button>";
                attribute += "</p>";
            }
            document.getElementById("content-monsters-AI").innerHTML = attribute;
            document.getElementById("monsters-AI").value = ""
        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function addAtribute(target) {

    var formData = new FormData(document.getElementById("form-content-" + target));
    formData.append('fr', document.getElementById("FR").value);

    await fetch(rotaApi + '/RPG/api/campaign/campaign.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            loadingData();

        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function deleteAttribute(id) {
    var formData = new FormData();
    formData.append('method', 'delete');
    formData.append('id', id);

    if (window.confirm('Tem certeza que deseja excluir está campanha?')) {
        await fetch(rotaApi + '/RPG/api/campaign/campaign.php', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                loadingData();

            })
            .catch(err => {
                // trata se alguma das promises falhar
                console.error('Failed retrieving information', err);
            });
    }
}

loadingData()