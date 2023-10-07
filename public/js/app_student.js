//sidebar toggle
function toggleElement() {
    var element = document.getElementById("myElement");
    if (element.style.display === "none") {
        console.log("working");

        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}








/* statement container showing */
/* function myFunction(action) {
    var x = document.getElementById("statment-container");
    var y = document.getElementById("statment-edit-container");
    var submitButton = document.getElementById("submit-button");

    if (action === "edit") {
        console.log("Edit button clicked");
        submitButton.name = "edit";
        submitButton.value = "edit";
        x.style.display = "none";
        y.style.display = "block";
    } else if (action === "update") {
        console.log("Update button clicked");
        submitButton.name = "update";
        submitButton.value = "Update";
        x.style.display = "none";
        y.style.display = "block";
    }

} */

/* function myFunction(action) {
    var x = document.getElementById("statment-container");
    var y = document.getElementById("statment-edit-container");
    var submitButton = document.getElementById("submit-button");

    if (x && y) {
        if (action === 'edit') {
            console.log("Edit button clicked");
            submitButton.name = "edit";
            submitButton.value = "edit";
            x.style.display = "none";
            y.style.display = "block";
        } else if (action === 'update') {
            console.log("Update button clicked");
            submitButton.name = "update";
            submitButton.value = "update";
            x.style.display = "none";
            y.style.display = "block";
        }
    }
} */







/* chapter-task toggle */
document.querySelectorAll('.accordion__question').forEach((item) => {
    item.addEventListener('click', (event) => {
        console.log('click!');

        const currentQuestion = item;
        const questions = document.querySelectorAll('.accordion__question');

        // Close any open questions
        questions.forEach((q) => {
            if (q !== currentQuestion) {
                console.log('closing the other question');
                q.classList.remove('open');
                const answer = q.nextElementSibling;
                answer.style.display = "none";
                answer.classList.add('collapsing');
                answer.classList.remove('open');

                setTimeout(() => {
                    answer.style.height = '0';
                    answer.classList.remove('collapsing');
                }, 300);
            }
        });

        let accCollapse = item.nextElementSibling;
        if (!item.classList.contains('collapsing')) {
            // Open accordion item
            if (!item.classList.contains('open')) {
                console.log('toggle accordion button');
                accCollapse.style.display = 'block';
                accCollapse.classList = 'accordion__collapse collapsing';

                setTimeout(() => {
                    accCollapse.style.height = accCollapse.scrollHeight + 'px';
                    accCollapse.classList = 'accordion__collapse collapse open';
                }, 1);
            }
            // Close accordion item
            else {
                accCollapse.classList = 'accordion__collapse collapsing';

                setTimeout(() => {
                    accCollapse.style.height = '0';
                    accCollapse.classList = 'accordion__collapse collapse';
                    accCollapse.style.display = 'none';
                }, 300);
            }

            item.classList.toggle('open');
        }
    });
});






/* sidebar toggle */
window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});




/* auto submit edit title checkbox */
/*
document.getElementById('confirm_title').addEventListener('change', function() {
    document.getElementById('SubmitEdidtTitleCheckbox').submit();
}); */






/* history file button */
const showButton = document.getElementById("history_files_button");
const hiddenDiv = document.getElementById("history_files_container");

showButton.addEventListener("click", () => {
  hiddenDiv.classList.toggle("d-none");
});
