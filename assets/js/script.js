 function iniciaModal(modalID){
     const modal = document.getElementById(modalID)

     if(modal){
     console.log(modal)
     modal.classList.add('mostrar')

        //  Sair do modal
        modal.addEventListener('click', (e) => {
            if(e.target.id == modalID || e.target.className == 'fechar-modal') {
                modal.classList.remove('mostrar')
            } 
        })
    }
 }

    const buttonReportar = document.querySelector(".reportar")
    buttonReportar.addEventListener('click' , () =>  iniciaModal('modal-postage'))

    const options = document.querySelector(".engrenagem")
    options.addEventListener('click' , () =>  iniciaModal('modal-config'))

