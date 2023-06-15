import {createInvalidColumn, createErrorMessageForColumn, clearErrorMessages, restoreButton, buttonLoading} from "../../modules/form.js";
import Swal from "sweetalert2";

const registrationForm = document.querySelector('#registration-form')
const registrationFormButton = registrationForm.querySelector('button')


// form submission
registrationForm.addEventListener('submit', function (event) {
    event.preventDefault()


    // clear every error messages before form submission
    clearErrorMessages(registrationForm)
    buttonLoading(registrationForm.querySelector('button'))


    let registrationFormData = new FormData(event.target.closest('form'))

    axios({
        method: 'post',
        url: '/api/v1/register',
        data: registrationFormData
    }).then(response => {

        if (response.status === 201) {

            Swal.fire({
                icon: 'success',
                title: 'Registration Successful',
                text: 'Now, are you ready to boost your productivity?',
                confirmButtonText: 'Let\'s do it!',
                confirmButtonColor: '#3b83f6'
            }).then(r => {
                window.location.href = '/login'
            })

        }

    }).catch(error => {
        if (error.response.status === 422) {

            let errors = error.response.data.errors

            for (let error in errors) {

                createInvalidColumn(error)
                createErrorMessageForColumn(error, errors[error])
            }
        }
    }).finally(() => {
        let innerRegistrationFormButton =  '<i class="fa-solid fa-arrow-right mr-2"></i> Register'
        restoreButton(registrationFormButton, innerRegistrationFormButton)
    })
})

