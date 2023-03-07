$('.delete').click(function (){
    let id = $(this).closest('tr').data('id');
    let url = $(this).data('url');

    console.log('basıldı');

    devx_request.post(url, {id: id}, function (response){
        if(response.status){
            $('tr[data-id='+id+']').remove();
        }
    })
});
