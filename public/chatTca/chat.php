<html>
<head>
  <script src="https://cdn.firebase.com/js/client/2.2.1/firebase.js"></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
  <link rel="stylesheet" href="http://hackeryou.com/wp-content/themes/hackeryou/style.css">
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
</head>
<body>

  <!-- <div class="wrapper">
    <div class="messagesWrap">
      <ul class="messages"></ul>
    </div>
    <div class="fixed-bottom">
    <form action="" class="chat">
      <input type='text' id='messageInput'  placeholder='Mensaje' required maxlength=140>
      <input type="submit" value="Enviar">
    </form>
    </div>
  </div> -->
  <form action="" class="chat">
  <div class="container">
  <div class="header">
    <h2>Chat</h2>
    <!-- <a href="#" title="Add Friend to this chat">+</a> -->
  </div>
  <div class="chat-box">
    <!-- <div class="message-box left-img">
      <div class="picture">
        <img src="https://dribbble.s3.amazonaws.com/users/2493/avatars/original/joey_head_new.png?1346157876" title="user name"/>
        <span class="time">10 mins</span>
      </div>
      <div class="message">
        <span>Bobby Giangeruso</span>
        <p>Hey Mike, how are you doing?</p>
      </div>
    </div> -->
     <div class="messages"></div>

    <div class="enter-message">
      <input type="text" id='messageInput' placeholder="Ingresa tu mensaje.."/>
      <button type="submit" class="send">Enviar</button>
    </div>
  </div>
</div>
    </form>

  <script type="text/javascript">
        // Create a reference to firebase
  var messagesRef = new Firebase('https://trading-club-academy.firebaseio.com/chat');

  // C.R.E.A.M -  cache your elements
  var messageField = $('#messageInput');
  var nameField = $('#nameInput');
  var messageList = $('.messages');

  var chatBox = $('.container');

  function addMessage(data) {
    //verify the chat id
    if(data.chat_id === <?php echo $_GET['room'] ?>) {
    var username = data.name;
    var message = data.text;
    var user_id = data.user_id;

console.log(chatBox[0].scrollTop);
    var mainDiv =  $("<div class='message-box right-img'>").html(
        `<div class='picture'>
          <img src='https://www.artisglobalclub.com/admin_assets/images/guy.jpg' title='user name'/>
        </div>`
    )

    var messageDiv = $(`<div class='message'>`)






     var nameElement = $("<span>").text(username);

    var messageElement = $('<p>').text(message);


    messageDiv.append(nameElement)
    messageDiv.append(messageElement)

    mainDiv.append(messageDiv)
    // Add the message to the DOM
    messageList.append(mainDiv);

    // Scroll to the bottom of the message list
    chatBox[0].scrollTop = chatBox[0].scrollHeigh;

   }
  }

  // Listen for the form submit
  $('.chat').on('submit',function(e) {

    // stop the form from submitting
    e.preventDefault();

    // create a message object
    var message = {
      user_id: <?php echo '"'.$_GET['id'].'"'; ?>,
      name : <?php echo '"'.$_GET['name'].'"'; ?>,
      text : messageField.val(),
      chat_id: <?php echo $_GET['room'] ?>
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



  </script>
</body>
</html>
