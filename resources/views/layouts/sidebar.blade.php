<nav>
    <div class="menu-button" id="burger">
        <span></span><span></span><span></span>
    </div>
    <div class="menu">
        <a href="{{route('index')}}">Главная</a>
        <hr style="border: 1px solid black; width: 100%">
        <h3>Документы</h3>
        <a href="{{route('documents.index')}}">Общий список</a>
        <a href="#">Список типов</a>
        <a href="{{route('documents.createShow')}}">Новый документ</a>
        <hr style="border: 1px solid black; width: 100%">
        <h3>Аккаунты</h3>
        <a href="{{route('auth.profile')}}">Ваш профиль</a>
        <a href="#">Все пользователи</a>
        <hr style="border: 1px solid black; width: 100%">
        <h3>Мероприятия</h3>
        <a href="{{route("events.index")}}">Список</a>
        <a href="">Создать</a>
    </div>
    <div class="menu-bg" id="menu-bg"></div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById("burger").addEventListener("click", function() {

            document.querySelector(".menu-bg").classList.toggle("active")
            document.querySelector(".menu").classList.toggle("open")
        })
        document.getElementById("menu-bg").addEventListener("click", function() {

            document.querySelector(".menu-bg").classList.toggle("active")
            document.querySelector(".menu").classList.toggle("open")
        })
    })
</script>
