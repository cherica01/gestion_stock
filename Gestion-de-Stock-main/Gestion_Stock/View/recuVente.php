<?php
    include 'entete.php';
    if(!empty($_GET['id'])){
        $produit = getVente($_GET['id']);
    }
?>
    <div class="home-content">
    <button class="hid hidden-print" id="btnPrint" style="position:relative; left:45% "> <i class='bx bx-printer'></i> Imprimer</button>

        <div class="page">
            <div >
                <h2>E-GARAGE</h2>
                <div class="gau">
                    <p >Recu N° #<?= $produit['id']?> </p>
                    <p>Date : <?=date('d/m/Y H:i:s', strtotime($produit["date_vente"]))?> </p>
                </div>
            </div>
            <div class="cote" style="width: 50%;">
                <p>Nom :</p>
                <P><?= $produit['nom']." ".$produit['prenom']?></P>

             </div>
             <div class="cote" >
                <p>Telephone :</p>
                <P><?= $produit['telephone']?></P>

             </div>
             <div class="cote" style="width: 50%;">
                <p>Adresse :</p>
                <P><?= $produit['adresse']?></P>

             </div>
             <br>
             <table class="mtable">
                <tr>
                <th>Designation</th>
                   <th>Quantite</th>
                    <th>Prix unitaire </th>
                    <th>Prix Total </th>

                </tr>
            <tr>
                <td><?= $produit['nom_produit']?></td>
                <td><?= $produit['nom']." ".$produit['prenom']?></td>
                <td><?= $produit['quantite']?></td>
                <td><?= $produit['prix_unitaire']?></td>
                <td><?= $produit['prix']?></td>
                   
            </tr> 
             
             </table>
        </div>
       
    </div>
 </section>

<?php
    include 'pied.php';
?>
<script>
  var btnPrint = document.querySelector("#btnPrint");
    btnPrint.addEventListener("click",() =>{
        window.print();
    });
    function annuleVente(idVente, idArticle, quantite){
        if(confirm("Voulez vous vraiment annuler cette vente?")){
            window.location.href = "../Model/annuleVente.php?idVente="+idVente+"&idArticle="+idArticle+"quantite="+quantite;
        }
    }
function setPrix() {
    var produit = document.querySelector('#id_article');
    var quantite = document.querySelector('#quantite');
    var prix = document.querySelector('#prix');

    if (produit.options.length > 0 && produit.selectedIndex > -1) {
        var prixUnitaire = produit.options[produit.selectedIndex].getAttribute('data-prix');
        prix.value = Number(quantite.value) * Number(prixUnitaire);
    } else {
        alert('Veuillez sélectionner un produit.');
    }
}

</script>