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

// Click en la zona para abrir selector
dropArea.addEventListener('click', () => fileInput.click());

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
    const dt = e.dataTransfer;
    const files = dt.files;
    handleFiles(files);
});

// Input file change
fileInput.addEventListener('change', (e) => {
    const files = e.target.files;
    handleFiles(files);
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