
function chatPreviewBuilder(data){
    $('#chat-preview').html('');

    if (data.chat && data.chat.length) {
        data.chat.map(chat => {

            $('#chat-preview').html(
                `<a href="#">
                    <img src="images/pictures/1s.jpg" style="width:40px !important;margin-right: 15px;"
                        class="preload-img img-fluid rounded-circle">

                    <span>Kamil</span>
                    <strong>A powerful Mobile Template</strong>
                    <span class="badge bg-dark-light mt-2">12:15 PM</span>
                    <span class="badge rounded-pill bg-fade-highlight-light color-highlight">06</span>
                </a>
                <a href="#">

                    <img src="images/pictures/2s.jpg" style="width:40px !important;margin-right: 15px;"
                        class="preload-img img-fluid rounded-circle">

                    <span>Sara</span>
                    <strong>A powerful Mobile Template</strong>
                    <span class="badge bg-dark-light mt-2">12:15 PM</span>
                    <span class="badge rounded-pill bg-fade-highlight-light color-highlight">06</span>
                </a>
                <a href="#">

                    <img src="images/pictures/3s.jpg" style="width:40px !important;margin-right: 15px;"
                        class="preload-img img-fluid rounded-circle">

                    <span>Fuad</span>
                    <strong>A powerful Mobile Template</strong>
                    <span class="badge bg-dark-light mt-2">12:15 PM</span>
                    
                </a>
                <a href="#">

                    <img src="images/pictures/4s.jpg" style="width:40px !important;margin-right: 15px;"
                        class="preload-img img-fluid rounded-circle">

                    <span>Nabila</span>
                    <strong>A powerful Mobile Template</strong>
                    <span class="badge bg-dark-light mt-2">12:15 PM</span>
                    <span class="badge rounded-pill bg-fade-highlight-light color-highlight">06</span>
                </a>
                <a href="#">

                    <img src="images/pictures/5s.jpg" style="width:40px !important;margin-right: 15px;"
                        class="preload-img img-fluid rounded-circle">

                    <span>Intan</span>
                    <strong>A powerful Mobile Template</strong>
                    <span class="badge bg-dark-light mt-2">12:15 PM</span>
                
                </a>
                <a href="#" style="border-bottom: none;">

                    <img src="images/pictures/6s.jpg" style="width:40px !important;margin-right: 15px;"
                        class="preload-img img-fluid rounded-circle">

                    <span>Hafiz</span>
                    <strong>A powerful Mobile Template</strong>
                    <span class="badge bg-dark-light mt-2">12:15 PM</span>
                    
                </a>`);

        });
    }
    else{
        $('#chat-preview').html(`
            <table class="w-100" style="height:80vh;border:none;background-color: transparent!important;">
                <tr>
                    <td class="align-middle text-center" style="background-color: transparent!important">
                        <i class="fas fa-comments fa-7x mb-5"></i>
                        <br>
                        <strong>Add contact or select any contact to start chat.</strong>
                    </td>
                </tr>
            </table>
        `);
    }
}

function chatContentBuilder(data){

    $('#chat-content').html('');

    if (data.chat && data.chat.length) {
        data.chat.map(chat => {

            $('.chat-send').show();

            $('#chat-content').html(
                `<div class="speech-bubble speech-right color-black">
                These are chat bubbles, right? They look awesome don't they?
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-left bg-highlight">
                Yeap!
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-left bg-highlight">
                They also expand to a certain point, just like the ones that Mobile Chat apps have!
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-right color-black">
                Awesome! Images too?
                </div>
                <div class="clearfix"></div>
                <p class="text-center mb-0 font-11">Yesterday, 1:45 AM</p>
                <div class="speech-bubble speach-image speech-left bg-highlight">
                <img class="img-fluid preload-img" src="../images/pictures/5s.jpg" data-src="../images/pictures/5s.jpg" alt="img">
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-left bg-highlight">
                Images can be used here as well, very easy! Just add an image tag!
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-right color-black">
                WOW! Videos?!
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-right color-black">
                Can I Embed videos or wait, actually, can I add maps?
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speach-image speech-left">
                <iframe class="w-100" src='https://www.youtube.com/watch?v=mnwj6KxAvFc' frameborder='0' allowfullscreen=""></iframe>
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-left bg-highlight">
                Yep! Just embed your stuff here. It's super simple. You just copy the embed code in this place.
                </div>
                <div class="clearfix"></div>
                <p class="text-center mb-0 font-11">25 Minutes Ago</p>
                <div class="speech-bubble speech-right color-black">
                Is this an actual chat system? Can i send messages already?
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-last speech-left bg-highlight">
                It's just a chat template, but it's ready and able to be coded into a full chat system. Great huh?
                </div>
                <div class="clearfix"></div>
                <em class="speech-read mb-3">Delivered & Read - 07:18 PM</em>`
            );

        });
    }
    else{

        $('.chat-send').show();

        $('#chat-content').html(`
        <table class="w-100" style="height:75vh;border:none">
            <tr>
                <td class="align-middle text-center">
                    <strong>No message between you and ${data.other_user.nick_name} yet.</strong>
                </td>
            </tr>
        </table>
        
        `);
       
    }

}

