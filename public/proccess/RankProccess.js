var api = $('#api_link').val()
var url = api+'/ranks'
var datatable = $('#table_ranks').DataTable({
    processing: true,
        ajax: {
            url : url,
            },
        fnRowCallback: function(row,data,index,rowIndex){
            $('td:eq(3)',row).html(`
                <a class="btn btn-primary" data-id="${data.user_id}" href="${url+'/'+data.rank_id}" target="_blank"><i class="bi bi-pencil-fill"></i></a>
                <a class="btn btn-danger" data-id="${data.user_id}" onclick="OnDelete(this)"><i class="bi bi-trash2-fill"></i></a>
            `)
        },columns: [
            {data: 'rank_id', name: 'rank_id', width:'5%'},
            {data: 'rank_name', name: 'rank_name'},
            {data: 'minimum_rank', name: 'minimum_rank'},
            {data: 'createdAt', name: 'createdAt'}
        ]
})