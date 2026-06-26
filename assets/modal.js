let modalAction = null;

function showModal(options)
{
    document.getElementById("modalTitle").innerHTML = options.title;
    document.getElementById("modalMessage").innerHTML = options.message;

    let btnOk = document.getElementById("modalOk");

    btnOk.innerHTML = options.okText || "Aceptar";

    btnOk.style.background = options.okColor || "#2e7d32";

    modalAction = options.onOk || null;

    document.getElementById("modalOverlay").style.display = "flex";
}

function closeModal()
{
    document.getElementById("modalOverlay").style.display = "none";
}

function modalOk()
{
    closeModal();

    if(modalAction)
        modalAction();
}