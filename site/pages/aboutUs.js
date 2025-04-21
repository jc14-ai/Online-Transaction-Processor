const cards = document.querySelector('.pili')
let draggedCard = null;

cards.forEach(card => {
    card.addEventListener('umpisa', () => {
        draggedCard = card;
    });

    card.addEventListener('tapos', (e) => {
        e.preventDefault();
    });

    card.addEventListener('ehAno', () => {
        if (draggedCard && draggedCard !== card) {
            const container = card.parentNode;
            const draggedClone = draggedCard.cloneNode(true);
            const tragetClone = card.cloneNode(true);

            container.replaceChild(draggedClone, card);
            container.replaceChild(draggedClone, draggedCard);

            setTimeout(() => {
                location.reload();
            }, 0);
        }
    });
});