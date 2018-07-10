 @extends('layouts.admin')
    @section('title', 'Thông tin công ty')
    @section('content_header')
    <div class="user-header u-flex">
        <h1 class="u-flex1">Chat</h1>
    </div>
    @stop

    @section('content-inner')
    <head>
        <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    </head>   
    <form>
      <div class="row" style="margin-left: 20px">
        <div class="large-12 columns">
          <div id='messagesDiv' class="msg-wrapper"></div>
          
         </div>
      </div>
      <hr />
      <div class="row" style="margin-left: 20px">
        <div class="large-12 columns">
          <label>Name</label>
          <br>
            <input type="text" id='nameInput' placeholder='Name' />
        </div>
      </div>
      <div class="row" style="margin-left: 20px">
        <div class="large-12 columns">
          <label>Message</label>
          <br>
          <textarea id='messageInput' placeholder='Message'></textarea>
        </div>
      </div>
    </form>
    @stop
