@extends('layouts.app')
@section('content') 
  <div class="manageUser-container">
    <div id="title">
      <h2>Manage Users</h2>
    </div>

    <div class="new-message-container new-user">
      <a href="#" style=" text-decoration:none; font-size: 40px; margin-left:10px; color:white" onclick="openModal()">+</a>
    </div>

    <div id="users-table">
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Manage</th>
          </tr>
        </thead>
        <tbody id="users-table">
            @forelse ($user as $item)
            <tr data-id="{{$item->id}}">              
                <td class="name">
                  <img src="{{asset('uploads/user_image/'.$item->avatar)}}" />
                  <span>{{$item->name}}</span>
                </td>
                <td>{{$item->email}}</td>
                <td class="manage">
                   <i  data-id="{{$item->id}}" class="fas fa-trash userDelete" style="cursor: pointer; font-size: 20px; color:red;"></i>

                </td>
              </tr>
            @empty
                <h4 style="color: red; font-size:15px; text-align:center;">No User Add Yet</h4>
            @endforelse
         
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal-wrapper" id="add-user-modal">
    <div class="modal">
      <a href="#" onclick="closeModal()" class="modal-close">+</a>
      <div class="modal-title">
        <h2>Create New User</h2>
      </div>
      <div class="modal-body">
        <form id="add-user-form" method="post" enctype="multipart/form-data">
            @csrf
          <div>
            <input  class="from-controll" type="text" placeholder="enter name" id="name" name="name" />
            <p class="error show">This is error</p>
          </div>
        <div>
            <input class="from-controll" type="text" placeholder="enter email" id="email" name="email" />
            <p class="error show">This is error</p>
        </div>
      
     <div>
    <input class="from-controll" type="number" placeholder="enter mobile" id="mobile" name="mobile" />
    <p class="error show">This is error</p>
       </div>
         <div>
            <input class="from-controll" type="password" placeholder="enter password" id="password" name="password" />
            <p class="error show">This is error</p>
         </div>
         <div>
            <input  class="from-controll" type="file" id="avatar" name="avatar" />
            <p class="error show">This is error</p>
         </div>
     
       

          <input id="s" type="submit" value="Submit" />
        </form>
      </div>
    </div>
  </div>
  <script>
    const modal = document.querySelector("#add-user-modal");
    function closeModal() {
      modal.style.display = "none";      
      }
    function openModal() {
      modal.style.display = "block";   
    }


</script>
<script src="{{asset('js/usermodal.js')}}"></script>
@endsection