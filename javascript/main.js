
// var modall = document.querySelector(".modall")

// setTimeout(function(){
// modall.style.display = 'none';
// } ,1200)




// script for edit

var edit = document.getElementsByClassName("editbtn");
Array.from(edit).forEach((element)=>{
    element.addEventListener('click',(e)=>{
        var row = e.target.parentNode.parentNode;
        var title = row.getElementsByTagName('td')[1].innerText;
        var description = row.getElementsByTagName('td')[2].innerText;
        let editTitle = document.querySelector("#editInputtitle")
        let editDescription = document.querySelector("#editInputdescription")
        editTitle.setAttribute('value',title)
        editDescription.innerHTML = description
        let updateSno = document.querySelector("#update-sno")
        updateSno.value = e.target.id;
        $('#editModal').modal('toggle');
    })
})

// delete button script

var del = document.getElementsByClassName("deletebtn");
Array.from(del).forEach((element)=>{
    element.addEventListener('click',(e)=>{
        var row = e.target.parentNode.parentNode;
        // var title = row.getElementsByTagName('td')[1].innerText;
        // var description = row.getElementsByTagName('td')[2].innerText;

        var con = confirm("Press ok to delete the note")
        var num = e.target.id.substr(1,);
        if(con){
            window.location = `index.php?delbool=${num}`
        }
        else{
        }

    })
})

// logout function cancel



