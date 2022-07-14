var api = $('#api_link').val()
var url = api+'/ranks'
var datatable = $('#table_ranks').DataTable({
    processing: true,
        ajax: {
            url : url,
            },
        fnRowCallback: function(row,data,index,rowIndex){
            $('td:eq(3)',row).html(`
                <a class="btn btn-primary" href="/ranks/${data.rank_id}/edit"><i class="bi bi-pencil-fill"></i></a>
                <a class="btn btn-danger" data-id="${data.rank_id}" onclick="OnDelete(this)"><i class="bi bi-trash2-fill"></i></a>
            `)
        },columns: [
            {data: 'rank_id', name: 'rank_id', width:'5%'},
            {data: 'rank_name', name: 'rank_name'},
            {data: 'minimum_rank', name: 'minimum_rank'},
            {data: 'created_at', name: 'created_at'}
        ]
})

function OnDelete(el){
    var data = $(el).data();
    const hasil = data.id;
    Swal.fire({
        title: 'Apakah Anda Ingin Menghapus Rank ini ?',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url+'/'+hasil,
                type:'DELETE',
                success:function(response){
                    Swal.fire('Deleted', '', 'success')
                    $('#table_ranks').DataTable().ajax.reload();
                }
            })
        }
    })
}

setTimeout(() => {
    $('#alert_badge').slideUp('fast');
}, 1000);