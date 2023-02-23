function forgot() {

    var elements = document.getElementById("forgot-form");

    //Login-form input values
    let formData = new FormData();
    for (var i = 0; i < elements.length; i++) {
        formData.append(elements[i].name, elements[i].value);
    }

    // 1. Create a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    // 2. Configure it: GET-request for the URL /article/.../load
    xhr.open('POST', 'logic/forgot.php');

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
            let response = xhr.response;
            if(response == 'not_exist'){
                alert("Your mail account is not yet registered!");
            } else {
                alert(response);
            }
        }

    };

}