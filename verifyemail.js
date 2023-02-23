function resend_verification() {

    // 1. Create a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    // 2. Configure it: GET-request for the URL /article/.../load
    xhr.open('GET', 'logic/resend_verification.php');

    // 3. Send the request over the network
    xhr.send();

    // 4. This will be called after the response is received
    xhr.onload = async function () {

        //Request error
        if (xhr.status != 200) { // analyze HTTP status of the response

            alert(`Error ${xhr.status}: ${xhr.statusText}`); // e.g. 404: Not Found

        } else { // request success

            // alert(`Done, got ${xhr.response.length} bytes`); // response is the server response
            alert('Email has been sent successfully!')

        }

    };

}