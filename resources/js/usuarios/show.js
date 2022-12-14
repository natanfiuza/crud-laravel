$('.btn_privilegios').on('click',(v,e) => {

getUserPrivileges($(v.currentTarget).attr("data-user_id"));

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
<input type="checkbox" ${r.checked?'checked':''} class="custom-control-input privileges_${r.id}"  value="${r.id}" id="switch_${r.id}">
<label class="custom-control-label" for="switch_${r.id}">${r.privilegio.name}</label>
</div>

                </div>`;
            });
            $("#body_modalPrivilegios").html(concat);
            $("#modalPrivilegios").modal("show");
        },
        error: function (e) {
            console.error(e);
        },
    });
};
