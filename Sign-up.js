function redirect(url) {
    window.location.replace(url);
}

function validate_email(email) {

    // 1. Create a new XMLHttpRequest object
    if (email.trim().length > 0) {
        let xhr = new XMLHttpRequest();

        // 2. Configure it: GET-request for the URL /article/.../load
        xhr.open('POST', 'logic/validate_email');

        // 3. Send the request over the network
        let formData = new FormData();
        formData.append("email-address", email);
        xhr.send(formData);

        // 4. This will be called after the response is received
        xhr.onload = async function () {

            //Request error
            if (xhr.status != 200) { // analyze HTTP status of the response

                alert(`Error ${xhr.status}: ${xhr.statusText}`); // e.g. 404: Not Found

            } else { // request success

                // alert(`Done, got ${xhr.response.length} bytes`); // response is the server response
                let response = xhr.response;
                response = response.trim();

                if (response == 'exist'){

                    alert('Your email has already been registered, please use a different email address!');
                    document.getElementById('email-6974').value = '';

                }

            }

        };
    }

}

function signup() {

    // $('#creditModalCenter').modal('show');

    var elements = document.getElementById("signup-form");

    //Login-form input values
    let formData = new FormData();
    for (var i = 0; i < elements.length; i++) {
        formData.append(elements[i].name, elements[i].value);
    }

    // 1. Create a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    // 2. Configure it: GET-request for the URL /article/.../load

    xhr.onload = async function () {

        //Request error
        if (xhr.status != 200) { // analyze HTTP status of the response

            alert(`Error ${xhr.status}: ${xhr.statusText}`); // e.g. 404: Not Found

        } else { // request success
            // $('#creditModalCenter').modal('hide');
            redirect('verifyemail.php');

        }

    };

    xhr.open('POST', 'logic/sign_up');

    // 3. Send the request over the network
    xhr.send(formData);
    
    // 4. This will be called after the response is received
    
}