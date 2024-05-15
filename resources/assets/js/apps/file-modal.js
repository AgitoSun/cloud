const buttons = document.querySelectorAll('.js-btn');
buttons.forEach(currentButton => {
    currentButton.addEventListener('click', function() {
        const $modal = $(this.dataset.modal);
        const $titleCont = $modal.find('#modalTitle');
        const $input = document.querySelector('#input-name');
        const $form = $modal.find('form');
        const fileName = this.dataset.name;
        const path = this.dataset.path;
        $titleCont.text(fileName);
        $input.value =  fileName.split('.')[0];
        $form.attr('action', path);
        $modal.modal('show');
    });
});
