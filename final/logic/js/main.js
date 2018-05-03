document.addEventListener('DOMContentLoaded', /*Обработчик события*/
function(){
// делегирование событий
    var movieSection =
    document.querySelector('#movies-sec');
    if(movieSection){
        movieSection.addEventListener('click',
        sectionHandler);
        //проверка содержится ли в переменной значение
        function sectionHandler(event){ //обработчик
            // console.log(event.target);

            if(event.target.classList.contains('movie__watched')){
                    //проверка содержит ли целевой елемент событие movie__watched метоом contains свойства classList
                var btn = event.target; // целевой елемент event.target
                var movieId = btn.parentNode.getAttribute('data-movie-id'); // обращение к контейнеру фильма
                var watchedCounter = document.querySelector('#watched-count');
                // получение счетчика
                var currentCount = watchedCounter.textContent;

                doAjax({ // отправление ajax запроса
                    method: 'POST',
                    url: 'logic/watched_movie.php',
                    data: 'watched_id=' + movieId,
                    contentType:
                    'application/x-www-form-urlencoded', // кодировка
                    callback: function(){ // анон. функция
                        if( // если
                        btn.classList.contains('movie__watched_active') ){
                            btn.textContent = 'Не смотрел';
                            --currentCount;
                        }else{
                            btn.textContent = 'Смотрел';
                            ++currentCount;
                        }

                        btn.classList.toggle('movie__watched_active');
                        watchedCounter.textContent = currentCount; // изменение счетчика
                    }


                });
            }

            if(event.target.classList.contains('movie__del') ){
                event.preventDefault();

                var movie= {};
                movie.container = event.target.parentNode;
                movie.id = movie.container.getAttribute('data-movie-id');
                movie.title = movie.container.firstElementChild.textContent;

                doAjax({
                    method: 'POST',
                    url: 'logic/del_movie.php',
                    data: 'del_id=' + movie.id,
                    contentType:
                    'application/x-www-form-urlencoded',
                    callback: delMovie

                });

                function delMovie(response){
                    if (response){
                        alert('Фильм ' + movie.title + ' был успешно удален!');
                        movie.container.nextElementSibling.remove()
                        // удалить горизонтальную линию
                        movie.container.remove()
                    }else{
                        alert('Во время удаления файла что-то пошло не так');
                    }

                }


            }




        }
    }

    var moreBtn = document.querySelector('#showMore'); //выбор кнопки "Показать еще"
    if(moreBtn){ //проверяем наличия значение переменной moreBtn

        moreBtn.addEventListener('click',
        showMoreMovies); // Добавляем обработчик showMoreMovies на click

        var lastShowMovie = 0; //номер записи которую надо вывести

        function showMoreMovies(){ //увеличение переменной на 1
            lastShowMovie++;

            doAjax({ // Ajax query
                method: 'POST',
                url: 'logic/more_movies.php',
                data: 'last_shown_movie=' + lastShowMovie,
                contentType:
                'application/x-www-form-urlencoded',
                callback: appendMovie
            });
            function appendMovie(movie){
                movie = JSON.parse(movie); // преобразование JSON в JS object
                if(movie){
                    var title = document.createElement('h4');
                    var link = document.createElement('a');
                    link.href = 'movies.php#movie_' + movie.id;
                    link.textContent = movie.title; //ссылка отправляет пользывателя на страницу movies.php

                    title.appendChild(link);// ccылка в заголовке
                    document.body.appendChild(title); // заголовок в body
                }else{ // если false то меняем текст кнопки
                    moreBtn.textContent = 'Фильмов больше нет:(';
                    moreBtn.setAttribute('disabled', 'disabled');
                }

            }

        }
    }

/*проверка наличия формы на странице*/
    if (document.forms.newMovie){ //если присутствует
        document.forms.newMovie.addEventListener('submit', addNewMovie);
            //Обработчик addNewMovie на событие submit
        function addNewMovie(event){
            event.preventDefault();

            var formData = new FormData(this); //отправка формы

            doAjax({
                method: 'POST',
                url: 'logic/add_movie.php',
                data: formData,
                callback: function(response){
                    alert(response);
                }



            });
        }
    }

















});
