
    $(function() {
      listmessages();
      
    });
    
    function compose(){
      console.info('composing...'); 
    }
    
    function listmessages(){
      console.info('listing messages...'); 
      $.post( "view.php",{})
        .done(function( data ) {
          //console.log( "Data Loaded: " + data );
          console.log( "Listing Done!" + data );
          $('#messages').html(data);
        });
    }
    
    
    function read(id){
      console.log('reading - '+id); 
      $.post( "read.php", { messageid: id})
        .done(function( data ) {
          console.log( "Reading Message: " + data );
          $('#fullmessage').html(data);
          listmessages();
        });
    }
    
    function send(){
      console.info('sending message...'); 
      var recipients = $('#message_to').val().join(',');
      console.log('recipients: '+recipients);
      $.post( "send.php", { 
          to: recipients, 
          subject: $('#message_subject').val(), 
          body: $('#message_body').val() 
        })
        .done(function( data ) {
          console.log( "Data Loaded: " + data );
          $('#result').html(data);
          listmessages();
        });
      
    }
    
    function login(){
      console.info('Logging in...'); 
      $.post( "login.php", { username: $('#username').val(), pass: $('#pass').val()})
        .done(function( data ) {
          console.log( "Logged in: " + data );
          $('#result').html(data);
          listmessages();
        });
    }
    
    function logout(){
      console.info('logging out...'); 
    }
    