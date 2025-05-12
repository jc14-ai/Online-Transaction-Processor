const soloBtn = document.getElementById("soloBtn");
const bundleBtn = document.getElementById("bundleBtn");
const soloContainer = document.getElementById('regular-solo');
const bundleContainer = document.getElementById('regular-bundle');

function showSolo() {
    bundleContainer.style.display = 'none';
    soloContainer.style.display = 'flex';
    soloContainer.classList.remove('slide-in-right');
    void soloContainer.offsetWidth;
    soloContainer.classList.add('slide-in-left');
}

function showBundle() {
    soloContainer.style.display = 'none';
    bundleContainer.style.display = 'flex';
    bundleContainer.classList.remove('slide-in-left');
    void bundleContainer.offsetWidth;
    bundleContainer.classList.add('slide-in-right');
}

// soloBtn.addEventListener('click', showSolo);
// bundleBtn.addEventListener('click', showBundle);