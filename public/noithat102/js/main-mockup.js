document.addEventListener('DOMContentLoaded', function () {
    // Các nút tăng/giảm
    var decrementButtons = document.querySelectorAll('.btn-decrement');
    var incrementButtons = document.querySelectorAll('.btn-increment');
    
    // Lặp qua từng nút giảm
    decrementButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var input = this.nextElementSibling;
            var value = parseInt(input.value);
            if (value > 1) {
                input.value = value - 1;
            }
        });
    });
    
    // Lặp qua từng nút tăng
    incrementButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var input = this.previousElementSibling;
            var value = parseInt(input.value);
            input.value = value + 1;
        });
    });
});
