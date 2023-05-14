function searchPawnedItems() {
    input = document.getElementById("search");
    converted = input.value.toUpperCase();
    table = document.getElementById("pawned_table");
    tr = table.getElementsByTagName("tr");
    not_found = 0;

    for (i = 0; i < tr.length; i++) {
        cell1 = tr[i].getElementsByTagName("td")[1];
        cell2 = tr[i].getElementsByTagName("td")[2];
        cell3 = tr[i].getElementsByTagName("td")[3];
        cell4 = tr[i].getElementsByTagName("td")[4];

        if(cell1 || cell2 || cell3 || cell4) {
            string1 = cell1.textContent || cell1.innerText;
            string2 = cell2.textContent || cell2.innerText;
            string3 = cell3.textContent || cell3.innerText;
            string4 = cell4.textContent || cell4.innerText;

            if(string1.toUpperCase().indexOf(converted) > -1 || string2.toUpperCase().indexOf(converted) > -1 || string3.toUpperCase().indexOf(converted) > -1 || string4.toUpperCase().indexOf(converted) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                not_found++;
            }
        }
    }

    if(not_found == tr.length-1) {
        document.getElementById("div-search-msg").innerHTML = "<div style='text-align: center;'>No matched data found</div>'";
        not_found = 0;
    } else {
        document.getElementById('div-search-msg').innerHTML = "";
    }
}
