let rotaApi = "http://192.168.100.13";


async function loadingData() {
    await fetch(rotaApi + '/RPG/api/campaign/campaigns.php?GET')
        .then(response => response.json())
        .then(result => {
            var rows = "";
            const rota_img = document.getElementById('ROTA_IMAGES').value;
            const rotaCampanha = document.getElementById('ROTA_CAMPANHA').value;

            for (var i = 0; i < result.length; i++) {
                rows += "<tr>";
                rows += "   <td>";
                rows += result[i].titulo;
                rows += "   </td>";
                rows += "   <td>";
                rows += result[i].mestre;
                rows += "   </td>";
                rows += "   <td>";
                rows += "       <div class='options'>";
                rows += "           <a href='" + rotaCampanha + "/" + result[i].id_Campanha + "'>";
                rows += "               <img src=" + rota_img + "/edit.svg >";
                rows += "           </a>";
                rows += "           <button onclick='deleteCampaign(" + result[i].id_Campanha + ")'>";
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

async function newCampaign() {

    await fetch(rotaApi + '/RPG/api/campaign/campaigns.php', {
        method: 'POST',
        body: new FormData(document.getElementById("newCampaign"))
    })
        .then(response => {
            document.getElementById('modal').checked = false;
            document.getElementById("newCampaign").reset();
            loadingData();

        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function deleteCampaign(id) {
    var formData = new FormData();
    formData.append('method', 'delete');
    formData.append('id', id);

    if (window.confirm('Tem certeza que deseja excluir está campanha?')) {
        await fetch(rotaApi + '/RPG/api/campaign/campaigns.php', {
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
