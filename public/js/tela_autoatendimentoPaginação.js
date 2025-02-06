const itemsPerPage = 6;
let currentPage = 1;

function showPage(page) {
    const areaQuadrados = document.getElementById('area-quadrados');
    const quadrados = Array.from(areaQuadrados.getElementsByClassName('quadrado'));
    const totalPages = Math.ceil(quadrados.length / itemsPerPage);

    if (page < 1) page = 1;
    if (page > totalPages) page = totalPages;

    areaQuadrados.innerHTML = '';

    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const itemsToShow = quadrados.slice(start, end);

    itemsToShow.forEach(item => areaQuadrados.appendChild(item));

    document.getElementById('prev-page').style.display = page === 1 ? 'none' : 'inline-block';
    document.getElementById('next-page').style.display = page === totalPages ? 'none' : 'inline-block';
}

function nextPage() {
    showPage(++currentPage);
}

function prevPage() {
    showPage(--currentPage);
}

document.addEventListener('DOMContentLoaded', () => {
    showPage(currentPage);
});