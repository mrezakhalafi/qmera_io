function checkVisible() {

	if (localStorage.geolocSts == 1) {
		if (localStorage.country_code == 'ID') {
			$("#lang-li").css("display", "block");
			$("#id-office").css("display", "block");
			$("#gb-office").css("display", "block");
		} else if (localStorage.country_code != 'ID') {
			$("#lang-li").css("display", "none");
			$("#id-office").css("display", "none");
			$("#gb-office").css("display", "block");
		}
	} else if (localStorage.geolocSts == 0) {
		if (localStorage.country_code == 'ID') {
			$("#lang-li").css("display", "none");
			$("#id-office").css("display", "block");
			$("#gb-office").css("display", "none");
		} else if (localStorage.country_code != 'ID') {
			$("#lang-li").css("display", "none");
			$("#id-office").css("display", "none");
			$("#gb-office").css("display", "block");
		}
	}
	// // console.log('checkVisible');
}

function geoLoc() {

	$.ajax({
		url: 'https://api.ipgeolocation.io/ipgeo?apiKey=cacef90bd1af48e5a4e0a97e91439f51',
		type: 'GET',
		success: function (response) {
			// console.log('checking loc');
			localStorage.prevCountry = localStorage.country_code;
			localStorage.lastCheck = Math.floor(Date.now() / 1000); // epoch second

			if (localStorage.prevCountry != response.country_code2 || localStorage.prevCountry == null || typeof localStorage.prevCountry === 'undefined') {
				localStorage.country_code = response.country_code2;
				if (response.country_code2 == 'ID') {
					localStorage.lang_visible = 1;
					localStorage.lang = 1;
					// checkVisible();
				} else {
					localStorage.lang = 0;
					localStorage.lang_visible = 0;
					// checkVisible();
				}
			}
		},
		error: function (error) {
			localStorage.removeItem('lastCheck'); // remove variable so geoloc gets called next refresh
			localStorage.lang = 0;
			localStorage.lang_visible = 0;
			// checkVisible();
			localStorage.country_code = 'EN';
		}
	});
}

var inactivityTime = function () {
	console.log('timer start');
	var time;
	window.onload = resetTimer;
	// DOM Events
	document.onload = resetTimer;
	document.onmousemove = resetTimer;
	document.onmousedown = resetTimer; // touchscreen presses
	document.ontouchstart = resetTimer;
	document.onclick = resetTimer; // touchpad clicks
	document.onkeydown = resetTimer; // onkeypress is deprectaed
	document.addEventListener('scroll', resetTimer, true); // improved; see comments

	function logout() {
		alert("You are now logged out.");
		$('#logoutButton').click();
	}

	function resetTimer() {
		clearTimeout(time);
		time = setTimeout(logout, 300000); // 5 minutes timeout
		// 1000 milliseconds = 1 second
	}
};