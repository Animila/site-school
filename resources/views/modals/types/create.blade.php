<div class="modal" id="createModal" style="visibility: hidden">
    <div class="modal-content">
        <form action="{{ route('types.create') }}" method="post" class="document-create">
            <span class="modal-title">Новый тип</span>
            @csrf
            <input type="text" placeholder="Наименование" name="name">
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
