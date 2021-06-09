var url = new URL(window.location.href);
var id_user = url.searchParams.get("id_user");


function chatPreviewBuilder(data){
    $('#chat-preview').html('');

    if (data.chat && data.chat.length) {
        data.chat.map(chat => {

            if(window.getComputedStyle(document.getElementById('chat-check'), null).display === 'block'){
                $('#chat-preview').append(`
                <a href="#" class="chat-preview-select" data-iduser="${chat.user.id}">
                    <img src="https://ui-avatars.com/api/?background=random&name=${chat.user.nick_name}&bold=true&font-size=0.33&color=ffffff" style="width:40px !important;margin-right: 15px;"
                        class="preload-img img-fluid rounded-circle">

                    <span>${chat.user.nick_name}</span>
                    <strong>${chat.last_text}</strong>
                    <span class="badge bg-dark-light mt-2">${moment(chat.last_created).format('h:mm a')}</span>
                    <span class="badge rounded-pill bg-fade-highlight-light color-highlight">06</span>
                </a>
            `);
            }
            else
            {
                $('#chat-preview').append(`
                <a href="chat/show?id_user=${chat.user.id}" class="">
                    <img src="https://ui-avatars.com/api/?background=random&name=${chat.user.nick_name}&bold=true&font-size=0.33&color=ffffff" style="width:40px !important;margin-right: 15px;"
                        class="preload-img img-fluid rounded-circle">

                    <span>${chat.user.nick_name}</span>
                    <strong>${chat.last_text}</strong>
                    <span class="badge bg-dark-light mt-2">${moment(chat.last_created).format('h:mm a')}</span>
                    <span class="badge rounded-pill bg-fade-highlight-light color-highlight">06</span>
                </a>
            `);
            }
            

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
        $('.chat-send').show();
        
        data.chat.map(chat => {

            if(chat.id_user_other === id_user || `${chat.id_user_other}` === id_user)
            {
                
                    $('#chat-content').append(
                        `<div class="speech-bubble speech-left bg-highlight pb-1" style="max-width:90% !important">
                            ${chat.text}
                            <br>
                            <small style="font-size: 9px;float: right;">${moment(chat.created_at).format('h:mm a')}</small>
                        </div>
                        <div class="clearfix"></div>`
                    );
               
            }
            else{
                $('#chat-content').append(
                    `<div class="speech-bubble speech-right color-black pb-1" style="max-width:90% !important">
                        ${chat.text}
                        <br>
                        <small style="font-size: 9px;float: right;">${moment(chat.created_at).format('h:mm a')}</small>
                    </div>
                    <div class="clearfix"></div>`
                );
            }
            
        });
    }
    else{

        $('.chat-send').show();
        
        $('#chat-content').html(`
        <table id="chat-empty" class="w-100" style="height:75vh;border:none">
            <tr>
                <td class="align-middle text-center">
                    <strong>No message between you and ${data.other_user.nick_name} yet.</strong>
                </td>
            </tr>
        </table>
        `);
       
    }

}

function outputMessage(message){

    if(message.data)
    {
        if(message.data.id_user === $('#id_user').val()){
            $('#chat-content').append(
                `<div class="speech-bubble speech-left bg-highlight pb-1" style="max-width:90% !important">
                    ${message.data.text}
                    <br>
                    <small style="font-size: 9px;float: right;">${moment(message.data.created_at).format('h:mm a')}</small>
                </div>
                <div class="clearfix"></div>`
            );
        }
        else{
            $('#chat-content').append(
                `<div class="speech-bubble speech-right color-black pb-1" style="max-width:90% !important">
                    ${message.data.text}
                    <br>
                    <small style="font-size: 9px;float: right;">${moment(message.data.created_at).format('h:mm a')}</small>
                </div>
                <div class="clearfix"></div>`
            );
        }
    }
    
}

function fetchChatContent(socket){
    var networkDataReceived = false;

        if(id_user){
            // fetch fresh chat content
            var networkUpdate = fetch(`/fetch/chatcontent/${id_user}`)
            .then(function(response) { 
                return response.json();
            }).then(function(data){

                networkDataReceived = true;
                
                $('#chat-show-name').prepend(data.other_user ? (data.other_user.nick_name ? data.other_user.nick_name : data.other_user.name) : 'Unknown');
                $('#id_user').val(data.user.id);
                $('#id_user_other').val(data.other_user.id);

                //Join chat room between logged user and other user
                socket.emit('myroom', data.user.id , data.other_user.id);

                //Save user online to socket 
                socket.emit('userOnline',{userId: $('meta[name="id_user"]').attr('content')});

                //Check if other user is online or offline

                function checkOtherUser(){
                    setTimeout(function() {
                        socket.emit('userOtherOnline',{userId: data.other_user.id});
                        checkOtherUser();
                    }, 3000);
                }

                checkOtherUser()

                socket.on('userOtherOnline', (userId) => {
                    console.log($('#id_user_other').val() , userId)
                    if( ''+$('#id_user_other').val()+'' === ''+userId+''){
                        $('#chat-show-status').html(' <i class="fas fa-xs fa-circle" style="color:#37bc9b"></i>');
                    }
                    else
                    {
                        $('#chat-show-status').html(' <i class="fas fa-xs fa-circle" style="color:lightgray"></i>');
                    }
                });

                
                chatContentBuilder(data);

            })
            .catch(function(err) {
                console.log('Error Chat Content: ' + err);
            });


            // fetch cached chat content
            caches.match(`/fetch/chatcontent/${id_user}`)
            .then(function(response) {
                if (!response) throw Error("No data");
                return response.json();
            }).then(function(data) {
                // don't overwrite newer network data
                if (!networkDataReceived) {

                    $('#chat-show-name').html(data.other_user ? (data.other_user.nick_name ? data.other_user.nick_name : data.other_user.name) : 'Unknown');
                    $('#id_user').val(data.user.id);
                    $('#id_user_other').val(data.other_user.id);

                    chatContentBuilder(data);

                }
            }).catch(function() {
                // we didn't get cached data, the network is our last hope:
                return networkUpdate;
            }).catch(function(err) {
                console.log('Error Chat Content: ' + err);
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
}



// setTimeout(function() {
   

    async function socketInitialize() {
         var socket = io("http://localhost:3000/");
        // var socket = await io("https://socket.zulzayn.com/");
      
        return socket;
      }
      
    socketInitialize()
      .then(socket => {

        ///////////////////////////////////////////////////////////////////////
        //Socket IO for send chat
        if (document.querySelector('#chat-form')) {

            $('#back-button').on('click' , () => {
                socket.disconnect();
            });

            const chatForm = $('#chat-form');
            const chatContent = document.querySelector('#chat-content');

            // Message from server
            socket.on('message', (message) => {

                $('#chat-empty').remove();

                outputMessage(message);

                // Scroll down
                chatContent.scrollTop = chatContent.scrollHeight;
            });

            //Message Submit
            chatForm.on('submit' , (e) => {
                e.preventDefault();

                // Get message text
                const msg = e.target.elements.msg.value;
                const id_user = e.target.elements.id_user.value;
                const id_user_other = e.target.elements.id_user_other.value;
                // Emit message to server
                socket.emit('chatMessage' , msg , id_user_other, id_user);

                // Clear input
                e.target.elements.msg.value = '';
                e.target.elements.msg.focus();
            });
        }
        

        ///////////////////////////////////////////////////////////////////////
        //fetch data for chat content
        if (document.querySelector('#chat-content')) {
            
            fetchChatContent(socket);

        };
        ///////////////////////////////////////////////////////////////////////

        ///////////////////////////////////////////////////////////////////////
        //fetch data for chat preview
        if (document.querySelector('#chat-preview')) {

            var networkDataReceived = false;

                
                // fetch fresh chat preview
                var networkUpdate = fetch(`/fetch/chatpreview`)
                .then(function(response) { 
                    return response.json();
                }).then(function(data){

                    networkDataReceived = true;
                    
                    chatPreviewBuilder(data);

                })
                .then(function(){
            
                        $('.chat-preview-select').on('click' , function(e){
                            id_user = $(this).data('iduser');
                    
                            fetchChatContent(socket);
                        });
                
                })
                .catch(function(err) {
                    console.log('Error Chat Preview: ' + err);
                });


                // fetch cached chat preview
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

        };
        ///////////////////////////////////////////////////////////////////////


       })
      .catch(e => {
        console.log('There has been a problem with your fetch operation: ' + e.message);
      });

    
    
    

// }, 250);
