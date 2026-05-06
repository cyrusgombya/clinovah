document.addEventListener('DOMContentLoaded', function() {
    const chatSearch = document.querySelector('.chat-search');
    const typeHead = document.querySelector('.type-head');
    const closeBtn = document.querySelector('.close');

    if (chatSearch && typeHead && closeBtn) {
        chatSearch.addEventListener('click', function(event) {
            event.stopPropagation();
            typeHead.classList.add('open');
            console.log('open class added');
        });

        closeBtn.addEventListener('click', function(event) {
            event.stopPropagation(); 
            typeHead.classList.remove('open');
            console.log('open class removed');
        });
    }
});
