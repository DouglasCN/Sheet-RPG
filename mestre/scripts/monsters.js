const rotaApi = "http://192.168.100.13";

async function loadingData() {
    await fetch(rotaApi + '/RPG/api/monster/monsters.php?GET')
        .then(response => response.json())
        .then(result => {
            var rows = "";
            const rota_img = document.getElementById('ROTA_IMAGES').value;
            const rotaMonstro = document.getElementById('ROTA_MONSTRO').value;

            for (var i = 0; i < result.length; i++) {
                rows += "<tr>";
                rows += "   <td>";
                rows += result[i].nome;
                rows += "   </td>";
                rows += "   <td>";
                rows += result[i].fr_Campanha;
                rows += "   </td>";
                rows += "   <td>";
                rows += "       <div class='options'>";
                rows += "           <a href='" + rotaMonstro + "/" + result[i].id_Monstro + "'>";
                rows += "               <img src=" + rota_img + "/edit.svg >";
                rows += "           </a>";
                rows += "           <button onclick='deleteMonster(" + result[i].id_Monstro + ")'>";
                rows += "               <img src=" + rota_img + "/trash.svg >";
                rows += "           </button>";
                rows += "       </div>";
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

async function newMonster() {

    await fetch(rotaApi + '/RPG/api/monster/monsters.php', {
        method: 'POST',
        body: new FormData(document.getElementById("newMonster"))
    })
        .then(response => {
            document.getElementById('modal').checked = false;
            document.getElementById("newMonster").reset();
            loadingData();

        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function deleteMonster(id) {
    var formData = new FormData();
    formData.append('method', 'delete');
    formData.append('id', id);

    if (window.confirm('Tem certeza que deseja excluir este monstro?')) {
        await fetch(rotaApi + '/RPG/api/monster/monsters.php', {
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
