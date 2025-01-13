// Validate employee registration and update forms
document.getElementById("employeeForm").addEventListener("submit", function(event) {
    var name = document.getElementById("name").value;
    var contact_no = document.getElementById("contact_no").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (!name || !contact_no || !username || !password) {
        alert("All fields are required!");
        event.preventDefault();
    }
});

// AJAX Search function
function searchEmployee() {
    var searchInput = document.getElementById("searchInput").value;

    if (searchInput.length === 0) {
        document.getElementById("employeeList").innerHTML = "";
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "employee/search?search=" + searchInput, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            let employees = JSON.parse(xhr.responseText);
            let output = '';
            employees.forEach(function(employee) {
                output += '<p>' + employee.name + ' - ' + employee.contact_no + '</p>';
            });
            document.getElementById("employeeList").innerHTML = output;
        }
    };
    xhr.send();
}
