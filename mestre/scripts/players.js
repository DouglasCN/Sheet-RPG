let rotaApi = "http://192.168.100.13";


async function loadingData() {
    await fetch(rotaApi + '/RPG/api/player/players.php?GET')
        .then(response => response.json())
        .then(result => {
            var rows = "";
            let rota_img = document.getElementById('ROTA_IMAGES').value;


            for (var i = 0; i < result.length; i++) {
                rows += "<tr>";
                rows += "   <td>";
                rows += result[i].jogador;
                rows += "   </td>";
                rows += "   <td>";
                rows += result[i].nome;
                rows += "   </td>";
                rows += "   <td>";
                rows += result[i].fr_Campanha;
                rows += "   </td>";
                rows += "   <td style='display: flex; justify-content: center'>";
                rows += "       <button onclick='deletePlayer(" + result[i].id_Personagem + ")'>";
                rows += "           <img src=" + rota_img + "/trash.svg >";
                rows += "       </button>";
                rows += "   </td>"
                rows += "</tr>";
            }
            document.getElementById("data").innerHTML = rows;
        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function newPlayer() {
    console.dir(document.getElementById("newPlayer"));

    await fetch(rotaApi + '/RPG/api/player/players.php', {
        method: 'POST',
        body: new FormData(document.getElementById("newPlayer"))
    })
        .then(response => {
            document.getElementById('modal').checked = false;
            document.getElementById("newPlayer").reset();
            loadingData();

        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function deletePlayer(id) {
    var formData = new FormData();
    formData.append('method', 'delete');
    formData.append('id', id);

    if (window.confirm('Tem certeza que deseja excluir está campanha?')) {
        await fetch(rotaApi + '/RPG/api/player/players.php', {
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

loadingData();
