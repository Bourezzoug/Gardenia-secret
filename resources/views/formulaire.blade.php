<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sondage-emailing | Wibday.com</title>
    @vite(['resources/css/formulaire.css'])
</head>
<body>

<div class="wrapper">
    <form action="" method="POST" id="formulaire">
        @csrf
	<div class="form_wrap">
        
		<div class="form_1 data_info">
			
			
				<div class="form_container">
					<div class="input_wrap">
						<input type="text" name="nom_complet" class="input" id="nom" placeholder="Nom complet *" required>
					</div>
					<div class="input_wrap">
						<input type="email" name="email" class="input" id="email" placeholder="Email *" required>
					</div>
					<div class="input_wrap">
						<input type="text" name="ville" class="input ville" placeholder="Ville *" id="ville" required>
						</label>
					</div>
					<div class="input_wrap">
						<input type="tel" name="telephone" class="input" id="tel" placeholder="Téléphone *" required>
					</div>

				</div>
			
		</div>
	</div>
	<div class="btns_wrap">
		<div class="common_btns form_4_btns">
			<button type="submit" class="btn_done">Envoyer</button>
		</div>
	</div>
</form>
</div>
<div class="modal_wrapper">
	<div class="shadow"></div>
	<div class="success_wrap">
		<span class="modal_icon"><ion-icon name="checkmark-sharp"></ion-icon></span>
		<p>Merci pour votre participation.</p>
	</div>
</div>

<!-- <script type="text/javascript" src="app.js"></script> -->

</body>
</html>