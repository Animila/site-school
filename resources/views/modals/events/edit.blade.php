<div class="modal" id="editModal" style="visibility: hidden">
    <div class="modal-content">
        <form action="{{ route('events.edit') }}" method="post" enctype="multipart/form-data" class="document-create">
            @method('patch')
            <span class="modal-title">Изменение мероприятия</span>
            @csrf
            <input type="hidden" name="id" id="event_id">
            <input type="text" placeholder="Наименование" name="title"  id="event_name">
            <input type="datetime-local" name="datetime" id="event_date">
            <textarea name="description" id="event_description"></textarea>

            <button>Сохранить</button>
        </form>
    </div>
    <div class="modal-bg" onclick="changeActiveEdit()"></div>
</div>

<script>

    function changeActiveEdit(item = null) {
        if(item) {
            const event_id = document.querySelector('#event_id')
            const event_name = document.querySelector('#event_name')
            const event_date = document.querySelector('#event_date')
            const event_description = document.querySelector('#event_description')


            event_id.value = item['id']
            event_name.value = item['title']
            event_date.value = item['datetime']
            event_description.value = item['description']
        }
        const content = document.querySelector('#editModal')
        if(content.style.visibility === "") {
            content.style.visibility = "hidden"
        } else {
            content.style.visibility = ""
        }


    }
</script>
