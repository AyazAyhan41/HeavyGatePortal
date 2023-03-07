function AjaxReq() {
    this.data = {
        devx_token:$('meta[name=X-CSRF-TOKEN]').attr('content')
    };
}

AjaxReq.prototype.post = function (url,data,callback){
    $.ajax(url,{
        type:'POST',
        data: {
            ...this.data,
            ...data
        },
        success: function (response){
            if (response.status){
                iziToast.success({
                    title: 'İşlem Başarılı',
                    message: response.message,
                    position:'topRight'
                });
            } else {
                iziToast.error({
                    title: 'İşlem Başarısız',
                    message: response.message,
                    position:'topRight'
                });
            }
           callback(response)
        },
        error: function (xhr,opt,error) {
            iziToast.error({
                title: 'İşlem Başarısız',
                message: error,
                position:'topRight'
            });
            callback({
                status:false,
                message:error
            })
        }
    });
}

AjaxReq.prototype.get = function (url,data,callback){
    $.ajax(url,{
        type:'GET',
        data: {
            ...this.data,
            ...data
        },
        success: function (response){
            if (response.status){
                iziToast.success({
                    title: 'İşlem Başarılı',
                    message: response.message,
                    position:'topRight'
                });
            }else {
                iziToast.error({
                    title: 'İşlem Başarısız',
                    message: response.message,
                    position:'topRight'
                });
            }
            callback(response)
        },
        error: function (xhr,opt,error) {
            iziToast.error({
                title: 'İşlem Başarısız',
                message: error,
                position:'topRight'
            });
            callback({
                status:false,
                message:error
            })
        }
    });
}

let devx_request = new AjaxReq();