      <h2>Mes fiches de frais</h2>
      <form action="index.php?uc=etatFrais&amp;action=voirEtatFrais" method="post">
        <fieldset class="corpsForm"><legend>Mois à sélectionner</legend>
	 
          <label for="lstMois" accesskey="n">Mois : </label>
          <select id="lstMois" name="lstMois">
            <?php
			foreach ($lesMois as $unMois)
			{
			  $mois = $unMois['mois'];
				$numAnnee =  $unMois['numAnnee'];
				$numMois =  $unMois['numMois'];
				if($mois == $moisASelectionner){
				?>
				<option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
				else{ ?>
				<option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}			
			}           
		   ?>    
            
          </select>
      </fieldset>

      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
    </form>
