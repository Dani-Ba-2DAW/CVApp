// function deleteBlogGen(title, route) {
//     document.getElementById('deleteTitle').innerText = title;
//     let formDeleter = document.getElementById('blogDeleter');
//     formDeleter.action = route;
// }

const deleteModal = document.getElementById('deleteModal');
const formDeleter = document.getElementById('alumnoDeleter');
const titleModal = document.getElementById('deleteTitle');

if (deleteModal) {
    deleteModal.addEventListener('show.bs.modal', e => {
        const itemClick = e.relatedTarget;
        const title = itemClick.dataset.title;
        const route = itemClick.dataset.delurl;
        if (formDeleter) formDeleter.action = route;
        if (titleModal) titleModal.innerText = title;
    })
}

// Drag n Drop

const dropArea = document.getElementById('drop-area');
const fileInput = document.getElementById('imagen');
const preview = document.getElementById('preview');

if (dropArea && fileInput && preview) {
    // Drag events
    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropArea.classList.add('hover');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropArea.classList.remove('hover');
        });
    });

    // Drop event
    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        e.stopPropagation();

        const dt = e.dataTransfer;
        if (!dt) return;

        const files = Array.from(dt.files || []);
        if (!files.length) return;

        // Limitar número de archivos
        const finalFiles = files.slice(0, 1);

        // Crear un DataTransfer para asignar al input
        const dataTransfer = new DataTransfer();
        finalFiles.forEach(f => dataTransfer.items.add(f));
        fileInput.files = dataTransfer.files; // <-- aquí actualizamos el input

        // Disparamos el evento change por si otros listeners lo esperan
        const event = new Event('change', { bubbles: true });
        fileInput.dispatchEvent(event);

        // Mostramos preview
        handleFiles(fileInput.files);
    });

    // Input file change
    fileInput.addEventListener('change', (e) => {
        const files = e.target.files;
        handleFiles(files);
        blockDeleter();
    });

    // Función para manejar archivos
    function handleFiles(files) {
        if (!files || files.length === 0) return;

        preview.innerHTML = ''; // limpiar preview anterior

        Array.from(files).forEach(file => {
            if (!file.type.startsWith('image/')) return;

            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            preview.appendChild(img);
        });
    }

    function blockDeleter() {
        const checks = document.getElementById('deleteimage');
        if (!checks) return;
        checks.setAttribute('disabled', '');
        checks.checked = true;
    }
}