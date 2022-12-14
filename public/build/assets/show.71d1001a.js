$(".btn_privilegios").on("click",(e,i)=>{t($(e.currentTarget).attr("data-user_id"))});$(".btn-definir-privilegios").on("click",(e,i)=>{o($(e.currentTarget).attr("data-user_id"))});const t=async e=>{await $.ajax({type:"GET",url:"/api/userprivileges",data:{user_id:e},dataType:"json",beforeSend:function(){},success:function(i){let r="";i.data.map(s=>{r+=`<div class="ml-5 flex">
                <div class="custom-control custom-switch">
<input type="checkbox" ${s.checked?"checked":""} class="custom-control-input privileges_check privileges_${s.id}"  value="${s.id}" id="switch_${s.id}">
<label class="custom-control-label" for="switch_${s.id}">${s.privilegio.name}</label>
</div>

                </div>`}),$("#body_modalPrivilegios").html(r),$("#btn-definir-privilegios").attr("data-user_id",e),$("#modalPrivilegios").modal("show")},error:function(i){console.error("getUserPrivileges:",i)}})},o=async e=>{let i=[];$(".privileges_check").each((r,s)=>{i.push($(s).value)}),await $.ajax({type:"POST",url:"/api/defineprivileges",data:{user_id:e,privileges:i},dataType:"json",beforeSend:function(){},success:function(r){r.ok==!0?(toastr.success("Privil\xE9gios definidos corretamente."),$("#modalPrivilegios").modal("hide")):toastr.error("Oops! N\xE3o foi poss\xEDvel definir.")},error:function(r){console.error("setUserPrivileges:",r)}})};
