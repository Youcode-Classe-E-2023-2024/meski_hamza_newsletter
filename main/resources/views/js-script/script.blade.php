<script type="text/javascript">

    /**************************** the popup multi-select script ************************************/
    window.openModal = function(modalId) {
        document.getElementById(modalId).style.display = 'block'
        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
        const checkBoxSpan = document.querySelectorAll('.checkBoxSpan');
        const checkBox = document.querySelectorAll('.checkBox');

        for (let i = 0; i < checkBoxSpan.length; i++) {
            checkBoxSpan[i].addEventListener('click', function(event) {
                if(checkBox[i].checked) checkBox[i].checked = false;
                else checkBox[i].checked = true;
            });
        }

    }

    window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none'
        const checkBox = document.querySelectorAll('.checkBox')

        for(let i = 0; i < checkBox.length; i++) {
            if(checkBox[i].checked == true) checkBox[i].checked = false
        }
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
    }

    // Close all modals when press ESC
    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode === 27) {
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
            let modals = document.getElementsByClassName('modal');
            Array.prototype.slice.call(modals).forEach(i => {
                i.style.display = 'none'
            })
        }
    };

    // search functionality
    const searchInput = document.getElementById('searchInput');
    const optionsContainer = document.getElementById('optionsContainer');
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        optionsContainer.className = 'flex flex-col';
        checkboxes.forEach(function(checkbox) {
            optionsContainer.className = 'flex flex-col justify-start h-[200px] overflow-auto'
            const label = checkbox.parentNode.textContent.toLowerCase();
            if (label.includes(searchTerm)) {
                checkbox.parentNode.style.display = 'block';
            } else {
                checkbox.parentNode.style.display = 'none';
            }
        });
    });
</script>
