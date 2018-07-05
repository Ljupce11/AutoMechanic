
function register() {
	var fname = $('#fname').val(),
		lname = $('#lname').val(),
		pw = $('#pw').val(),
		embg = $('#embg').val(),
		position = $('#position').val();

		if (fname == '' || lname == '' || pw == '' || embg == '' || position == '') {
			$('#status').html('Fill out all the fields.');
		}
		else {
			$.ajax({
				url: '/Projects/Avtoservis/other/register.php',
				type: 'POST',
				data: $('#register-form').serialize(),
				beforeSend: function(){
					$('#status').html('Please wait...');
				}
			})
			.done(function(data) {
				$('form').trigger('reset');
				$('#status').html(data);
			})
			.fail(function() {
				console.log("error");
			})		
		}


};


function login() {
	var name = $('#name').val(),
		pw = $('#pw').val();

		if (name == '' || pw == '') {
			$('#status').html('Fill out all the fields.');
		}
		else {
			$.ajax({
				url: '/Projects/Avtoservis/other/login.php',
				type: 'POST',
				data: $('#login-form').serialize(),
				beforeSend: function(){
					$('#status').html('Please wait...');
				}
			})
			.done(function(data) {
				$('form').trigger('reset');
				window.location.replace('http://localhost/Projects/Avtoservis/index.php');
			})
			.fail(function() {
				console.log("error");
			})		
		}

};

function sopstvenik(){
	var fname = $('#fname').val(),
		lname = $('#lname').val(),
		embg = $('#embg').val(),
		contact = $('#contact').val();

	if (fname == '' || lname == '' || embg == '' || contact == '') {
		$('#status').html('Сите места не се пополнети!');
	}
	else {
		$.ajax({
			url: '/Projects/Avtoservis/other/sopstvenik.php',
			type: 'POST',
			data: $('#sopstvenik').serialize(),
			beforeSend: function(){
				$('#status').html('Please wait...');
			}
		})
		.done(function(data) {
			if (data != 'Fail') {
				$('.fade-div').fadeOut(500, function() {
				var element = $(data).hide();
				$(this).replaceWith(element);
				$('.fade-div').fadeIn(500);
				});
			}
			else {
				$('#status').html('Потребна е најава за да се продолжи!');
			}

		})
		.fail(function() {
			console.log("error");
		})
		
	}
}

function vozilo(){
		var marka = $('#marka').val(),
		god = $('#god').val(),
		km = $('#km').val(),
		boja = $('#boja').val(),
		pogon = $('#pogon').val(),
		sasija = $('#sasija').val();

	if (marka == '' || god == '' || km == '' || boja == '' || pogon == '' || sasija == '') {
		$('#status').html('Сите места не се пополнети!');
	}
	else {
		$.ajax({
			url: '/Projects/Avtoservis/other/vozilo.php',
			type: 'POST',
			data: $('#vozilo').serialize(),
			beforeSend: function(){
				$('#status').html('Please wait...');
			}
		})
		.done(function(data) {
			$('.fade-div').fadeOut(500, function() {
				var element = $(data).hide();
				$(this).replaceWith(element);
				$('.fade-div').fadeIn(500);
			});
		})
		.fail(function() {
			console.log("error");
		})
		
	}
}

function del(){
	var name = $('#marka').val(),
		model = $('#god').val(),
		price = $('#km').val(),
		naracka = $('#boja').val();

	if (name == '' || model == '' || price == '' || naracka == '') {
		$('#status').html('Сите места не се пополнети!');
	}
	else {
		$.ajax({
			url: '/Projects/Avtoservis/other/del.php',
			type: 'POST',
			data: $('#del').serialize(),
			beforeSend: function(){
				$('#status').html('Please wait...');
			}
		})
		.done(function(data) {
			$('.fade-div').fadeOut(500, function() {
				var element = $(data).hide();
				$(this).replaceWith(element);
				$('.fade-div').fadeIn(500);
			});
		})
		.fail(function() {
			console.log("error");
		})
		
	}
}

function pop(){
	var opis = $('#opis').val(),
		cena = $('#cena').val();

	if (opis == '' || cena == '') {
		$('#status').html('Сите места не се пополнети!');
	}
	else {
		$.ajax({
			url: '/Projects/Avtoservis/other/popravka_baza.php',
			type: 'POST',
			data: $('#pop').serialize(),
			beforeSend: function(){
				$('#status').html('Please wait...');
			}
		})
		.done(function(data) {
			$('.fade-div').fadeOut(500, function() {
				var element = $(data).hide();
				$(this).replaceWith(element);
				$('.fade-div').fadeIn(500);
			});
		})
		.fail(function() {
			console.log("error");
		})
		
	}
}

function servis(){
	$.ajax({
		url: '/Projects/Avtoservis/other/servis.php',
		type: 'POST',
		data: $('#servis').serialize(),
		beforeSend: function(){
			$('#status').html('Please wait...');
		}
	})
	.done(function(data) {
		if (data == 'success') {
			window.location.replace('http://localhost/Projects/Avtoservis');
		}
		else {
			alert(data);
		}
	})
	.fail(function() {
		console.log("error");
	})
}

function naracka(id){
	$.ajax({
		url: '/Projects/Avtoservis/other/naracka.php',
		type: 'POST',
		data: $('#naracka-'+ id +'').serialize(),
		beforeSend: function(){
			console.log('Please wait...');
		}
	})
	.done(function(data) {
		if (data == 'Нарачката е успешно воспоставена.') {
			alert(data);
			window.location.replace('http://localhost/Projects/Avtoservis/other/naracaj.php');
		}
		else {
			alert(data);
		}
	})
	.fail(function() {
		console.log("error");
	})
}

function prikazi(){

	$.ajax({
		url: '/Projects/Avtoservis/other/prikazi.php',
		type: 'POST',
		data: $('#delovi').serialize(),
		beforeSend: function(){
			console.log('Please wait...');
		}
	})
	.done(function(data) {
		alert(data);
	})
	.fail(function() {
		console.log("error");
	})
}

function zavrsi(id){
	$.ajax({
		url: '/Projects/Avtoservis/other/zavrsi.php',
		type: 'POST',
		data: $('#zavrsi-'+ id +'').serialize(),
		beforeSend: function(){
			console.log('Please wait...');
		}
	})
	.done(function(data) {
		if (data == 'Поправката е успешно завршена.') {
			alert(data);
			window.location.replace('http://localhost/Projects/Avtoservis/');
		}
		else {
			alert(data);
		}
	})
	.fail(function() {
		console.log("error");
	})
}

