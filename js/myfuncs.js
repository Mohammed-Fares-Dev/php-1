const reqMsg = 'This field is required !';
const nomMsg = 'Ce nom es invalid !';
const emailMsg = 'Ce email es invalid !';
const passMsg = 'Ce mot de pass est facile !';
const phoneMsg = 'Doit etre un numero maroccain !';
const descMsg = 'ce description est invalid !';
const dateMsg = 'entrer la date';
const dateRegex = /^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/;
const xssRegex = /\<script[\s\S]*?\>|javascript:|on\w+="[\s\S]*?"|<\s*img[\s\S]*?src\s*=\s*(["']?)javascript:.+?\1|<\s*iframe[\s\S]*?src\s*=\s*(["']?)javascript:.+?\2/;
const sqlRegex = /(\b(union|select|insert|update|delete|drop|alter)\b)|(\/\*.*\*\/)|(\b(union|select|insert|update|delete|drop|alter)\b.*\b(select|from|into|values|table|database)\b)|(\/\*.*\*\/.*\b(select|from|into|values|table|database)\b)/;
const nomRegex = /^(.*[a-zA-Z]){3,}.*$/;
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
const phoneRegex = /^(?:\+212|0)(?:\s?\d){9}$/;
const descRegex = /^(?! *$)[A-Za-z0-9\s.,:!?)("]+$/;




function confirmRedirect(e) {
    let c = confirm('You realy want to delete this person. Continue?');
    if (!c) {
      e.preventDefault();  
    }  
}    


function checkIsValid (event,element,regex,errMsg)
{
    
    if (element)
    {
        if (element.value == '')
        {
            event.preventDefault();
            displayerror(element,reqMsg);
            
        }
        else
        {
            // if (element.name == 'date_rdv')
            // {
            //     const currentDateTime = new Date();
            //     const formattedDateTime = currentDateTime.toISOString().slice(0, 16);

            //     if ( oldRdv )
            //     {
            //         if (oldRdv != element.value)
            //         {
            //             if (element.value < formattedDateTime)
            //             {
            //                 event.preventDefault();
            //                 displayerror(element,'rdv doit etre dans le future');
            //                 return
            //             }
            //         }
                    
            //     }
            //     else if (element.value < formattedDateTime)
            //     {
            //         event.preventDefault();
            //         displayerror(element,'rdv doit etre dans le future');
            //         return
            //     }
            // }
            
            
            if (regex)
            {
                if (!regex.test(element.value))
                {
                    event.preventDefault();
                    displayerror(element,errMsg);
                }
                else
                {
                    element.classList.remove('is-invalid');
                    removeErr(element);
                }
            }
            if (xssRegex.test(element.value) || sqlRegex.test(element.value))
            {
                event.preventDefault();
                displayerror(element,'wakhona wash ta bathakiny wela kifax');
            }
            if (element.name === 'e' || element.name === 'email' || element.name === 'pass_r' || element.name === 'pass' || element.name === 'cpass')
            {
                chechValLength(event,element);
            }
            
            
        }
    }
    
}

function chechValLength (e,ele)
{
    if (ele.value.length >= 20)
    {
        e.preventDefault();
        // displayerror(ele,'Too long !');
        displayerror(ele,ele.value.length);
        
    }
}




function validateForm(e) {
    
    // let elements = this.elements;
    // alert(e);

    let elements = e.target.elements;
    console.log(elements);
    checkIsValid(e,elements['n'],nomRegex,nomMsg);
    checkIsValid(e,elements['firstname'],nomRegex,nomMsg);
    checkIsValid(e,elements['pn'],nomRegex,nomMsg);
    checkIsValid(e,elements['lastname'],nomRegex,nomMsg);
    checkIsValid(e,elements['e'],emailRegex,emailMsg);
    checkIsValid(e,elements['email'],emailRegex,emailMsg);
    checkIsValid(e,elements['pass']);
    checkIsValid(e,elements['searchParam']);
    checkIsValid(e,elements['pass_r'],passRegex,passMsg);
    checkIsValid(e,elements['cpass']);
    checkIsValid(e,elements['ph'],phoneRegex,phoneRegex);
    checkIsValid(e,elements['phone'],phoneRegex,phoneRegex);
    
}



function displayerror (element,msg)
{
    if (element.name === 'searchParam')
    {
        element.classList.add('is-invalid');
    }
    else
    {
        element.classList.add('is-invalid');
        removeErr(element);
        let spanERR = document.createElement('div');
        spanERR.classList.add('invalid-feedback');
        spanERR.textContent = msg;
        // spanERR.classList.add('text-danger');
        element.after(spanERR);
    }
    
}

function removeErr (element){

    if (element.nextElementSibling && element.nextElementSibling.classList.contains('invalid-feedback'))
    {
        element.nextElementSibling.remove()
    }

}





// let confirmRedirect = function (e){
//     alert('tttttttt');
//     e.preventDefault();
//     confirm('u have to be auth');
//     if (!c)
//     {
//         e.preventDefault();
//     }
// }