@extends('layouts.app')
@section('content')

  <div id="chat-container">
    <div id="search-container">
      <input type="text" placeholder="Search" />
    </div>
    <div onclick="select()" id="conversation-list">
      <div  class="conversation active">
        <img src="{{url('images/user1.png')}}" alt="Sumit" />
        <div class="title-text">Sumit Saha</div>
        <div class="created-date"> Apr 16 </div>
        <div class="conversation-message">This is a message</div>
      </div>
      
    </div>
  
    <div id="chat-title">
      <span>Sumit</span>
      <img src="{{url('images/trash.png')}}" alt="Delete Conversation" />
    </div>
    
    <div id="chat-message-list">
      
      <div class="message-row other-message">
        <div class="message-content">
          <img src="{{url('images/user1.png')}}" alt="Sumit" />
          <div class="message-text">Ok then</div>
          <div class="message-time">Apr 16</div>
        </div>
      </div>
      <h1 class="selectc" style=" color:rgb(49, 49, 49);margin-bottom:205px;font-size: 30px; text-align:center;">Select Conversation</h1>

    </div>
    <div id="chat-form">
      <img src="{{url('images/attachment.png')}}" alt=Add Attachment="" />     
      <form  id="message_form">
        <input type="text" name="message" id="message_input" placeholder="Type a message" />
        <button type="submit" id="message_send">send</button>
      </form> 
    </div>

  </div>


<script src="../js/app.js"></script>


@endsection
