function displayFeedback(e){var d=$(".page").data("page")+"-"+$(".page").data("page-name");var b=e[d];if(!b){var a='<div class="chat"><div class="chat-avatar"> Company </div><div class="chat-body"><div class="chat-content"><p> Please make a comment to start a conversation. </p><time class="chat-time">11:37:08 am</time></div></div></div>';$(".feedback-section .chats").append(a)}else{for(var c in b){var a='<div class="chat '+((b[c].user.toLowerCase()=="client")?"chat-left":"")+'"><div class="chat-avatar"> '+b[c].user+' </div><div class="chat-body"><div class="chat-content"><p> '+b[c].comment+' </p><time class="chat-time">'+b[c].date+"</time></div></div></div>";$(".feedback-section .chats").append(a)}}}$(document).ready(function(a){Site.run(),function(){a.ajax({dataType:"json",url:baseUrl+"/feedback/feed",async:false,success:function(b){displayFeedback(b)},error:function(){}}).responseJSON}(),function(){a("#feedback-submit").on("click",function(d){d.preventDefault();var b=a(".feedback-section").data("user");var c=a(".page").data("page")+"-"+a(".page").data("page-name");d.preventDefault();a.ajax({url:baseUrl+"/feedback/feedback",type:"POST",data:{user:b,url:c,message:a("#feedback-message").val()},success:function(e){location.reload()},error:function(){return false}})})}()});