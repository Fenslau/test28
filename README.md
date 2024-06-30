<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h2>Тестовое задание</h2>

<p>
Использовался Laravel sail для контейнеризации. </br>
Также выполнено дополнительное задание по ограничению прав доступа (реализовано через политику). </br>
Марки / модели / параметры автомобилей / пользователи, которым они принадлежат генерируются фабриками/сидером (db:seed). </br>
Для генерации правдоподобных марок и соответствующих им моделей машин использовался пакет pelmered/fake-car. </br>
У автомобиля внешний ключ на модель, т.к. модель однозначно определяет и марку, так что необходимости в двух ключах я не увидел. </br>
Политика написана так, что пользователь смотреть может любые машины, а редактировать и удалять - только свои. </br>
Для создания автомобиля - тоже необходимо авторизоваться. </br>
Без аутентификации можно смотреть все автомобили. </br>
При аутентификации выдается токен, который потом нужно использовать для запросов, требующих авторизации. </br>
В запрос листинга марок добавлен ключ with_models - тогда будут выведены также и модели. </br>
Аналогично для моделей есть ключ with_brand. </br>
Для листинга марок, моделей и машин используется кэширование. Кэш сбрасывается при обновлении/удалении моделей. </br>
В репозитории присутствует коллекция Postman для тестирования api. </br>
</p>