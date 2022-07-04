var api = $('#api_link').val()
var url = api+'/menus'
var datatable = $('#table_menus').DataTable({
    processing: true,
        ajax: {
            url : url,
            },
        fnRowCallback: function(row,data,index,rowIndex){
            
        },columns: [
            {data: 'menu_id', name: 'menu_id', width:'5%'},
            {data: 'name_menu', name: 'name_menu'},
            {data: 'menu', name: 'menu'},
            {data: 'menu_parent', name: 'menu_parent'},
            {data: 'menu_has_sub', name: 'menu_has_sub'},
            {data: 'menu_role_access', name: 'menu_role_access'},
            {data: 'menu_icon', name: 'menu_icon'},
            {data: 'menu_endpoint', name: 'menu_endpoint'}
        ]
})