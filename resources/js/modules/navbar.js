let currentUrl = window.location.href
currentUrl = currentUrl.replace(/\/+$/, '')

const navbar = document.querySelector('#navbar')


navbar.querySelectorAll('.navbar-item').forEach(function(navbarMenuItem) {

    let navbarUrl = navbarMenuItem.getAttribute('href')

    console.log(currentUrl, navbarUrl)

    if (currentUrl === navbarUrl) {
        navbarMenuItem.classList.add('text-blue-500')
        navbarMenuItem.classList.remove('text-slate-300')
    } else {
        navbarMenuItem.classList.remove('text-blue-500')
        navbarMenuItem.classList.add('text-slate-300')
    }
})

// clearNavbar()
//
// function clearNavbar() {
//     navbar.querySelectorAll('.navbar-item').forEach(function(element) {
//         element.classList.remove('text-blue-500')
//         element.classList.add('text-slate-200')
//     })
// }
