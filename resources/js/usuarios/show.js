$('.btn_privilegios').on('click',(v,e) => {

getUserPrivileges($(v.currentTarget).attr("data-user_id"));

});
$(".btn-definir-privilegios").on("click", (v, e) => {
    setUserPrivileges($(v.currentTarget).attr("data-user_id"));
});


const getUserPrivileges = async (user_id) => {
    await $.ajax({
        type: "GET",
        url: "/api/userprivileges",
        data: {
            user_id: user_id,
        },
        dataType: "json",

        beforeSend: function () {},
        success: function (res) {
            let concat = '';
            res.data.map((r) => {
                concat += `<div class="ml-5 flex">
                <div class="custom-control custom-switch">
<input type="checkbox" ${r.checked?'checked':''} class="custom-control-input privileges_check privileges_${r.id}"  value="${r.id}" id="switch_${r.id}">
<label class="custom-control-label" for="switch_${r.id}">${r.privilegio.name}</label>
</div>

                </div>`;
            });
            $("#body_modalPrivilegios").html(concat);
            $("#btn-definir-privilegios").attr('data-user_id',user_id);
            $("#modalPrivilegios").modal("show");
        },
        error: function (e) {
            console.error('getUserPrivileges:',e);
        },
    });
};
const setUserPrivileges = async (user_id) => {
    let list_privileges = [];
    $('.privileges_check').each((e,i) => {
        list_privileges.push($(i).value);
    } );
    await $.ajax({
        type: "POST",
        url: "/api/defineprivileges",
        data: {
            user_id: user_id,
            privileges: list_privileges,
        },
        dataType: "json",

        beforeSend: function () {},
        success: function (res) {
            let concat = "";
            if (res.ok == true) {
                toastr.success('Privilégios definidos corretamente.')
                $("#modalPrivilegios").modal("hide");
            } else {
                toastr.error('Oops! Não foi possível definir.');
            }

        },
        error: function (e) {
            console.error("setUserPrivileges:", e);
        },
    });
};
