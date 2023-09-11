<div class="modal" id="createModal" style="visibility: hidden">
    <div class="modal-content">
        <form action="{{ route('users.create') }}" method="post" class="document-create">
            <span class="modal-title">Новый пользователь</span>
            @csrf
            <input type="text" placeholder="Имя" name="name">
            <input type="email" placeholder="Почта" name="email">
            <input type="password" placeholder="Пароль" name="password">
            <button>Загрузить</button>
        </form>
    </div>
    <div class="modal-bg" onclick="changeActiveCreate()"></div>
</div>

<script>

    function changeActiveCreate() {
        const content = document.querySelector('#createModal')
        if(content.style.visibility === "") {
            content.style.visibility = "hidden"
        } else {
            content.style.visibility = ""
        }


    }
</script>
