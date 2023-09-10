<div class="modal" id="createModal" style="visibility: hidden">
    <div class="modal-content">
        <form action="{{ route('events.create') }}" method="post" enctype="multipart/form-data" class="document-create">
            <span class="modal-title">Добавление мероприятия</span>
            @csrf
            <input type="text" placeholder="Наименование" name="title">
            <input type="datetime-local" name="datetime">
            <textarea name="description" ></textarea>

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
