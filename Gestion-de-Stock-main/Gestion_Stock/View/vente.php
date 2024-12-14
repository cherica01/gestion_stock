<?php
    include 'entete.php';
    if(!empty($_GET['id'])){
        $produit = getVente($_GET['id']);
    }
?>
    <div class="home-content">
        <div class="overview-boxes">
           <div class="box" id="akisaka">
                <form action="<?= !empty($_GET['id']) ? "../Controller/modifVente.php" : "../Controller/ajoutVente.php"?> " method="post">
                   
                    <input value="<?= !empty($_GET['id']) ? $produit['id'] :""?>" type="hidden" name="id" id="id" > <br>
                    <label for="id_article"> Produit</label>
                    <select onchange="setPrix()" name="id_article" id="id_article">
                    <?php
                         $produit = getProduit();
                        if(!empty($produit) && is_array($produit)){
                            foreach ($produit as $key => $value){
                                ?>  
                                    <option data-prix="<?= $value['prix_unitaire'] ?>" value="<?= $value['id'] ?>"><?= $value['nom_produit'], "--" , $value['quantite']," ","disponibles" ?></option>
                                <?php

                            }
                        }
                    ?>  
                    </select> <br>

                    <label for="id_client"> Client</label>
                    <select  name="id_client" id="id_client">
                    <?php
                        $client = getClient();
                        if(!empty($client) && is_array($client)){
                            foreach ($client as $key => $value){
                                ?>  
                                    <option  value="<?= $value['id'] ?>"><?= $value['nom'], "--" , $value['prenom'] ?></option>
                                <?php
                                }
                        }
                         
                    ?>  
                    </select> <br>
                  

                    <label for="quantite"> Quantite</label>
                    <input  onkeyup="setPrix()" value="<?= !empty($_GET['id']) ? $produit['quantite'] :""?>"  type="number" name="quantite" id="quantite" placeholder="entrez la quantite">  <br>

                    <label for="prix"> Prix</label>
                    <input value="<?= !empty($_GET['id']) ? $produit['prix'] :""?>"  type="number" name="prix" id="prix" placeholder="entrer le prix"> <br>

                    <button type="submit">Ajouter</button>
                    <?php
                    if (!empty($_SESSION['message']['text'])){
                        ?>
                        <div class="alert <?= $_SESSION['message']['type']?>">
                        <?= $_SESSION['message']['text'] ?> 
                        </div>   
                        <?php
                    }
                    ?>
                </form>
           </div> 
           <div class="box">
             <table class="mtable">
                <tr>
                    <th>Produit</th>
                    <th>Client</th>
                   
                    <th>Quantite</th>
                    <th>Prix </th>
                    <th>Date </th>
                    <th>Action</th>

                </tr>
                <?php
                    $vente = getVente();
                    if(!empty($vente) && is_array($vente)) {
                        foreach($vente as $key =>$value){
                            ?>
                               <tr>
                                <td><?= $value['nom_produit']?></td>
                                <td><?= $value['nom']." ".$value['prenom']?></td>
                               <td><?= $value['quantite']?></td>
                                <td><?= $value['prix']?></td>
                                <td><?= date('d/m/Y H:i:s', strtotime($value["date_vente"]))?></td>
                                <td>
                                    <a href="recuVente.php?id=<?= $value['id']?>"><i class='bx bx-receipt'></i></a>
                                    <a onclick="annuleVente(<?= $value['id']?>,<?= $value['idArticle']?>,<?= $value['quantite']?>)" style="color:red; "><i class='bx bx-stop-circle'></i></a>
                                </td>
                               </tr> 
                            <?php
                        }
                    }
                ?>
             </table>
           </div>
        </div>
      
    </div>
 </section>

<?php
    include 'pied.php';
?>
<script>

    function annuleVente(idVente, idProduit, quantite){
        if(confirm("Voulez vous vraiment annuler cette vente?")){
            window.location.href = "../Controller/annuleVente.php?idVente="+idVente+"&idProduit="+idProduit+"&quantite="+quantite;
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