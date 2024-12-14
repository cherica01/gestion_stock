<?php
    include 'entete.php';
    if(!empty($_GET['id'])){
        $produit = getProduit($_GET['id']);
    }
?>
    <div class="home-content">
        <div class="overview-boxes">
           <div class="box" id="akisaka">
                <form action="<?= !empty($_GET['id']) ? "../Controller/modifProduit.php" : "../Controller/ajoutProduit.php"?> " method="post">
                    <label for="nom_produit"> Le nom de la voiture</label>
                    <input classe="aligne" value="<?= !empty($_GET['id']) ? $produit['nom_produit'] :""?>" type="text" name="nom_produit" id="nom_produit" placeholder="entrez le nom"> <br>
                    <input value="<?= !empty($_GET['id']) ? $produit['id'] :""?>" type="hidden" name="id" id="id" > <br>
                    <label for="categorie"> Categorie</label>
                    <select classe="aligne"  name="categorie" id="categorie">
                        <option <?= !empty($_GET['id']) && $produit['categorie']== "Sport" ? "selected" :""?>  value="Sport">Sport</option>
                        <option <?= !empty($_GET['id']) && $produit['categorie']== "4X4" ? "selected" :""?>value="4X4">4X4</option>
                        <option <?= !empty($_GET['id']) && $produit['categorie']== "SUV" ? "selected" :""?>value="SUV">SUV</option>
                        <option <?= !empty($_GET['id']) && $produit['categorie']== "Classe" ? "selected" :""?> value="Classe">Classe</option> 
                    </select> <br>
                    <label for="provenance"> Provenance</label>
                    <select classe="aligne"   name="provenance" id="provenance">
                        <option <?= !empty($_GET['id']) && $produit['provenance']== "USA" ? "selected" :""?> value="USA">USA</option>
                        <option <?= !empty($_GET['id']) && $produit['provenance']== "France" ? "selected" :""?> value="France">France</option>
                        <option <?= !empty($_GET['id']) && $produit['provenance']== "Japon" ? "selected" :""?> value="Japon">Japon</option>
                        <option <?= !empty($_GET['id']) && $produit['provenance']== "Allemagne" ? "selected" :""?> value="Allemagne">Allemagne</option> 
                    </select> <br> 
                   

                    <label for="quantite"> Quantite</label>
                    <input classe="aligne" value="<?= !empty($_GET['id']) ? $produit['quantite'] :""?>"  type="number" name="quantite" id="quantite" placeholder="entrez la quantite">  <br>

                    <label for="prix_unitaire"> Prix unitaire</label>
                    <input classe="aligne" value="<?= !empty($_GET['id']) ? $produit['prix_unitaire'] :""?>"  type="number" name="prix_unitaire" id="prix_unitaire" placeholder="en million d'ariary"> <br>


                     
                    <label for="date_livraison"> Date de livraison </label>
                    <input classe="aligne" value="<?= !empty($_GET['id']) ? $produit['date_livraison'] :""?>"  type="datetime-local" name="date_livraison" id="date_livraison" placeholder="entrez la date de livraison"> <br>
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
                    <th>Categorie</th>
                    <th>Provenance</th>
                    <th>Quantite</th>
                    <th>Prix unitaire</th>
                    <th>D-livraison </th>
                    <th>Action</th>

                </tr>
                <?php
                    $produit = getProduit();
                    if(!empty($produit) && is_array($produit)) {
                        foreach($produit as $key =>$value){
                            ?>
                               <tr>
                                <td><?= $value['nom_produit']?></td>
                                <td><?= $value['categorie']?></td>
                                <td><?= $value['provenance']?></td>
                                <td><?= $value['quantite']?></td>
                                <td><?= $value['prix_unitaire']?></td>
                                <td><?= $value['date_livraison']?></td>
                                <td><a href="?id=<?= $value['id']?>"><i class='bx bxs-edit-alt'></i></a></td>
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
    include 'pied.php'
?>