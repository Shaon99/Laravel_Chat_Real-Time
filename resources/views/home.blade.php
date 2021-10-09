@extends('layouts.user')

@section('content')
<div id="chat-container">
    <div id="search-container">
      <input type="text" placeholder="Search" />
    </div>
    <div id="conversation-list">
      <div class="conversation active">
        <img src="{{url('images/user1.png')}}" alt="Sumit" />
        <div class="title-text">Shaon</div>
        <div class="created-date"> Apr 16 </div>
        <div class="conversation-message">This is a message</div>
      </div>
    </div>
    <div id="new-message-container">
        <a href="#" style=" text-decoration:none; font-size: 40px; margin-left:10px; color:white" onclick="openModal()">+</a>

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
      <div class="message-row you-message">
        <div class="message-content">
          @forelse ($msg as $item)
          <div class="message-text">{{$item->message}}</div>

          @empty
              
          @endforelse
          <div class="message-time">Apr 16</div>
        </div>
      </div>
    </div>
    <div id="chat-form">
      <img src="{{url('images/attachment.png')}}" alt=Add Attachment"" />
      <input type="text" placeholder="Type a message" />
    </div>
  </div>

  <div class="modal-wrapper" id="new-chat-modal">
    <div class="modal">
      <a href="#" onclick="closeModal()" class="modal-close">+</a>
      <div class="modal-title">
        <h2>Create New Conversation</h2>
      </div>
      <div class="modal-body">
        <form>
          <input type="text" placeholder="search user by name, mobile or email" />
      
        </form>
      </div>
    </div>
  </div>
  <script>
    const modal = document.querySelector("#new-chat-modal");
    function closeModal() {
      modal.style.display = "none";      
      }
    function openModal() {
      modal.style.display = "block";   
    }


</script>
@endsection
