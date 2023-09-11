<div class="modal" id="createModal" style="visibility: hidden">
    <div class="modal-content">
        <form action="{{ route('users.create') }}" method="post" class="document-create">
            <span class="modal-title">Редактирование пользователя</span>
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
            const doc_id = document.querySelector('#user_id')
            const doc_name = document.querySelector('#user_name')
            const doc_email = document.querySelector('#user_email')

            doc_id.value = item['id']
            doc_name.value = item['name']
            doc_email.value = item['email']
        }

        const content = document.querySelector('#createModal')
        if(content.style.visibility === "") {
            content.style.visibility = "hidden"
        } else {
            content.style.visibility = ""
        }


    }
</script>
