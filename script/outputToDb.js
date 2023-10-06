const outputToDb = document.querySelector("form"),
    continueBtnSave = outputToDb.querySelector(".save");

outputToDb.onsubmit = (e) => {
    e.preventDefault();
}

continueBtnSave.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "outputToDb.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    window.location.reload();
                    alert("Заявка отправлена!");
                } else {
                    alert(data);
                }
            }
        }
    }
    let formData = new FormData(outputToDb);
    xhr.send(formData);
}