setTimeout(function() {

    ///////////////////////////////////////////////////////////////////////
    //fetch data for chat content
    if (document.querySelector('#chat-content')) {
        var networkDataReceived = false;

        var url = new URL(window.location.href);
        var id_user = url.searchParams.get("id_user");

        if(id_user){
            // fetch fresh chat content
            var networkUpdate = fetch(`/fetch/chatcontent/${id_user}`)
            .then(function(response) { 
                return response.json();
            }).then(function(data){

                networkDataReceived = true;
                
                $('#chat-show-name').html(data.other_user ? (data.other_user.nick_name ? data.other_user.nick_name : data.other_user.name) : 'Unknown');
                
                chatContentBuilder(data);

            })
            .catch(function(err) {
                console.log('Error Chat: ' + err);
            });


            // fetch cached chat
            caches.match(`/fetch/chatcontent/${id_user}`)
            .then(function(response) {
                if (!response) throw Error("No data");
                return response.json();
            }).then(function(data) {
                // don't overwrite newer network data
                if (!networkDataReceived) {

                    $('#chat-show-name').html(data.other_user ? (data.other_user.nick_name ? data.other_user.nick_name : data.other_user.name) : 'Unknown');
                
                    chatContentBuilder(data);

                }
            }).catch(function() {
                // we didn't get cached data, the network is our last hope:
                return networkUpdate;
            }).catch(function(err) {
                console.log('Error Chat: ' + err);
            });
        }
        else{

            $('.chat-send').hide();

            $('#chat-content').html('');

            $('#chat-content').html(`
            <table class="w-100" style="height:75vh;border:none">
                <tr>
                    <td class="align-middle text-center">
                        <strong>Welcome, start texting with your contact right away on the left bar.</strong>
                    </td>
                </tr>
            </table>
            
            `);
        }

    };
    ///////////////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////////////////////////
    //fetch data for chat preview
    if (document.querySelector('#chat-preview')) {

        var networkDataReceived = false;

        if(id_user){
            // fetch fresh chat preview
            var networkUpdate = fetch(`/fetch/chatpreview`)
            .then(function(response) { 
                return response.json();
            }).then(function(data){

                networkDataReceived = true;
                
               
                
                chatPreviewBuilder(data);

            })
            .catch(function(err) {
                console.log('Error Chat Preview: ' + err);
            });


            // fetch cached chat
            caches.match(`/fetch/chatpreview`)
            .then(function(response) {
                if (!response) throw Error("No data");
                return response.json();
            }).then(function(data) {
                // don't overwrite newer network data
                if (!networkDataReceived) {

                   
                
                    chatPreviewBuilder(data);

                }
            }).catch(function() {
                // we didn't get cached data, the network is our last hope:
                return networkUpdate;
            }).catch(function(err) {
                console.log('Error Chat Preview: ' + err);
            });
        }
        else{

            $('#chat-preview').html('');

            $('#chat-preview').html(`
            <table class="w-100" style="height:80vh;border:none;background-color: transparent!important;">
                <tr>
                    <td class="align-middle text-center" style="background-color: transparent!important">
                        <i class="fas fa-feather-alt fa-7x mb-5 color-highlight"></i>
                        <br>
                        <strong>Add contact or select any contact to start chat.</strong>
                    </td>
                </tr>
            </table>
            
            `);
        }

    };
    ///////////////////////////////////////////////////////////////////////

}, 250);
