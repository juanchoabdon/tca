  // Create a reference to firebase
  var messagesRef = new Firebase('https://trading-club-academy.firebaseio.com/chat');

  // C.R.E.A.M -  cache your elements
  var messageField = $('#messageInput');
  var nameField = $('#nameInput');
  var messageList = $('.messages');

  function addMessage(data) {
    //verify the chat id
    if(data.chat_id === 1) {
    var username = data.name;
    var message = data.text;
    var user_id = data.user_id;

    if(user_id === 2324) { //Verify if is the logued user
      var nameElement = $("<strong class='myuser'>").text(username);
    } else {
       var nameElement = $("<strong>").text(username);
    }
    var messageElement = $('<li>').text(message).prepend(nameElement);

    // Add the message to the DOM
    messageList.append(messageElement);

    // Scroll to the bottom of the message list
    messageList[0].scrollTop = messageList[0].scrollHeight;
   }
  }

  // Listen for the form submit
  $('.chat').on('submit',function(e) {

    // stop the form from submitting
    e.preventDefault();

    // create a message object
    var message = {
      user_id: 2325,
      name : "Dylan",
      text : messageField.val(),
      chat_id: 1
    }

    // Save Data to firebase
    messagesRef.push(message);

    // clear message field
    messageField.val('');

  });

  // Add a callback that is triggered for each chat message
  // this is kind of like an Ajax request, but they come in via websockets
  // 10 of them will load on page load, and any future messages will as well
  messagesRef.limitToLast(100).on('child_added', function (snapshot) {
    // Get data from returned
    addMessage(snapshot.val());
  });
