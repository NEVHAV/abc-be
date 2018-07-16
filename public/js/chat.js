var myDataRef = new Firebase('https://ktmgroup-f6b47.firebaseio.com');
$('#messageInput').keypress(function (e) {
  if (e.keyCode == 13) {
    var name = '123456';
    var text = $('#messageInput').val();
    myDataRef.push({name: name, text: text});
    $('#messageInput').val('');
  }
});
myDataRef.on('child_added', function(snapshot) {
  var message = snapshot.val();
  displayChatMessage(message.name, message.text);
});
function displayChatMessage(name, text) {
  if(name == 'KTMAdminKTMAdminKTMAdmin'){
    console.log('abcde');
    document.getElementById("messagesDiv").style.color="blue";
  }
  $('<div/>').text(text).prepend($('<em/>').text(name+': ')).appendTo($('#messagesDiv'));
  $('#messagesDiv')[0].scrollTop = $('#messagesDiv')[0].scrollHeight;
};