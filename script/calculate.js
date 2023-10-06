const mainForm = document.querySelector("form"),
continueBtn = mainForm.querySelector(".calc");

let result = document.getElementById("result");
let resultHidden = document.getElementById("resultHidden");

mainForm.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "calculate.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                if(data.slice(-1) === "!") {
                    alert(data);
                } else {
                    result.value = data;
                    resultHidden.value = data;
                }
            }
        }
    }
    let formData = new FormData(mainForm);
    xhr.send(formData);
}