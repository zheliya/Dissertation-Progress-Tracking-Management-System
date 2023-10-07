




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
              answer.style.display="none";
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




/* function addStudentInput() {
    const container = document.getElementsByClassName('supervisor_student_inputs_container')[0];
    const input = document.createElement('div');
    input.classList.add('supervisor_student_inputs', 'container', 'pt-5');
    input.innerHTML = `

        <input name="student_id[]" type="number" class="supervisor_student_id_input d-block ps-3 pe-3 w-100" id="user_id"
            value="">
            <select name="department[]" class="department_select">
            <option value="" disabled selected>Select Department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}"
                    >
                    {{ $department->name }}</option>
            @endforeach
        </select>

`;
    container.appendChild(input);
} */



function addStudentInput() {
    const container = document.getElementsByClassName('supervisor_student_inputs_container')[0];

    // Send an AJAX request to fetch the department options from the server
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                const departments = response.departments;

                // Append the generated HTML code to the container
                const input = document.createElement('div');
                input.classList.add('supervisor_student_inputs', 'container', 'pt-5');
                let html = `
                    <input name="student_id[]" type="number"
                        class="supervisor_student_id_input d-block ps-3 pe-3 w-100" id="user_id" value="">
                    <select name="department[]" class="department_select">
                        <option value="" disabled selected>Select Department</option>
                `;
                departments.forEach(function(department) {
                    html += `
                        <option value="${department.id}">${department.name}</option>
                    `;
                });
                html += '</select>';
                input.innerHTML = html;
                container.appendChild(input);
            } else {
                // Handle error
                console.error('Error fetching department options: ' + xhr.status);
            }
        }
    };
    xhr.open('GET', '/get-department-options', true);
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    xhr.send();
}


/* function addStudentInput() {
    const container = document.getElementsByClassName('supervisor_student_inputs_container')[0];

    // Send an AJAX request to fetch the department and user options from the server
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          console.log('Response:', response); // Log the response object

          const departments = response.departments;
          const users = response.users;
          console.log('Users:', users); // Log the users array

          // Append the generated HTML code to the container
          const input = document.createElement('div');
          input.classList.add('supervisor_student_inputs', 'container', 'pt-5');
          let html = `
            <select name="student_id[]" class="supervisor_student_id_input d-block ps-3 pe-3 w-100">
              <option value="" disabled selected>Select Student</option>
          `;
          users.forEach(function (user) {
            html += `
              <option value="${user.id}">${user.full_name} (ID: ${user.id})</option>
            `;
          });
          html += '</select>';

          html += `
            <select name="department[]" class="department_select">
              <option value="" disabled selected>Select Department</option>
          `;
          departments.forEach(function (department) {
            html += `
              <option value="${department.id}">${department.name}</option>
            `;
          });
          html += '</select>';

          input.innerHTML = html;
          container.appendChild(input);
        } else {
          // Handle error
          console.error('Error fetching options: ' + xhr.status);
        }
      }
    };
    xhr.open('GET', '/get-options', true);
    xhr.send();
  }
 */






function addChapterInput() {
    const container = document.getElementsByClassName('supervisor_student_inputs_container')[0];
    const input = document.createElement('div');
    input.classList.add('supervisor_student_inputs', 'container', 'pt-5');
    input.innerHTML = `
        <input name="chapter_title[]" type="text"
            class="supervisor_student_id_input d-block ps-3 pe-3 w-100" id="user_id"
            placeholder="Chapter title">

        <label for="formFileMultiple" class="form-label">Template</label>
        <input name="template_file[]" class="form-control" type="file" id="formFile">

        <label for="formFileMultiple" class="form-label">Guidline</label>
        <input name="guideline_file[]" class="form-control" type="file" id="formFile" >

        <input type="datetime-local" name="Deadline[]" step="1" pattern="\d{2}-\d{2}-\d{4}\s\d{2}:\d{2}:\d{2}" required>
    `;
    container.appendChild(input);
}




