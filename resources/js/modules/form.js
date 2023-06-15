// set the input column as invalid
function createInvalidColumn(element) {
    let errorElement = document.querySelector(`*[name=${element}]`)
    errorElement.closest('.form-group').classList.add('border-red-400', 'border-2', 'rounded-lg')
}


// create the error messages below the input column
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


// clear the error messages
function clearErrorMessages(form) {
    form.querySelectorAll('.error-message-container').forEach(function(element) {
        element.remove()
    })

    form.querySelectorAll('*[name]').forEach(function(element) {
        element.closest('.form-group').classList.remove('border-red-400', 'border-2', 'rounded-lg')
    })

}


// set the button to loading state
function buttonLoading(button) {
    button.textContent = 'Loading ...'
    button.classList.add('disabled:opacity-75')
    button.setAttribute('disabled', true)
}


// restore the button to the fresh state
function restoreButton(button, innerButton) {
    button.innerHTML = innerButton
    button.removeAttribute('disabled')
}


export {createInvalidColumn, createErrorMessageForColumn, restoreButton, buttonLoading, clearErrorMessages}
