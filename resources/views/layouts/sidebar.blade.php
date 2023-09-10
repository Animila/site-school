<aside>
    <a class="aside__logo" href="{{route('index')}}">
        <img src="{{asset('images/logo.png')}}" alt="logo">
        <span>Навигаторы детства</span>
    </a>
{{--    <span class="nav__title">Меню</span>--}}
    <nav class="menu">
        <div class="menu__item">
            <div class="menu__item menu__title">
                <img src="{{asset('images/document_logo.svg')}}" alt="Документы">
                <span>Документы</span>
            </div>
            <div class="menu__item menu__description">
                <a href="{{route('documents.index')}}">- Общий список</a>
                @foreach(\App\Models\DocType::all() as $item)
                    <a href="{{route('documents.type', $item->id)}}">- {{$item->name}}</a>
                @endforeach
                <a href="{{route('types.index')}}">- Типы</a>
            </div>
        </div>

        <div class="menu__item">
            <div class="menu__item menu__title">
                <img src="{{asset('images/events_logo.svg')}}" alt="мероприятия">
                <span>Мероприятия</span>
            </div>
            <div class="menu__item menu__description">
                <a href="{{route('events.index')}}">- Список мероприятий</a>
                <a href="#">- Календарь</a>
                <a href="#">- Наступающие</a>
                <a href="#">- Прошедшие</a>
            </div>
        </div>
        <div class="menu__item">
            <div class="menu__item menu__title">
                <img src="{{asset('images/account_logo.svg')}}" alt="аккаунты">
                <span>Аккаунт</span>
            </div>
            <div class="menu__item menu__description">
                <a href="#">- Все пользователи</a>
                <a href="#">- Роли</a>
                <a href="#">- Активные</a>
                <a href="#">- Заблокированные</a>
            </div>
        </div>

{{--        <a href="{{route('index')}}">Документы</a>--}}
{{--        <a href="{{route('index')}}">Недавние изменения</a>--}}
{{--        <a href="{{route('documents.index')}}">Документы</a>--}}
{{--        <a href="{{route("events.index")}}">Мероприятия</a>--}}
    </nav>
{{--    <div class="menu-bg" id="menu-bg"></div>--}}

</aside>

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
