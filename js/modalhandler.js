
indexModal.addEventListener('show.bs.modal', function(event) {
    let button = event.relatedTarget;
    let recipient = button.getAttribute('data-bs-whatever').split('|');
    indexModal.querySelector('.modal-title').textContent = recipient[0];
    indexModal.querySelector('input[type="submit"]').value = recipient[1];
    indexModal.querySelector('input[type="submit"]').name = recipient[1];
    let myform = indexModal.querySelector('form');
    myform.action = recipient[2];
    // if (recipient[3] !== undefined)
    // {
    //   let atrbs = {};
    //   let vals = recipient[3].split('#');
    //   vals.forEach((e,i) => {
    //     let info = e.split(',');
    //     info.forEach((e)=>{
          
    //       console.log(e)
    //       atrbs[i] = {[`${e.split(':')[0]}`] : e.split(':')[1]};
    //     })
    
    //     console.log(atrbs)
        // if (inputs)
        // {
        //   Object.values(inputs).forEach((e,i)=>{
        //     let inpt = document.createElement('input');
        //     inpt.classList.add('form-control')
        //     inpt.type = e[0].nomspl
        //     myform.querySelector('.modal-body').append(inpt)
        //   })
        // }
        
    //   });
    // }
    if (recipient[3] !== undefined)
    {
      let inputs = Array.from(myform.elements);
      let vals = recipient[3].split('&');
      inputs.forEach((e,i) => {
        if (vals.length - 1 >= i)
        {
          e.value = vals[i];
          console.log(vals[i])
          console.log(e)
        }
      });
    }
  //   let modalBodyInput = exampleModal.querySelector('.modal-body input');
  
  //   modalTitle.textContent = 'New message to ' + recipient;
  //   modalBodyInput.value = recipient;
  });
  