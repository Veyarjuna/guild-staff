var api = $('#api_link').val()
var url = api+'/users'
var datatable = $('#table_users').DataTable({
        processing: true,
        ajax: {
            url : url,
            },
        fnRowCallback: function(row,data,index,rowIndex){
            $('td:eq(1)',row).html(`
                <img src="http://${data.img_profil}" class="card-img-top" style="height: 50px;width: 50px;" href="http://${data.img_profil}">
            `)
            $('td:eq(4)',row).html(new Date(data.createdAt).toDateString())
            $('td:eq(5)',row).html(`
                <a class="btn btn-primary" data-id="${data.user_id}" href="/users/edit/${data.user_id}"><i class="bi bi-pencil-fill"></i></a>
                <a class="btn btn-danger" data-id="${data.user_id}" onclick="OnDelete(this)"><i class="bi bi-trash2-fill"></i></a>
            `)
        },
        columns: [
            {data: 'user_id', name: 'no', width: '5%'},
            {data: 'img_profil', name:'img_profil'},
            {data: 'user_name', name:'name'},
            {data: 'email', name:'email'},
            {data: 'createdAt', name:'createdAt'},
            {data: 'rank_point_user_id', name:'rank_point_user_id'},
            ],
        })
    
    
function OnDelete(el){
    var data = $(el).data();
    const hasil = data.id;
    Swal.fire({
        title: 'Apakah Anda Ingin Menghapus User ini ?',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url+'/'+hasil,
                    type:'DELETE',
                    success:function(response){
                        Swal.fire('Deleted', '', 'success')
                    }
                })
            }
        })
    }

