	$(function () {
		var erreur = "";
		$("form").on("submit", function(e){
			e.preventDefault();
			$("#danger").addClass("hidden");				
			$("#success").addClass("hidden");				
			if ($("#prependedtext").val() == "" ) {
				console.log("Fail input prepended");
				erreur+= "Input vide \n";
			}			
			if ($("#textarea").val() == "" || $("#textarea").val() == "default text" ) {
				console.log("Fail input textarea");
				erreur+= "Textarea vide \n";
			}			
			if ($("#selectmultiple").val() == null){
				console.log("Fail select option");
				erreur+= "Option non selectionnee \n";
			}
			if (erreur != "") {
				// alert(erreur);
				$("#danger").removeClass("hidden");				
				erreur = "";
			}
			else{
				$("#success").removeClass("hidden");
			}
		});





		// A chaque sélection de fichier
		$('#theForm').find('input[name="image"]').on('change', function (e) {
			var files = $(this)[0].files;
	 
			if (files.length > 0) {
				// On part du principe qu'il n'y a qu'un seul fichier
				// étant donné que l'on a pas renseigné l'attribut "multiple"
				var file = files[0],
					$image_preview = $('#image_preview');
	 
				// Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
				$image_preview.find('.thumbnail').removeClass('hidden');
				$image_preview.find('img').attr('src', window.URL.createObjectURL(file));
				$image_preview.find('h4').html(file.name);
				$image_preview.find('.caption p:first').html(file.size +' bytes');
			}
		});
	 
		// Bouton "Annuler" pour vider le champ d'upload
		$('#image_preview').find('button[type="button"]').on('click', function (e) {
			e.preventDefault();
	 
			$('#theForm').find('input[name="image"]').val('');
			$('#image_preview').find('.thumbnail').addClass('hidden');
		});
	});