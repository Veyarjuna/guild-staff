var api = $('#api_link').val()
var url = api+'/menus'
var datatable = $('#table_menus').DataTable({
    processing: true,
        ajax: {
            url : url,
            },
        fnRowCallback: function(row,data,index,rowIndex){
            $('td:eq(8)',row).html(`
                <a class="btn btn-danger" data-id="${data.menu_id}" onclick="OnDelete(this)"><i class="bi bi-trash2-fill"></i></a>
            `)
        },columns: [
            {data: 'menu_id', name: 'menu_id', width:'5%'},
            {data: 'name_menu', name: 'name_menu'},
            {data: 'menu', name: 'menu'},
            {data: 'menu_parent', name: 'menu_parent'},
            {data: 'menu_has_sub', name: 'menu_has_sub'},
            {data: 'menu_role_access', name: 'menu_role_access'},
            {data: 'menu_icon', name: 'menu_icon'},
            {data: 'menu_endpoint', name: 'menu_endpoint'},
            {data: 'created_at', name: 'created_at'}
        ]
})

function OnDelete(el){
    var data = $(el).data();
    const hasil = data.id
    Swal.fire({
        title: 'Apakah Anda Ingin Menghapus Menu ini ?',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url+'/'+hasil,
                type:'DELETE',
                success:function(response){
                    Swal.fire('Deleted', '', 'success')
                    $('#table_menus').DataTable().ajax.reload();
                }
            })
        }
    })
}
setTimeout(() => {
    $('#alert_badge').slideUp('fast');
}, 1000);