require('./bootstrap');
const { default: Axios } = require('axios');

require('./bootstrap');
const messages_el=document.getElementById('messages');
const message_input=document.getElementById('message_input');
const message_form=document.getElementById('message_form');


message_form.addEventListener('submit',(e)=>{
    e.preventDefault();

    const options={
        method:'post',
        url:'/admin/send-message',
        data:{
            message:message_input.value
        }
    }

    Axios(options);

});

window.Echo.channel('chat')
.listen('.message',(e)=>{
console.log(e);
});