import {createInvalidColumn, createErrorMessageForColumn, clearErrorMessages, restoreButton, buttonLoading} from "../../modules/form.js";


const loginForm = document.querySelector('#login-form')
const loginFormButton = loginForm.querySelector('button')


// form submission
loginForm.addEventListener('submit', function (event) {
    event.preventDefault()


    // clear every error messages before form submission
    clearErrorMessages(loginForm)
    buttonLoading(loginForm.querySelector('button'))


    let loginFormData = new FormData(event.target.closest('form'))


    axios({
        method: 'post',
        url: '/api/v1/login',
        data: loginFormData
    }).then(response => {

        if (response.status === 200) {
            window.location.reload()
        }

    }).catch(error => {

        if (error.response.status === 401) {
            createInvalidColumn('email')

            let errorMessages = error.response.data.message
            createErrorMessageForColumn('email', [errorMessages])
        }

        if (error.response.status === 422) {

            let errors = error.response.data.errors

            for (let error in errors) {

                createInvalidColumn(error)
                createErrorMessageForColumn(error, errors[error])
            }
        }
    }).finally(() => {
        let loginFormButtonInner = `<i class="fa-solid fa-arrow-right mr-2"></i> Sign In`
        restoreButton(loginFormButton, loginFormButtonInner)
    })
})
