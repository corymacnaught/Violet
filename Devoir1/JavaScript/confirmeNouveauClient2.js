$(function() {
	
	$.validator.addMethod('nomValid', function(value, element) {
		var regex = /^^([a-zA-Z]+)$/
		return regex.test(value);
	}, '\non-valide.')
	
	$.validator.addMethod('telephoneValid', function(value, element) {
		var regex = /^(\D*([2-9]\d{2})(\D*)([2-9]\d{2})(\D*)(\d{4})\D*)/;
		return regex.test(value);
	}, '\'non-valide.')
	
	$("#nouveauClient").validate({
		rules: {
			prenom: {
				required: true,
				nomValid: true
			},
			
			nom: {
				required: true,
				nomValid: true
			},
			
			dateDeNaissance: {
				required: true,
				date: true
			},
			
			adresse: {
				required: true
			},
			
			telephone: {
				required: true,
				telephoneValid: true
			}
		},
		
		messages: {
			prenom:{
				required: '<h6>Un prenom est requis.</h6>',
				nomValid: '<h6>s\'il vous plais, entrez un prenom valide.</h6>'
			},
			
			nom:{
				required: '<h6>Un nom est requis.</h6>',
				nomValid: '<h6>s\'il vous plais, entrez un nom valide.</h6>'
			},
			
			dateDeNaissance:{
				required: '<h6>Une date de naissance est requis.</h6>',
				date: '<h6>s\'il vous plais, entrez une date de naissance valide.</h6>'
			},
			
			adresse:{
				required: '<h6>Un adresse est requis.</h6>'
			},
			
			telephone:{
				required: '<h6>Un numéro de téléphone est requis.</h6>',
				telephoneValid: '<h6>s\'il vous plais, entrez un numéro de téléphone valide.</h6>'
			}
		}
	});
});