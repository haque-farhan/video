<?php 

	require_once '../inc-files.php';
	$name=Functions::cleanInput($_POST['name']);
	$optionId=Functions::cleanInput($_POST['option']);

	$config= new Config();
	$getOption=$config->getOption($optionId);
	$getBreed=$config->getBreed($name);
	

	echo '<div class="form-group same-all " data-index="1">
			<p class="black _18px m-b-30">FILL UP THE FORM FOR <span style="color:red;font-weight:bold"> '.$name.' </span> </p>';

			foreach ($getOption as $option) {
					echo '<input type="text" name="'.$option->opt_name.'" class="fill-form m-b-10" required placeholder="'.$option->opt_name.'">';
				}	
				
											
		echo '</div>';

		echo '<div class="form-group m-b-50">
							<select id="animal-select" name="Breed" required>
							<option selected="selected"  value="" disabled> Select Breed</option>';	
							foreach ($getBreed as $breed) {
							echo '<option value="'.$breed->breed_name.'">'.$breed->breed_name.'</option required>'	;
							
						}		

							echo '</select>
						</div>
				<button class="basic-bg-color white fill-btn">SUBMIT</button>	
					';

?>