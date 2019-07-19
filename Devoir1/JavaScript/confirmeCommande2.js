$(function() {
	
	$.validator.addMethod('nomValid', function(value, element) {
		var regex = /^^([a-zA-Z]+)$/
		return regex.test(value);
	}, '\non-valide.')
	
	$.validator.addMethod('identificationValid', function(value, element) {
		var regex = /^^([0-9]+)$/
		return regex.test(value);
	}, '\non-valide.')
	
	$("#commande").validate({
		rules: {
			identification: {
				required: true,
				identificationValid: true
			},
			
			prenom: {
				required: true,
				nomValid: true
			},
			
			nom: {
				required: true,
				nomValid: true
			},
			
			vin: {
				required: true
			}
		},
		
		messages: {
			identification:{
				required: '<h6>Un identite est requis.</h6>',
				identificationValid: '<h6>S\'il vous plais, entrez un identite valide.</h6>'
			},
			
			prenom:{
				required: '<h6>Un prenom est requis.</h6>',
				nomValid: '<h6>s\'il vous plais, entrez un prenom valide.</h6>'
			},
			
			nom:{
				required: '<h6>Un nom est requis.</h6>',
				nomValid: '<h6>s\'il vous plais, entrez un nom valide.</h6>'
			},
			
			vin:{
				required: '<h6>Un description du vin est requis.</h6>',
			}
		}
	});
});