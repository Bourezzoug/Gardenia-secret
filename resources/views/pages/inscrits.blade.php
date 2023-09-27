<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GS - Sondage</title>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @vite(['resources/css/boxMois.css'])
</head>
<body>

	{{-- @if (session('shareButtons')) --}}
    <div class="alert alert-success hidden" id="success-alert">
        <div class="modal_wrapper active">
			<div class="shadow"></div>
			<div class="success_wrap">
				<div id="share-content">
					<div class="flex-content">
						<div class="mt-[50px] text-center"><a href="https://gardeniasecret.com/">https://gardeniasecret.com/</a></div>
						<div id="social-links">
							<div class="flex space-x-5 items-center justify-center">
								<div>
								<a href="https://www.instagram.com/gardenia.secret/" class="flex items-center flex-col" target="_blank" class="social-button " id="">
									<img src="{{ asset('images/instagram.jpeg') }}" style="width: 60px" alt="">
									<p class="mt-2">Instagram</p>
								</a>
								</div>
								<div>
								<a href="https://www.tiktok.com/@gardenia.secret" class="flex items-center flex-col" target="_blank" class="social-button " id="">
									<img src="{{ asset('images/tiktok.jpeg') }}" style="width: 60px" alt="">
									<p class="mt-2">Tiktok</p>
								</a>
								</div>
								<div>
                                    <a href="https://www.youtube.com/@Gardenia.Secret" class="flex items-center flex-col" target="_blank" class="social-button " id="">
                                        <img src="{{ asset('images/youtube.jpeg') }}" style="width: 60px" alt="">
                                        <p class="mt-2">Youtube</p>
                                    </a>
								</div>
							</div>
						</div>

                        <div>
                            <p class="mb-4 text-justify">Chères clientes, </p>

                            <p class="mb-4 text-justify">    Nous vous remercions chaleureusement pour votre commande de notre Box Beauté édition limitée de l’été ! Nous sommes impatients de vous offrir une expérience beauté exceptionnelle avec Gardenia Secret. </p>
                                
                            <p class="mb-4 text-justify">    Pour assurer votre commande, l’un de nos membre de l’équipe  va prochainement vous contacter par téléphone pour confirmer les détails de votre commande. </p>
                                
                            <p class="mb-4 text-justify">    Bien à vous, </p>
                                
                            <p class="mb-4 text-justify">    L’équipe de Gardenia Secret</p>
                        </div>
					</div>
					{{-- <hr> --}}
				</div>

			</div>
		</div>
    </div>
    <div class="alert alert-success hidden" id="done-alert">
        <div class="modal_wrapper active">
			<div class="shadow"></div>
			<div class="success_wrap">
				<div id="share-content">
					<div class="flex-content">
						<div class="mt-[10px] text-center"><a href="https://gardeniasecret.com/">https://gardeniasecret.com/</a></div>

						<div>
							<div class="flex space-x-5 items-center justify-center">
								<div>
								<a href="https://www.instagram.com/gardenia.secret/" class="flex items-center flex-col" target="_blank" class="social-button " id="">
									<img src="{{ asset('images/instagram.jpeg') }}" style="width: 60px" alt="">
									<p class="mt-2">Instagram</p>
								</a>
								</div>
								<div>
								<a href="https://www.tiktok.com/@gardenia.secret" class="flex items-center flex-col" target="_blank" class="social-button " id="">
									<img src="{{ asset('images/tiktok.jpeg') }}" style="width: 60px" alt="">
									<p class="mt-2">Tiktok</p>
								</a>
								</div>
								<div>
                                    <a href="https://www.youtube.com/@Gardenia.Secret" class="flex items-center flex-col" target="_blank" class="social-button " id="">
                                        <img src="{{ asset('images/youtube.jpeg') }}" style="width: 60px" alt="">
                                        <p class="mt-2">Youtube</p>
                                    </a>
								</div>
							</div>
						</div>

                        <div>
							
                            <p class="mb-4 text-justify">Chères clientes,</p>

							<p class="mb-4 text-justify">Nous vous remercions pour l'incroyable enthousiasme que vous avez manifesté pour notre Box Beauté Gardenia Secret édition limitée de l'été. Malheureusement <b>la box du mois d’août est désormais épuisée !</b></p>
                                
                            <p class="mb-4 text-justify">Pour celles  qui n'ont pas eu l'opportunité de mettre la main sur cette édition, ne vous inquiétez pas, nous vous donnons la possibilité de réserver dès maintenant <b>notre prochaine Box Beauté du mois de septembre.</b>  </p>

							<p class="mb-4 text-justify">Soyez parmi les premières à en profiter en effectuant votre réservation sans tarder !</p>

                            <p class="mb-4 text-justify">Gardez un œil sur notre page Instagram et soyez prêtes pour une expérience beauté exceptionnelle lors de la prochaine édition.</p>
                                
							<p class="mb-4 text-justify">Merci pour votre confiance et votre soutien continu. </p>
                                
                            <p class="mb-4 text-justify">    L’équipe de Gardenia Secret</p>
                        </div>
					</div>
					{{-- <hr> --}}
				</div>

			</div>
		</div>
    </div>
{{-- @endif --}}
<div class="wrapper">
    <form action="{{ Route('inscrits.store') }}" method="POST" id="formulaire">
		@csrf
		<input type="hidden" name="form_type" value="form2">
	<div class="header">
        <img src="https://gardeniasecret.com/images/logo.png" style="width:300px;" alt="">
	</div>
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
					<div class="input_wrap">
						<input type="text" name="addresse" class="input" id="tel" placeholder="Addresse *" required>
					</div>
					<div class="input_wrap">
                        <textarea name="remarque" placeholder="Remarque" class="input" id=""></textarea>
					</div>
				</div>
			
		</div>
	</div>
	<div class="btns_wrap ml-0 ">

		
		<div class="common_btns form_4_btns" >

			<div style="display:flex;justify-content:flex-end;margin-right:70px">

				<button type="submit" class="btn_done">Commandez</button>
			</div>
		</div>
	</div>
</form>
<div id="error-alert" class="hidden" style="display:none">
    <!-- Error messages will be displayed here -->
</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get the form element
    const form = document.getElementById('formulaire');

    // Get the alert div
    const successAlert = document.getElementById('success-alert');
	const doneAlert = document.getElementById('done-alert');
    // Listen for the form submission event
    form.addEventListener('submit', function(event) {
            event.preventDefault();
    
            const formData = new FormData(form);
            fetch(form.action, {
                method: form.method,
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Success response
                    if (data.totalCount <= 2) {
                        successAlert.classList.remove('hidden');
                        doneAlert.classList.add('hidden');
                    } else {
                        successAlert.classList.add('hidden');
                        doneAlert.classList.remove('hidden');
                    }
                } else {
                    // Error response
                    if (data.errors) {
                    const firstErrorKey = Object.keys(data.errors)[0];
                    const firstErrorMessage = data.errors[firstErrorKey][0];
                    
                    const errorAlert = document.getElementById('error-alert');
                    errorAlert.innerHTML = firstErrorMessage;
                    errorAlert.classList.remove('hidden');
                    
                    Toastify({
                        text: firstErrorMessage,
                        duration: 2000, 
                        gravity: 'top', 
                        position: 'center', 
                        backgroundColor: '#af8d6a', 
                    }).showToast();
                }
                }
            })
            .catch(error => {
                // Handle other types of errors
            });
        });
});


</script>

{{-- <script type="text/javascript" src="app.js"></script> --}}

</body>
</html>