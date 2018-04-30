var servResponse = document.querySelector('#response'); //присвоение переменной servResponse div с id response
document.forms.ourForm.onsubmit = function(e){ // Для получения елемента формы используется свойство - document.forms, дальше - имя, и обработчик события onsubmit
//для предотвращения самостоятельного браузером отправления формы и перехода на указанный url нужно обратиться к обьекту события, который передается первым аргументом в обработчик
    e.preventDefault(); // метод preventDefault при вызове ег оу объекта события мы отменяем действие по умолчанию

    var userInput = document.forms.ourForm.ourForm__inp.value; // в переменную userInput поместим пользывательский ввод, чтобы достать его нужно обратиться к форме document.forms.ourForm.ourForm__inp и указать свойство value, которое возвращает текущее введенное значение
    userInput=encodeURIComponent(userInput); //при отправке методом GET ввод нужно закодировать функцией encodeURIComponent, чтобы избежать некорректных вводов

    var xhr = new XMLHttpRequest(); //создаем новый объект(new) XMLHttpRequest
    //xhr.open('GET', 'form.php?' + 'ourForm__inp=' + userInput); //настройка запроса (пара ключ значение  + '&key2=value')

    xhr.open('POST', 'form.php');

    var formData = new FormData(document.forms.ourForm); // создания объекта FormData который кодирует форму для отправки на сервер; указание параметра  DOM формы - document.forms.ourForm (добавятся все поля формы)

    //xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded' ) // нужно указать заголовок Content-Type с кодировкой(1 из 3), метод setRequestHeader должен находиться после open и перед send!!!
    // кодировка urlencoded увеличивает размер данных из-за замены символов, для пересылания файлов используется кодировка multipart/form-data

    // обработка ответа сервера
    xhr.onreadystatechange = function(){ // установлю обработчик событий onreadystatechange
        if(xhr.readyState === 4 && xhr.status === 200){ // проверка успешного запроса
            servResponse.textContent = xhr.responseText; // при успешном запросе сменится текстовое содержимое div свойством textContent

        }

    }

    xhr.send(formData); //отправление запроса //'ourForm__inp=' + userInput




};
