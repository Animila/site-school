<div class="modal" id="editModal" style="visibility: hidden">
    <div class="modal-content">
        <form action="{{ route('documents.edit') }}" method="post" enctype="multipart/form-data" class="document-create">
            @method('patch')
            <span class="modal-title">Добавление документа</span>
            @csrf
            <input type="hidden" name="id" id="doc_id">
            <input type="text" placeholder="Наименование" name="name" id="doc_name">
            <input type="date" name="date" id="doc_date">
            <input type="file" placeholder="Путь к файлу" name="pathname">
            <select name="typeid">
                @foreach($docType_list as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>

            <button>Загрузить</button>
        </form>
    </div>
    <div class="modal-bg" onclick="changeActiveEdit()"></div>
</div>

<script>

    function changeActiveEdit(item = null) {
        if(item) {
            const doc_id = document.querySelector('#doc_id')
            const doc_name = document.querySelector('#doc_name')
            const doc_date = document.querySelector('#doc_date')

            doc_id.value = item['id']
            doc_name.value = item['name']
            doc_date.value = item['date']
        }

        const content = document.querySelector('#editModal')
        if(content.style.visibility === "") {
            content.style.visibility = "hidden"
        } else {
            content.style.visibility = ""
        }


    }
</script>
