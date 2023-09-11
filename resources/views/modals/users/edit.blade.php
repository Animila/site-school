<div class="modal" id="editModal" style="visibility: hidden">
    <div class="modal-content">
        <form action="{{ route('users.edit') }}" method="post" class="document-create">
            <span class="modal-title">Редактирование пользователя</span>
            @method('patch')
            @csrf
            <input type="hidden" name="id" id="user_id">
            <input type="text" placeholder="Имя" name="name" id="user_name">
            <input type="email" placeholder="Почта" name="email" id="user_email">
            <input type="password" placeholder="Пароль" name="password" id="user_password">
            <button>Сохранить</button>
        </form>
    </div>
    <div class="modal-bg" onclick="changeActiveEdit()"></div>
</div>

<script>

    function changeActiveEdit(item = null) {

        if(item) {

            const user_id = document.querySelector('#user_id')
            const user_name = document.querySelector('#user_name')
            const user_email = document.querySelector('#user_email')

            user_id.value = item['id']
            user_name.value = item['name']
            user_email.value = item['email']
        }

        const content = document.querySelector('#editModal')
        if(content.style.visibility === "") {
            content.style.visibility = "hidden"
        } else {
            content.style.visibility = ""
        }


    }
</script>
