
function ChangeСount(id){


    let id_price = "price_"+id;//ID элемента с ценой для текущей кнопки
    let price = document.getElementById(id_price).value;//получаем значение, введенное в input price
    let str = "price="+price+"&id="+id;//передаем 2 параметры , разделенные амперсандом, как в GET параметрах.
    //alert(str);
    $.ajax({
        type:'GET’//метод  запроса
        url:'server.php', //файл, принимающий данные.Файл который обрабатывает наш запрос.
        data:str, //данные которые мы хотим передать, то есть переменную str.
        success: function(answer){
            alert(answer);//В случае успеха, мы вызываем функцию ответ от нашего сервера
        }

    })
}

