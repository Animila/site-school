<nav>
    <div class="menu-button" id="burger">
        <span></span><span></span><span></span>
    </div>
    <div class="menu">
        <a href="{{route('index')}}">Профиль</a>
        <a href="{{route('index')}}">Недавние изменения</a>
        <a href="{{route('documents.getAll')}}">Документы</a>
        <a href="{{route("events.getAll")}}">Мероприятия</a>
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
