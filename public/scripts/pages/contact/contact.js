function updateContactList(data){
    var results = data

    if (results.length) {
        $('#contact-list').html('');
        results.map(contact => {

            $('#contact-list').append(`
                <a href="chat/show?id_user=${contact.id}">
                    <img src="https://ui-avatars.com/api/?background=random&name=${contact.nick_name}&bold=true&font-size=0.33&color=ffffff" style="width:40px !important;margin-right: 15px;"
                        class="preload-img img-fluid rounded-circle">

                    <span>${contact.nick_name}</span>
                    <strong>${contact.phone_number}</strong>
                </a>
            `)
        })

    }
    else{
        $('#contact-list').html('');

        $('#contact-list').append(`
            <p class="text-center"><br>Your recent list is currently empty. Chat with your team and you will find all your recent meetings here.<br><br></p>
        `);
    }
}

// setTimeout(function() {

    ///////////////////////////////////////////////////////////////////////
    //fetch data for meeting log
    if (document.querySelector('#contact-list')) {
        var networkDataReceived = false;

        // fetch fresh meeting log
        var networkUpdate = fetch('/fetch/contactList')
        .then(function(response) { 
            return response.json();
        }).then(function(data){
            
            networkDataReceived = true;
            
            updateContactList(data);

        })
        .catch(function(err) {
            console.log('Error Meeting Log: ' + err);
        });

        // fetch cached chat
        caches.match(`/fetch/contactList`)
        .then(function(response) {
            if (!response) throw Error("No data");
            return response.json();
        }).then(function(data) {
            // don't overwrite newer network data
            if (!networkDataReceived) {

                updateContactList(data);

            }
        }).catch(function() {
            // we didn't get cached data, the network is our last hope:
            return networkUpdate;
        }).catch(function(err) {
            console.log('Error Chat: ' + err);
        });
    };
    ///////////////////////////////////////////////////////////////////////


// }, 250);