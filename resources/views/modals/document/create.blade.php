<div class="modal" id="documentModal" style="visibility: hidden">
    <div class="modal-content">
        <form action="{{ route('documents.create') }}" method="post" enctype="multipart/form-data" class="document-create">
            <span class="modal-title">Добавление документа</span>
            @csrf
            <input type="text" placeholder="Наименование" name="name">
            <input type="date" name="date">
            <input type="file" placeholder="Путь к файлу" name="pathname">
            <select name="typeid">
                @foreach($docType_list as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>

            <button>Загрузить</button>
        </form>
    </div>
    <div class="modal-bg" onclick="changeActiveCreate()"></div>
</div>

<script>

    function changeActiveCreate() {
        const content = document.querySelector('#documentModal')
        if(content.style.visibility === "") {
            content.style.visibility = "hidden"
        } else {
            content.style.visibility = ""
        }


    }
</script>
