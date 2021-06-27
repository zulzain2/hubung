function chatPreviewBuilder(data){
    $('#chat-preview').html('');

    if (data.chat && data.chat.length) {
        data.chat.map(chat => {

            if(document.querySelector('#chat-check')){
                if(window.getComputedStyle(document.getElementById('chat-check'), null).display === 'block'){
                    $('#chat-preview').append(`
                    <a id="preview_${chat.user.id}" href="#" class="chat-preview-select" data-iduser="${chat.user.id}">
                        <img src="https://ui-avatars.com/api/?background=random&name=${chat.user.nick_name}&bold=true&font-size=0.33&color=ffffff" style="width:40px !important;margin-right: 15px;"
                            class="preload-img img-fluid rounded-circle">
    
                        <span>${chat.user.nick_name}</span>
                        <strong style="display: -webkit-inline-box;
                        -webkit-line-clamp: 1;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        width: 70%;">${chat.last_text}</strong>
                        <span class="badge bg-dark-light mt-2">${moment(chat.last_created).format('h:mm a')}</span>
                        <span class="unread_count badge rounded-pill bg-fade-highlight-light color-highlight">${chat.unread_count ? (chat.unread_count > 0 ? chat.unread_count : '') : ''}</span>
                    </a>
                `);
                }  
                else{
                    mobileChatPreview(chat)
                }
            }
            // else
            // {
            //     mobileChatPreview(chat)
            // }

            function mobileChatPreview(chat){
                $('#chat-preview').append(`
                <a id="preview_${chat.user.id}" href="chat/show?id_user=${chat.user.id}&id_user_other=${chat.user_other.id}" class="">
                    <img src="https://ui-avatars.com/api/?background=random&name=${chat.user.nick_name}&bold=true&font-size=0.33&color=ffffff" style="width:40px !important;margin-right: 15px;"
                        class="preload-img img-fluid rounded-circle">

                    <span>${chat.user.nick_name}</span>
                    <strong style="display: -webkit-inline-box;
                    -webkit-line-clamp: 1;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    width: 70%;">${chat.last_text}</strong>
                    <span class="badge bg-dark-light mt-2">${moment(chat.last_created).format('h:mm a')}</span>
                    <span class="unread_count badge rounded-pill bg-fade-highlight-light color-highlight">${chat.unread_count ? (chat.unread_count > 0 ? chat.unread_count : '') : ''}</span>
                </a>
            `);
            }
            

        });
    }
    else{
        $('#chat-preview').html(`
            <table id="empty-chat-preview" class="w-100" style="height:80vh;border:none;background-color: transparent!important;">
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

function chatSinglePreviewBuilder(data){

    $('#empty-chat-preview').remove();
    $(`#preview_${data.id_user}`).remove();

// console.log(data.unread_count_self , data.unread_count_other);
// console.log(data.id_user == $('meta[name="id_user"]').attr('content') ? (data.unread_count_other > 0 ? data.unread_count_other : '') : (data.unread_count_self > 0 ? data.unread_count_self : ''));
    
    if(document.querySelector('#chat-check')){
        if(window.getComputedStyle(document.getElementById('chat-check'), null).display === 'block'){
            $('#chat-preview').prepend(`
            <a id="preview_${data.id_user}" href="#" class="chat-preview-select" data-iduser="${data.id_user}">
                <img src="https://ui-avatars.com/api/?background=random&name=${data.user}&bold=true&font-size=0.33&color=ffffff" style="width:40px !important;margin-right: 15px;"
                    class="preload-img img-fluid rounded-circle">
    
                <span>${data.user}</span>
                <strong style="display: -webkit-inline-box;
                -webkit-line-clamp: 1;
                -webkit-box-orient: vertical;
                overflow: hidden;
                width: 70%;">${data.last_text}</strong>
                <span class="badge bg-dark-light mt-2">${data.last_created}</span>
                <span class="unread_count badge rounded-pill bg-fade-highlight-light color-highlight">${data.id_user == $('meta[name="id_user"]').attr('content') ? (data.unread_count_other > 0 ? data.unread_count_other : '') : (data.unread_count_self > 0 ? data.unread_count_self : '')}</span>
            </a>
        `);
        }
        else{
            mobileChatPreview(data)
        }
    }
    // else
    // {
    //     mobileChatPreview(data)
    // }

        function mobileChatPreview(data){
            $('#chat-preview').prepend(`
            <a id="preview_${data.id_user}" href="chat/show?id_user=${data.id_user}&id_user_other=${data.id_user_other}" class="">
                <img src="https://ui-avatars.com/api/?background=random&name=${data.user}&bold=true&font-size=0.33&color=ffffff" style="width:40px !important;margin-right: 15px;"
                    class="preload-img img-fluid rounded-circle">

                    <span>${data.user}</span>
                    <strong style="display: -webkit-inline-box;
                    -webkit-line-clamp: 1;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    width: 70%;">${data.last_text}</strong>
                    <span class="badge bg-dark-light mt-2">${data.last_created}</span>
                    <span class="unread_count badge rounded-pill bg-fade-highlight-light color-highlight">${data.id_user == $('meta[name="id_user"]').attr('content') ? (data.unread_count_other > 0 ? data.unread_count_other : '') : (data.unread_count_self > 0 ? data.unread_count_self : '')}</span>
            </a>
        `);
        }

    $(`#preview_${data.id_user}`).on('click' , function(e){
        var id_user = $(this).data('iduser');

        fetchChatContent(id_user);
    });

}

function chatContentBuilder(data , id_user){

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

function chatSingleContentBuilder(message){

    if(message.data)
    {
        if(message.data.id_user === $('#id_user').val() || `${message.data.id_user}` === $('#id_user').val()){
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

function checkOtherUser(id_other_user){
    if(document.querySelector('#chat-content')){
        setTimeout(function() {
            socket.emit('userOtherOnline',{userId: id_other_user});
            checkOtherUser(id_other_user);
        }, 3000);
    }  
}

function updateChatStatus(id_user){

    var id_user_other = id_user;
    var id_user = $('meta[name="id_user"]').attr('content');
   
    console.log('sdfsdfs' , id_user , id_user_other);
    //  fetch fresh chat content
     var networkUpdate = fetch(`/fetch/updatechatstatus/${id_user}/${id_user_other}`)
     .then(function(response) { 
         return response.json();
     }).then(function(data){
         networkDataReceived = true;

         $(`#preview_${id_user_other}`).find(".unread_count").html('');

     })
     .catch(function(err) {
         console.log('Error Chat Content: ' + err);
     });


    //  fetch cached chat content
    //  caches.match(`/fetch/updatechatstatus/${id_user}/${id_user_other}`)
    //  .then(function(response) {
    //      if (!response) throw Error("No data");
    //      return response.json();
    //  }).then(function(data) {
    //      // don't overwrite newer network data
    //      if (!networkDataReceived) {


    //      }
    //  }).catch(function() {
    //      // we didn't get cached data, the network is our last hope:
    //      return networkUpdate;
    //  }).catch(function(err) {
    //      console.log('Error Chat Content: ' + err);
    //  });
    

}

function fetchChatContent(id_user){
    var networkDataReceived = false;

        if(id_user){
            // fetch fresh chat content
            var networkUpdate = fetch(`/fetch/chatcontent/${id_user}`)
            .then(function(response) { 
                return response.json();
            }).then(function(data){

                networkDataReceived = true;
                
                $('#chat-show-name').html(data.other_user ? (data.other_user.nick_name ? data.other_user.nick_name : data.other_user.name) : 'Unknown');
                $('#id_user').val(data.user.id);
                $('#id_user_other').val(data.other_user.id);

                //Join chat room between logged user and other user
                socket.emit('myroom', data.user.id , data.other_user.id);

                //Save user online to socket 
                socket.emit('userOnline',{userId: $('meta[name="id_user"]').attr('content')});

                //Check if other user is online or offline
                socket.emit('userOtherOnline',{userId: data.other_user.id});
                checkOtherUser(data.other_user.id)

                socket.on('userOtherOnline', (userId) => {
                    console.log($('#id_user_other').val() , userId)
                    if( ''+$('#id_user_other').val()+'' === ''+userId+''){
                        $('#chat-show-status').html(` <i class="fas fa-xs fa-circle" style="color:#37bc9b"></i> 
                        <br> <small style="position: absolute;
                        left: 40%;
                        top: 15px;
                        font-size: 10px;">online</small>`);
                    }
                });

                socket.on('userOtherOffline', (userId) => {
                    console.log($('#id_user_other').val() , userId)
                    if( ''+$('#id_user_other').val()+'' === ''+userId+''){
                        $('#chat-show-status').html(` <i class="fas fa-xs fa-circle" style="color:lightgray"></i>
                        <br> <small style="position: absolute;
                        left: 40%;
                        top: 15px;
                        font-size: 10px;">offline</small>`);
                    }
                });
             
                
                chatContentBuilder(data , id_user);

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

                    chatContentBuilder(data , id_user);

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





// Message from server
socket.on('previewMessage', (message) => {

    var previewMessage_id_user = '';
    var previewMessage_id_user_other = '';
    var previewMessage_nickname = '';

    if(message.data.id_user === message.data.id_user_other){
        previewMessage_id_user = message.data.id_user;
        previewMessage_id_user_other = message.data.id_user_other;
        previewMessage_nickname = message.data.user.nick_name;
    }
    else if(message.data.id_user === $('meta[name="id_user"]').attr('content') || `${message.data.id_user}` === $('meta[name="id_user"]').attr('content')){
        previewMessage_id_user = message.data.id_user_other;
        previewMessage_id_user_other = message.data.id_user;
        previewMessage_nickname = message.data.user_other.nick_name;
    }
    else if(message.data.id_user_other === $('meta[name="id_user"]').attr('content') || `${message.data.id_user_other}` === $('meta[name="id_user"]').attr('content')){
        previewMessage_id_user = message.data.id_user;
        previewMessage_id_user_other = message.data.id_user_other;
        previewMessage_nickname = message.data.user.nick_name;
    }
    
    var data = {
        user : `${previewMessage_nickname}`, 
        id_user : `${previewMessage_id_user}`, 
        id_user_other : `${previewMessage_id_user_other}`, 
        last_text: `${message.data.text}`, 
        last_created: `${moment(message.data.created_at).format('h:mm a')}`, 
        unread_count_self: message.data.unread_count_self,
        unread_count_other: message.data.unread_count_other,
    };

    chatSinglePreviewBuilder(data);

});

///////////////////////////////////////////////////////////////////////
//Leaves chat room between logged user and other user
$('#back-button').on('click' , () => {
    socket.emit('leavemyroom', $('#id_user').val() , $('#id_user_other').val());
});
///////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////
//Socket IO for send chat
if (document.querySelector('#chat-form')) {

    const chatForm = $('#chat-form');
    const chatContent = document.querySelector('#chat-content');

    // Message from server
    socket.on('showMessage', (message) => {

        $('#chat-empty').remove();

        chatSingleContentBuilder(message);

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
    
    var url = new URL(window.location.href);
    var id_user = url.searchParams.get("id_user");

    fetchChatContent(id_user);

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
                    var id_user = $(this).data('iduser');
                    
                    updateChatStatus(id_user);

                    fetchChatContent(id_user);
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

