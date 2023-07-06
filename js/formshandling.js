// const reqMsg = 'This field is required !';
// const nomMsg = 'Ce nom es invalid !';
// const emailMsg = 'Ce email es invalid !';
// const passMsg = 'Ce mot de pass est facile !';
// const phoneMsg = 'Doit etre un numero maroccain !';
// const nomRegex = /^(.*[a-zA-Z]){3,}.*$/;
// const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
// const passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
// const phoneRegex = /^(?:\+212|0)(?:\s?\d){9}$/;
// const descRegex = /^(?! *$)[A-Za-z0-9\s]+$/;



// function checkIsValid (event,element,regex,errMsg)
// {

//     if (element)
//     {
//         if (element.value == '')
//         {
//             event.preventDefault();
//             element.classList.add('is-invalid');
//             displayerror(element,reqMsg);
            
//         }
//         else
//         {
//             if (!regex.test(element.value))
//             {
//                 event.preventDefault();
//                 displayerror(element,errMsg);
//             }
//            else{
//                element.classList.remove('is-invalid');
//                removeErr(element);
//             }
//         }
//     }
    
// }


// function validateForm(e) {
//     let elements = this.elements;
//     checkIsValid(e,elements['n'],nomRegex,nomMsg);
//     checkIsValid(e,elements['pn'],nomRegex,nomMsg);
//     checkIsValid(e,elements['e'],emailRegex,emailMsg);
//     checkIsValid(e,elements['ph'],phoneRegex,phoneRegex);
//     checkIsValid(e,elements['desc'],phoneRegex,phoneRegex);
//     checkIsValid(e,elements['spl'],phoneRegex,phoneRegex);
//     checkIsValid(e,elements['desc_c'],phoneRegex,phoneRegex);
//     checkIsValid(e,elements['i'],phoneRegex,phoneRegex);
//     checkIsValid(e,elements['mi'],phoneRegex,phoneRegex);
    
// }



// function displayerror (element,msg)
// {
    
//     removeErr(element);
//     let spanERR = document.createElement('div');
//     // let atr = document.createAttribute('error-span-display');
//     spanERR.setAttribute('error-span-display','');
//     spanERR.textContent = msg;
//     spanERR.classList.add('text-danger');
//     element.after(spanERR);
    
// }

// function removeErr (element){

//     if (element.nextElementSibling && element.nextElementSibling.hasAttribute('error-span-display'))
//     {
//         element.nextElementSibling.remove()
//     }

// }



// let userForm = document.getElementById('userForm');
// userForm.addEventListener('submit',function(e){
//     let elements = this.elements; 
    
//     if (elements['n'])
//     {
//         if (elements['n'].value === '')
//         {
//             e.preventDefault();
//             elements['n'].classList.add('is-invalid');
//             displayerror(elements['n'],reqMsg);
//         }
//         else {
//             if (!nomRegex.test(elements['n'].value))
//             {
//                 e.preventDefault();
//                 displayerror(elements['n'],nomMsg);
//             }
//             else{
                
//                 elements['n'].classList.remove('is-invalid');
//             }
//         }
//     }
//     if (elements['pn'])
//     {
//         if (elements['pn'].value === '')
//         {
//             e.preventDefault();
//             elements['pn'].classList.add('is-invalid');
//         }
//         else {
//             if (nomRegex.test(elements['pn'].value))
//             {
//                 e.preventDefault();
//                 displayerror(elements['pn'],nomMsg);
//             }
//             else{
                
//                 elements['pn'].classList.remove('is-invalid');
//             }
//         }
//     }
//     if (elements['e'])
//     {
//         if (elements['e'].value === '')
//         {
//             e.preventDefault();
//             elements['e'].classList.add('is-invalid');
//         }
//         else {
//             if (emailRegex.test(elements['e'].value))
//             {
//                 e.preventDefault();
//                 displayerror(elements['e'],emailMsg );
//             }
//             else{
        
//                 elements['e'].classList.remove('is-invalid');
//             }
//         }
//     }
//     if (elements['ph'])
//     {
//         if (elements['ph'].value === '')
//         {
//             e.preventDefault();
//             elements['ph'].classList.add('is-invalid');
//         }
//         else {
//             if (phoneRegex.test(elements['ph'].value))
//             {
//                 e.preventDefault();
//                 displayerror(elements['ph'],nomMsg);
//             }
//             else{
        
//                 elements['ph'].classList.remove('is-invalid');
//             }
//         }
//     }
//     if (elements['desc'])
//     {
//         if (elements['desc'].value === '')
//         {
//             e.preventDefault();
//             elements['desc'].classList.add('is-invalid');
//         }
//         else {
//             if (!descRegex.test(elements['desc'].value))
//             {
//                 e.preventDefault();
//                 displayerror(elements['desc'],nomMsg);
//             }
//             else{
        
//                 elements['desc'].classList.remove('is-invalid');
//             }
//         }
//     }
//     if (elements['mi'])
//     {
//         if (elements['mi'].value === '')
//         {
//             e.preventDefault();
//             elements['mi'].classList.add('is-invalid');
//         }
//         else {
            
//             elements['mi'].classList.remove('is-invalid');
//         }
//     }
//     if (elements['i'])
//     {
//         if (elements['i'].value === '')
//         {
//             e.preventDefault();
//             elements['i'].classList.add('is-invalid');
//         }
//         else {
//             elements['i'].classList.remove('is-invalid');
//         }
//     }
//     if (elements['spl'])
//     {
//         if (elements['spl'].value === '')
//         {
//             e.preventDefault();
//             elements['spl'].classList.add('is-invalid');
//         }
//         else {
//             elements['spl'].classList.remove('is-invalid');
//         }
//     }
//     if (elements['date_rdv'])
//     {
//         if (elements['date_rdv'].value === '')
//         {
//             e.preventDefault();
//             elements['date_rdv'].classList.add('is-invalid');
//             displayerror(elements['date_rdv'],'is required');
//         }
//         else {
//             const currentDateTime = new Date();
//             const formattedDateTime = currentDateTime.toISOString().slice(0, 16);
//             if (descRegex.test(elements['date_rdv'].value))
//             {
//                 e.preventDefault();
//                 displayerror(elements['date_rdv'],nomMsg);
//             }
//             else if (elements['date_rdv'].value < formattedDateTime)
//             {
//                 e.preventDefault();
//                 displayerror(elements['date_rdv'],'rdv doit etre dans le future');
//             }
//             else{
//                 removeErr(elements['date_rdv'])
//                 elements['date_rdv'].classList.remove('is-invalid');
//             }
//         }
//     }
//     if (elements['desc_c'])
//     {
//         if (elements['desc_c'].value === '')
//         {
//             e.preventDefault();
//             elements['desc_c'].classList.add('is-invalid');
//             displayerror(elements['desc_c'],'is required');
//         }
//         else {
//             if (descRegex.test(elements['desc_c'].value))
//             {
//                 e.preventDefault();
//                 displayerror(elements['desc_c'],nomMsg);
//             }
//             else{
            
//                 elements['desc_c'].classList.remove('is-invalid');
//             }
//         }
//     }
    
    
// })
