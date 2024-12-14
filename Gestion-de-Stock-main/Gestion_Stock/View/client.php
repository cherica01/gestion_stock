<?php
    include 'entete.php';
    if(!empty($_GET['id'])){
        $client = getClient($_GET['id']);
    }
?>
    <div class="home-content">
        <div class="overview-boxes">
           <div class="box" id="akisaka">
                <form action="<?= !empty($_GET['id']) ? "../Controller/modifClient.php" : "../Controller/ajoutClient.php"?> " method="post">
                    <label for="nom"> Le nom </label>
                    <input value="<?= !empty($_GET['id']) ? $client['nom'] :""?>" type="text" name="nom" id="nom" placeholder="entrez le nom"> <br>
                    <input value="<?= !empty($_GET['id']) ? $client['id'] :""?>" type="hidden" name="id" id="id" > <br>
                    
                    <label for="prenom"> Le prenom </label>
                    <input value="<?= !empty($_GET['id']) ? $client['prenom'] :""?>" type="text" name="prenom" id="prenom" placeholder="entrez le pre,om"> <br>
                    
                    <label for="telephone"> Le telephone </label>
                    <input value="<?= !empty($_GET['id']) ? $client['telephone'] :""?>" type="text" name="telephone" id="telephone" placeholder="entrez le telephone"> <br>
    
                    <label for="adresse"> L'Adresse</label>
                    <input value="<?= !empty($_GET['id']) ? $client['adresse'] :""?>" type="text" name="adresse" id="adresse" placeholder="entrez l'adresse"> <br>  
                    
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
                    <th>Nom </th>
                    <th>Prenom</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    

                </tr>
                <?php
                    $client = getClient();
                    if(!empty($client) && is_array($client)) {
                        foreach($client as $key =>$value){
                            ?>
                               <tr>
                                <td><?= $value['nom']?></td>
                                <td><?= $value['prenom']?></td>
                                <td><?= $value['telephone']?></td>
                                <td><?= $value['adresse']?></td>
                                
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