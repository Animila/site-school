<div class="modal" id="editModal" style="visibility: hidden">
    <div class="modal-content">
        <form action="{{route('types.edit')}}" method="post" class="document-create">
            @method('patch')
            <span class="modal-title">Редактирование</span>
            @csrf
            <input type="text" placeholder="Наименование" name="name" id="editName">
            <input type="hidden" name="id" id="item_id">
            <input type="hidden" name="created_at" id="created_at">
            <input type="hidden" name="updated_at" id="updated_at">
            <button>Сохранить</button>
        </form>
    </div>
    <div class="modal-bg" onclick="changeActiveEdit()"></div>
</div>

<script>

    function changeActiveEdit(item = null) {
        if(item) {
            const text = document.querySelector('#editName')
            const text1 = document.querySelector('#item_id')
            const text2 = document.querySelector('#created_at')
            const text3 = document.querySelector('#updated_at')
            text.value = item['name']
            text1.value = item['id']
            text2.value = item['created_at']
            text3.value = item['updated_at']
        }
        const content = document.querySelector('#editModal')
        if(content.style.visibility === "") {
            content.style.visibility = "hidden"
        } else {
            content.style.visibility = ""
        }


    }
</script>
