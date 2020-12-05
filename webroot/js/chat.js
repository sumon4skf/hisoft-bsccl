function resetChat(){
    $("#chat-box").empty();
}

// function insertChat(who, text, time){
//     if (time === undefined){
//         time = 0;
//     }
//     var control = "";
//     var date = formatAMPM(new Date());
//
//     if (who == "me"){
//         control = '<li style="width:100%;">' +
//             '<div class="msj-rta macro">' +
//             '<div class="text text-r">' +
//             '<p>'+text+'</p>' +
//             '<p><small>'+date+'</small></p>' +
//             '</div>' +
//             '</li>';
//     }else{
//         control = '<li style="width:100%">' +
//             '<div class="msj macro">' +
//             '<div class="avatar">' + who + '</div>' +
//             '<div class="text text-l">' +
//             '<p>'+ text +'</p>' +
//             '<p><small>'+date+'</small></p>' +
//             '</div>' +
//             '</div>' +
//             '</li>';
//     }
//     setTimeout(
//         function(){
//             $("#chat-box").append(control).scrollTop($("#chat-box").prop('scrollHeight'));
//         }, time);
//
// }

function insertInfo(text){
    $.ajax({
        type: "POST",
        url: SITE_URL + 'chatMessages/chat',
        data : {text: text},
        dataType: 'html',
        success: function (data) {
            console.log('aaaaa');
            $("#msg-info").show().delay(5000).fadeOut();
        }
    });
}

$(".mytext").on("keydown", function(e){
    if (e.which == 13){
        var text = $(this).val();
        if (text !== ""){
            insertInfo(text);

            $(this).val('');
        }
    }
});

$('body > div > div > div:nth-child(2) > span').click(function(){
    $(".mytext").trigger({type: 'keydown', which: 13, keyCode: 13});
})

//-- Clear Chat
resetChat();

// function insertOtherChat(){
//     $.ajax({
//         type: "POST",
//         url: SITE_URL + 'chatMessages/today-records',
//         data : {},
//         dataType: 'html',
//         success: function (data) {
//             var arr = $.parseJSON(data);
//             for(var i = 0; i < arr.length; i++) {
//                 insertChat(arr[i].boid, arr[i].message, arr[i].created);
//             }
//         }
//     });
// }

// function updatedChat(){
//     $.ajax({
//         type: "POST",
//         url: SITE_URL + 'chatMessages/update-records',
//         data : {},
//         dataType: 'html',
//         success: function (data) {
//             var arr = $.parseJSON(data);
//             for(var i = 0; i < arr.length; i++) {
//                 insertChat(arr[i].boid, arr[i].message, arr[i].created);
//             }
//         }
//     });
// }

//insertOtherChat();

// setInterval(function(){
//     updatedChat();
// }, 5000);



//-- Print Messages
// insertChat("me", "Hello Tom...", 0);
// insertChat("you", "Hi, Pablo", 1500);
// insertChat("you", "Hi, Pablo 2", 1500);
// insertChat("you", "Hi, Pablo 3", 1500);
// insertChat("me", "What would you like to talk about today?", 3500);
// insertChat("you", "Tell me a joke",7000);
// insertChat("me", "Spaceman: Computer! Computer! Do we bring battery?!", 9500);
// insertChat("you", "LOL", 12000);