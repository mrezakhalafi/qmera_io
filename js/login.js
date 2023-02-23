function login() {

    var elements = document.getElementById("login-form");

    //Login-form input values
    let formData = new FormData();
    for (var i = 0; i < elements.length; i++) {
        formData.append(elements[i].name, elements[i].value);
    }

    // 1. Create a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    // 2. Configure it: GET-request for the URL /article/.../load
    xhr.open('POST', 'checkEmail');

    // 3. Send the request over the network
    xhr.send(formData);

    // 4. This will be called after the response is received
    xhr.onload = async function () {

        //Request error
        if (xhr.status != 200) { // analyze HTTP status of the response

            alert(`Error ${xhr.status}: ${xhr.statusText}`); // e.g. 404: Not Found

            //Request success
        } else { // show the result
            // alert(`Done, got ${xhr.response.length} bytes`); // response is the server response
            let response = JSON.parse(xhr.response).response;

            if (response == "You already logged in with another account!") {
                alert(response);
                window.location.href = "dashboardv2/index.php";
            } else if (response == "ok") {
                window.location.replace('dashboardv2/index.php');
            } else if (response == "Please Validate Your Email!") {
                window.location.replace('verifyemail.php');
            } else if (response == "Please Finish Your Payment!") {
                window.location.replace('paycheckout.php');
            } else if (response == "Trial!") {
                window.location.replace('trialcheckout.php');
            } else if (response == "expired") {
                alert('Your account has expired. Please subscribe if you would like to continue.');
                window.location.href = 'dashboardv2/index.php';
            } else if (response == "Your Password is Incorrect!") {
                alert('Your Password is Incorrect!');
            } else {
                alert('Invalid User or Password');
            }

        }

    };

}