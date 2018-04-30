/*
Список для аджакс запроса
    method,
    data,
    url,
    contentType,
    callback
*/


function doAjax(request){ // функция doAjax работа которой основывается на переданном объекте
    var xhr = new XMLHttpRequest(); // Объект XMLHttpRequest

    if(request.method === 'GET'){ // проверка метода
        request.url += '?' + request.data; // добавление '?' к url и значение свойства data
        request.data = null; // присваиваем свойство null, при GET будет пустым
    }
    xhr.open(request.method, request.url); // в методе open в качестве метода запроса - request.method, юрл - request.url


    // Один из вариантов передачи данных в теле запроса с помощью Ajax это использывание обьекта formDara, в котором не надо указывать заголовок
    //любые данные помещаются в свойства data
    if( typeof request.data != 'object'){ // проверка request.data c помощью оператора typeof, который возвращает тип данных в виде строки, если тип данных не равен object, то устанавливаем кодировку
        xhr.setRequestHeader('Content-Type',  // заголовок Content-Type
        request.contentType);
    }


    xhr.onreadystatechange = function(){ // присвоим обработчик событию readystatechange
        if(xhr.readyState === 4 && xhr.status === 200){ //проверка на успешный запрос
            request.callback(xhr.responseText);// функция обратного вызова
        }
    }
    xhr.send(request.data); // отправка запроса
}
