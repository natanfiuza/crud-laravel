$(".btn_privilegios").on("click",(i,s)=>{t($(i.currentTarget).attr("data-user_id"))});$("#btn-definir-privilegios").on("click",(i,s)=>{o($(i.currentTarget).attr("data-user_id"))});const t=async i=>{await $.ajax({type:"GET",url:"/api/userprivileges",data:{user_id:i},dataType:"json",beforeSend:function(){},success:function(s){let r="";s.data.map(e=>{r+=`<div class="ml-5 flex">
                <div class="custom-control custom-switch">
<input type="checkbox" ${e.checked?"checked":""} class="custom-control-input privileges_check privileges_${e.id}"  value="${e.id}" id="switch_${e.id}">
<label class="custom-control-label" for="switch_${e.id}">${e.privilegio.name}</label>
</div>

                </div>`}),$("#body_modalPrivilegios").html(r),$("#btn-definir-privilegios").attr("data-user_id",i),$("#modalPrivilegios").modal("show")},error:function(s){console.error("getUserPrivileges:",s)}})},o=async i=>{let s=[];$(".privileges_check").each((r,e)=>{$(e).is(":checked")&&s.push($(e).val())}),await $.ajax({type:"POST",url:"/api/defineprivileges",data:{user_id:i,privileges:s},dataType:"json",beforeSend:function(){},success:function(r){r.ok==!0?(toastr.success("Privil\xE9gios definidos corretamente."),$("#modalPrivilegios").modal("hide")):toastr.error("Oops! N\xE3o foi poss\xEDvel definir.")},error:function(r){console.error("setUserPrivileges:",r)}})};
