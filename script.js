//SEND DATA LOGIN FORM
$('#submit').click(function () {
	$.post(
		'logincheck.php',
		$("#sendform").serialize(),

		function (msg) {
			if (msg == 'Field Email or Password not correct') {
				console.log(msg);
				$('#my_messagelog').html(msg);

			} else {
				window.location.replace('indexMain.php');
			}
		}
	);
	return false;
});
//UPDATE DATA
//ADD and UPDATE NEW METHOD
$('#addbtn').click(function () {
	$.post(
		'create.php',
		$("#addupdateForm").serialize(),
		function (msg) {
			console.log(msg);;
			$('#showresult').html(msg);
		}
	);
	return false;
});
//TO CART
$('#addToCart').click(function () {
	$.post(
		'addtocart.php',
		$("#tocart").serialize(),
		function (msg) {
			console.log(msg);;
			$('#showresult').html(msg);
		}
	);
	return false;
});
//ADD DATA
//SEND DATA REGISTRATION FORM
$('#regform').submit(function () {
	$.post(
		'create.php',
		$("#regform").serialize(),

		function (msg) {
			if (msg == 'Field Login is empty') {
				console.log(msg);
				$('#my_messagereg').html(msg);

			}
			if (msg == 'Field Password is empty') {
				console.log(msg);
				$('#my_messagepass').html(msg);
			}
			if (msg == 'Field Confirm Password is empty') {
				console.log(msg);
				$('#my_messageconpass').html(msg);
			}
			if (msg == 'Field Email is empty') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == 'Field Name is empty') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == 'Password should be at least 6 characters long') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == 'Password should be have numbers') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == 'Password should be have letters') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == 'Login should be at least 6 characters long') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == 'Name should be at least 2 characters long and only contain letters') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == 'Name should be only containt letters') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == 'Email is already taken') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == 'Login is already taken') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			else {
				console.log(msg);
				$('#my_messagelog1').html(msg);
			}
		}
	);
	return false;
});

//HIDE AND SHOW TABLE IN ACCOUNT
$(document).ready(function () {
	$("#hideAndShow").click(function () {
		$("#tbl").toggle();
	});
});

//SHOW ADDUPDATE FORM
$(document).ready(function () {
	$("#addupbtn").click(function () {
		$.get(
			'addUser.php',
			function (msg) {
				console.log(msg);
				$('#showaddup').html(msg);
			}
		);
		return false;
	});
});
/*$(document).ready(function () {
	$("#addupbtn").click(function () {
		$.get(
			'addUser.php',
			function (msg) {
				console.log(msg);
				$('#showaddup').html(msg);
				//$('#showaddup').show('slow');
			}
		);
		return false;
	});
});*/
//
//HIDE AND SHOW ADDFORM IN ACCOUNT
/*$(document).ready(function () {
	$("#addformbtn").click(function () {
		$("#showAddForm").toggle();
	});
});*/
//BACK BTN TO ACCOUNT
$(document).ready(function () {
	$("#backbtn").click(function () {
		$.get(
			'account.php',
			function (msg) {
				console.log(msg);
				$('#showaddup').hide('slow');
				//window.location.replace('account.php');
			}
		);
		return false;
	});
});

//TRANSFER FROM LOG FORM IN REG FORM
$(document).ready(function () {
	$('#registrbtn').click(function () {
		$.get(
			$('#registerFormShow').load('registration.php', function () {
				$('#LogForm').hide('slow');
			}),
		);
		return false;
	});
	$('#loginbtn').click(function () {
		$.get(
			function (msg) {
				$('#registerFormShow').load('registration.php', function () {
					//	$('#registerFormShow').hide('slow');
				}).hide('slow'),
					$('#LogForm').html(msg);
			}
		);
		return false;
	});
});

$("#loginbtn").click(function () {
	$('#RegForm').hide('slow');
	$('#LogForm').show('slow');

});

//LOGOUT BUTTON
$('#logoutbtn').click(function () {
	$.post(
		'logout.php',
		//$("#sendform").serialize(),
		function (msg) {
			window.location.replace('index.php');
		}
	);
	return false;
});

//BACK BTN TO LOGIN FORM
$('#indexbtn').click(function () {
	$.get(
		'logout.php',
		//$("#sendform").serialize(),
		function (msg) {
			window.location.replace('index.php');
		}
	);
	return false;
});

//////////--TRANSFER FROM REG FORM IN LOGIN FORM--////////////
/*$('#loginbtn').click(function() {
	$.post(
		'login.php',

		function(msg) {
			console.log(msg);
			$('#RegForm').hide('slow');
			$('#loginFormShow').html(msg);
		}
	);
	return false;
});*/

/*$(document).ready(function () {
	$("#loginbtn").click(function () {
		$('#RegForm').hide('slow');
		$('#LogForm').show('slow');

	});
});*/

//$(document).ready(function () {
/*$("#registrbtn").click(function () {
	$('#LogForm').hide('slow');
	$("#registerFormShow").show('slow');

});
$("#loginbtn").click(function () {
	$('#RegForm').hide('slow');
	$('#LogForm').show('slow');

});*/
//});



//$('#registrbtn').load('registration.php', function () {
//});




