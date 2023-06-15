const loginForm = document.querySelector('#login-form')
const loginFormButton = loginForm.querySelector('button')


// form submission
loginForm.addEventListener('submit', function (event) {
    event.preventDefault()


    // clear every error messages before form submission
    clearErrorMessages()
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
        if (error.response.status === 422) {

            let errors = error.response.data.errors

            for (let error in errors) {

                createInvalidColumn(error)
                createErrorMessageForColumn(error, errors[error])
            }
        }
    }).finally(() => {
        restoreButton(loginFormButton)
    })
})


function createInvalidColumn(element) {
    let errorElement = document.querySelector(`*[name=${element}]`)
    errorElement.closest('.form-group').classList.add('border-red-400', 'border-2', 'rounded-lg')
}


function createErrorMessageForColumn(element, errors) {
    let errorElement = document.querySelector(`*[name=${element}]`)
    let errorElementFormGroup = errorElement.closest('.form-group')

    let errorMessageElements = ''

    for (let error of errors) {
        errorMessageElements += `<span class="text-red-400 text-sm">${error}</span>`
    }

    let errorMessageContainer = document.createElement('div')
    errorMessageContainer.classList.add('error-message-container')
    errorMessageContainer.innerHTML = errorMessageElements
    errorElementFormGroup.insertAdjacentElement('afterend', errorMessageContainer)
}


function clearErrorMessages() {
    loginForm.querySelectorAll('.error-message-container').forEach(function(element) {
        element.remove()
    })

    loginForm.querySelectorAll('*[name]').forEach(function(element) {
        element.closest('.form-group').classList.remove('border-red-400', 'border-2', 'rounded-lg')
    })

}


function buttonLoading(button) {
    button.textContent = 'Loading ...'
    button.classList.add('disabled:opacity-75')
    button.setAttribute('disabled', true)
}


function restoreButton(button) {
    button.innerHTML = '<i class="fa-solid fa-arrow-right mr-2"></i> Sign In'
    button.removeAttribute('disabled')
}
