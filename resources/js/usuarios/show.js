$('.btn_privilegios').on('click',(v,e) => {

console.log("clicou target", $(v.currentTarget).attr("data-user_id"));

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
                concat += `<div>
                <input type="checkbox" class="privileges_${r.id} form-control" value="${r.id}">
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
