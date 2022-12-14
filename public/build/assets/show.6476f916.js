$(".btn_privilegios").on("click",(s,i)=>{o($(s.currentTarget).attr("data-user_id"))});const o=async s=>{await $.ajax({type:"GET",url:"/api/userprivileges",data:{user_id:s},dataType:"json",beforeSend:function(){},success:function(i){let c="";i.data.map(e=>{c+=`<div class="ml-5 flex">
                <div class="custom-control custom-switch">
<input type="checkbox" ${e.checked?"checked":""} class="custom-control-input privileges_${e.id}"  value="${e.id}" id="switch_${e.id}">
<label class="custom-control-label" for="switch_${e.id}">${e.privilegio.name}</label>
</div>

                </div>`}),$("#body_modalPrivilegios").html(c),$("#modalPrivilegios").modal("show")},error:function(i){console.error("getUserPrivileges:",i)}})};
